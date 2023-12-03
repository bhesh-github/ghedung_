// import { ReactComponent as EyeIcon } from "../../../../images/forAll/eyeIcon.svg";
// import { ReactComponent as EyeIcon } from "../../../../images/forAll/eyeIcon.svg";
import React, { useState, useEffect } from "react";
import axios from "axios";
import { useNavigate } from "react-router-dom";

const NoticeSection = () => {
    const navigate = useNavigate();

    const [noticeApi, setNoticeApi] = useState();

    const fetchVideos = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/home/notices"
        );
        const data = await res.data;
        setNoticeApi(data);
    };

    useEffect(() => {
        fetchVideos();
    }, []);

    return (
        <div className="notice-section">
            <div className="contents">
                <div className="heading-wrapper">
                    <div className="title">सुचनाहरु</div>
                    {noticeApi && noticeApi?.length > 4 && (
                        <div
                            className="see-more"
                            onClick={() => {
                                navigate("/notice");
                            }}
                        >
                            थप हेर्नुहोस्
                        </div>
                    )}
                </div>
                <div className="notice-wrapper">
                    {noticeApi &&
                        noticeApi.slice(0, 4).map((item) => {
                            const {
                                id = "",
                                title = "",
                                slug = "",
                                image_link = "",
                                created_at = "",
                            } = item;

                            const months = [
                                "January",
                                "February",
                                "March",
                                "April",
                                "May",
                                "June",
                                "July",
                                "August",
                                "September",
                                "October",
                                "November",
                                "December",
                            ];
                            const d = new Date(created_at);

                            const formatedData = `${d.getDate()} ${
                                months[d.getMonth()]
                            } ${d.getFullYear()} `;

                            return (
                                <div className="notice-card" key={id}>
                                    <img
                                        src={image_link}
                                        alt=""
                                        className="card-img"
                                        onClick={() => {
                                            navigate(`/notice-detail/${slug}`);
                                        }}
                                    />
                                    <div className="text-area">
                                        <div className="created-date">
                                            {formatedData && formatedData}
                                        </div>
                                        <div
                                            className="title"
                                            onClick={() => {
                                                navigate(
                                                    `/notice-detail/${slug}`
                                                );
                                            }}
                                        >
                                            {title}
                                        </div>
                                        {/* <EyeIcon className="eye-icon" /> */}
                                    </div>
                                </div>
                            );
                        })}
                </div>
            </div>
        </div>
    );
};

export default NoticeSection;
