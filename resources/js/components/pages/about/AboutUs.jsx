import React, { useState, useEffect } from "react";
import axios from "axios";
import { lazy } from "react";
const InnerBanner = lazy(() => import("../../forAll/InnerBanner"));

const AboutUs = () => {
    const [companyProfileApi, setCompanyProfileApi] = useState();

    const fetchCompnayProfile = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/company-profile"
        );
        const data = await res.data;
        setCompanyProfileApi(data);
    };

    useEffect(() => {
        fetchCompnayProfile();
    }, []);

    const innerBannerInfo = {
        pageName: "परिचय",
        // title: linkSlug === "karyasamiti" ? "कार्यसमिति" : "सल्लाकार",
    };

    return (
        <div className="about-page">
            <InnerBanner innerBannerInfo={innerBannerInfo} />
            <div className="contents">
                <div className="heading-wrapper">
                    <div className="title">परिचय</div>
                </div>
                <div className="sections-wrapper">
                    <div
                        className="short-intro"
                        dangerouslySetInnerHTML={{
                            __html: companyProfileApi?.introduction,
                        }}
                    />
                    {/* <img src={groupPhoto} alt="" className="group-photo" /> */}
                    <div className="message">
                        <div className="message-head">
                            <div className="title">अध्यक्षबाट केही कुरा</div>
                        </div>
                        <div className="message-img-wrapper">
                            <div
                                className="message-text"
                                dangerouslySetInnerHTML={{
                                    __html: companyProfileApi?.chairperson_message,
                                }}
                            />
                            <img
                                src={companyProfileApi?.chairperson_image_link}
                                alt=""
                                className="adakshya-img"
                            />
                        </div>
                    </div>
                    <div className="mission-vision-wrapper">
                        <div className="mission-vision-head">
                            <div className="title">मिसन</div>
                        </div>
                        <div
                            className="mission-vision-text"
                            dangerouslySetInnerHTML={{
                                __html: companyProfileApi?.mission,
                            }}
                        />
                    </div>
                    <div className="mission-vision-wrapper">
                        <div className="mission-vision-head">
                            <div className="title">भिजन</div>
                        </div>
                        <div
                            className="mission-vision-text"
                            dangerouslySetInnerHTML={{
                                __html: companyProfileApi?.vision,
                            }}
                        />
                    </div>
                </div>
            </div>
        </div>
    );
};

export default AboutUs;
