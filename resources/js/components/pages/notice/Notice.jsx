import React, { useState, useEffect } from "react";
import axios from "axios";
// import { ReactComponent as EyeIcon } from "../../../images/forAll/eyeIcon.svg";
import { useNavigate } from "react-router-dom";

import { lazy } from "react";
const InnerBanner = lazy(() => import("../../forAll/InnerBanner"));

const Notice = () => {
    const navigate = useNavigate();
    const [noticesApi, setNoticesApi] = useState();

    const fetchNotices = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/notices/list"
        );
        const data = await res.data;
        setNoticesApi(data);
    };

    useEffect(() => {
        fetchNotices();
    }, []);

    const innerBannerInfo = {
        pageName: "सुचनाहरु",
        // title: "Rolling",
    };

    return (
        <div className="notice-page">
            <InnerBanner innerBannerInfo={innerBannerInfo} />

            <div className="contents">
                <div className="heading-wrapper">
                    <div className="title">सुचनाहरु</div>
                </div>
                <div className="notice-wrapper">
                    {noticesApi &&
                        noticesApi.map((item) => {
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
                                    <div className="img-wrapper">
                                        <img
                                            src={image_link}
                                            alt=""
                                            className="card-img"
                                            onClick={() => {
                                                navigate(
                                                    `/notice-detail/${slug}`
                                                );
                                            }}
                                        />
                                    </div>
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

export default Notice;
