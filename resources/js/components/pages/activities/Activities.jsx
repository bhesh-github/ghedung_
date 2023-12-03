import React, { useState, useEffect } from "react";
import axios from "axios";
// import { BsFillShareFill } from "react-icons/bs";
import { lazy } from "react";

const InnerBanner = lazy(() => import("../../forAll/InnerBanner"));
const ActivityCard = lazy(() =>
    import("../../forAll/pages/activities/ActivityCard")
);

const Activities = () => {
    const [activitiesApi, setActivitiesApi] = useState();

    const fetchArticles = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/activities/list"
        );
        const data = await res.data;
        setActivitiesApi(data);
    };

    useEffect(() => {
        fetchArticles();
    }, []);

    const innerBannerInfo = {
        pageName: "गतिविधि",
        // title: "Rolling",
    };
    return (
        <div className="activities-page">
            <InnerBanner innerBannerInfo={innerBannerInfo} />
            <div className="contents">
                <div className="heading-wrapper">
                    <div className="title">गतिविधि</div>
                </div>
                {activitiesApi &&
                    activitiesApi.map((activity) => {
                        return (
                            <div
                                className="sec-by-date-wrapper"
                                key={activity?.id}
                            >
                                <ActivityCard cardDetail={activity} />
                            </div>
                        );
                    })}
            </div>
        </div>
    );
};

export default Activities;

