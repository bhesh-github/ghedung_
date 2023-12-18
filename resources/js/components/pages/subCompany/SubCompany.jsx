import React, { useState, useEffect } from "react";
import axios from "axios";
import { useParams } from "react-router-dom";
import { useNavigate } from "react-router-dom";
import MemberCard from "../../forAll/MembersCard";

import { lazy } from "react";
const InnerBanner = lazy(() => import("../../forAll/InnerBanner"));
const SubCompanyActivityCard = lazy(() =>
    import("./subCompanyActivities/SubCompanyActivityCard")
);

const SubCompany = () => {
    const [subCompaniesListApi, setSubCompaniesListApi] = useState();

    const navigate = useNavigate();
    const { subCompanySlug = "" } = useParams();

    const fetchSubCompanyDetail = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL +
                `/api/sub-company/details/${subCompanySlug}`
        );
        const data = await res.data;
        setSubCompaniesListApi(data);
    };

    useEffect(() => {
        fetchSubCompanyDetail();
    }, [subCompanySlug]);

    const innerBannerInfo = {
        pageName: subCompaniesListApi?.details?.company_name,
        // title: "Rolling",
    };

    return (
        <>
            <div className="sub-company-page">
                <InnerBanner innerBannerInfo={innerBannerInfo} />

                <div className="contents">
                    <div className="sastha-intro">
                        <div className="sastha-head">
                            <div className="title">संस्थाको परिचय</div>
                        </div>
                        <div className="sastha-img-wrapper">
                            <div
                                className="sastha-text"
                                dangerouslySetInnerHTML={{
                                    __html: subCompaniesListApi?.details
                                        ?.introduction,
                                }}
                            />
                            <img
                                src={
                                    subCompaniesListApi?.details
                                        ?.company_logo_link
                                }
                                alt=""
                                className="sastha-img"
                            />
                        </div>
                        {subCompaniesListApi?.team?.[0] && (
                            <div className="karya-samiti">
                                <div className="heading-wrapper">
                                    <div className="title">कार्यसमिति</div>
                                    {subCompaniesListApi?.team?.length > 4 && (
                                        <div
                                            className="see-more"
                                            onClick={() => {
                                                navigate(
                                                    `/sub-company/karyasamiti/${subCompanySlug}`
                                                );
                                            }}
                                        >
                                            थप हेर्नुहोस्
                                        </div>
                                    )}
                                </div>
                                <div
                                    className="cards-wrapper"
                                    data-aos="fade-right"
                                >
                                    {subCompaniesListApi?.team?.[0] &&
                                        subCompaniesListApi?.team
                                            .slice(0, 4)
                                            .map((item) => (
                                                <MemberCard
                                                    cardInfo={item}
                                                    key={item.id}
                                                />
                                            ))}
                                </div>
                            </div>
                        )}
                        {subCompaniesListApi?.activities?.[0] && (
                            <div className="activities-wrapper  ">
                                <div className="heading-wrapper">
                                    <div className="title">गतिविधि</div>
                                    {subCompaniesListApi?.activities?.length >
                                        4 && (
                                        <div
                                            className="see-more"
                                            onClick={() => {
                                                navigate(
                                                    `/sub-company/activities/${subCompanySlug}`
                                                );
                                            }}
                                        >
                                            थप हेर्नुहोस्
                                        </div>
                                    )}
                                </div>

                                <div className="activities-card-wrapper">
                                    {subCompaniesListApi?.activities?.[0] &&
                                        subCompaniesListApi?.activities
                                            ?.slice(0, 4)
                                            .map((item) => {
                                                return (
                                                    <SubCompanyActivityCard
                                                        key={item.id}
                                                        cardDetail={item}
                                                        subCompanySlug={
                                                            subCompanySlug
                                                        }
                                                    />
                                                );
                                            })}
                                </div>
                            </div>
                        )}
                    </div>
                </div>
            </div>
        </>
    );
};

export default SubCompany;
