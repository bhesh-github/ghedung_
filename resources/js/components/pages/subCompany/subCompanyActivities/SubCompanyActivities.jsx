import { useState, useEffect } from "react";
import axios from "axios";

import { useParams } from "react-router-dom";

import { lazy } from "react";
const InnerBanner = lazy(() => import("../../../forAll/InnerBanner"));

const SubCompanyActivityCard = lazy(() => import("./SubCompanyActivityCard"));

const SubCompanyActivities = () => {
    const [subCompanyActivitiesApi, setSubCompanyActivitiesApi] = useState();

    const { subCompanySlug = "" } = useParams();

    const fetchSubCompanyActivities = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + `/api/sub-company/activities/list/${subCompanySlug}`

        );
        const data = await res.data;
        setSubCompanyActivitiesApi(data);
    };

    useEffect(() => {
        fetchSubCompanyActivities();
    }, [subCompanySlug]);

    const innerBannerInfo = {
        pageName: "अन्य गतिविधि",
        // title: "Rolling",
    };
    return (
        <div className="sub-company-activities-page">
            <InnerBanner innerBannerInfo={innerBannerInfo} />
            <div className="contents">
                <div className="heading-wrapper">
                    <div className="title">गतिविधि</div>
                </div>
                {subCompanyActivitiesApi?.[0] &&
                    subCompanyActivitiesApi.map((item) => {
                        const { id = "", activity_post_date = "" } = item;
                        return (
                            <div className="sec-by-date-wrapper" key={id}>
                                <div className="articles-date">
                                    {activity_post_date}
                                </div>
                                <SubCompanyActivityCard
                                    cardDetail={item}
                                    subCompanySlug={subCompanySlug}
                                />
                            </div>
                        );
                    })}
            </div>
        </div>
    );
};

export default SubCompanyActivities;

