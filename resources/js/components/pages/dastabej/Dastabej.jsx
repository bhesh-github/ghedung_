import React, { useState, useEffect } from "react";
import axios from "axios";

import { TfiEye } from "react-icons/tfi";

import { lazy } from "react";
const InnerBanner = lazy(() => import("../../forAll/InnerBanner"));

const Dastabej = () => {
    const [dastabejApi, setDastabejApi] = useState();

    const fetchNotices = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/downloads"
        );
        const data = await res.data;
        setDastabejApi(data);
    };

    useEffect(() => {
        fetchNotices();
    }, []);

    const innerBannerInfo = {
        pageName: "दस्तावेज",
        // title: "Rolling",
    };

    return (
        <div className="dastabej">
            <InnerBanner innerBannerInfo={innerBannerInfo} />

            <div className="section-wrapper">
                <div className="heading-wrapper">
                    <div className="title">दस्तावेज</div>
                </div>
                <div className="contents">
                    {dastabejApi &&
                        dastabejApi.map((item) => {
                            const {
                                id = "",
                                title = "",
                                downloads = "",
                            } = item;
                            if (downloads?.[0]) {
                                return (
                                    <div key={id} className="downloads-section">
                                        <h1 className="section-head">
                                            {title}
                                        </h1>
                                        {downloads &&
                                            downloads[0] &&
                                            downloads.map((item) => {
                                                const {
                                                    id = "",
                                                    title = "",
                                                    file_link = "",
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
                                                    <div
                                                        className="notice-card"
                                                        key={id}
                                                    >
                                                        <a
                                                            href={file_link}
                                                            target="__blank"
                                                            className="title-wrapper"
                                                        >
                                                            <div className="date">
                                                                {formatedData}
                                                            </div>
                                                            <div className="title">
                                                                {title}
                                                            </div>
                                                        </a>
                                                        <a
                                                            href={file_link}
                                                            target="__blank"
                                                            className="view-btn"
                                                        >
                                                            <div className="text">
                                                                View
                                                            </div>
                                                            <TfiEye className="eye-icon" />
                                                        </a>
                                                    </div>
                                                );
                                            })}
                                    </div>
                                );
                            }
                        })}
                </div>
            </div>
        </div>
    );
};

export default Dastabej;
