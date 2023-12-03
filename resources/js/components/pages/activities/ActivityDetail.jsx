import React, { useState, useEffect } from "react";
import axios from "axios";
import { useParams } from "react-router-dom";


import { lazy } from "react";
const RelatedBar = lazy(() => import("../../forAll/RelatedBar"));

const ActivityDetail = ({ relatedBarData }) => {
    const { activitySlug = "" } = useParams();

    const [activityDetailApi, setActivityDetailApi] = useState();

    const fetchArticles = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL +
                `/api/activity/details/${activitySlug}`
        );
        const data = await res.data;
        setActivityDetailApi(data);
    };

    useEffect(() => {
        fetchArticles();
    }, [activitySlug]);

    return (
        <div className="activity-detail">
            <div className="contents">
                <div className="main-column">
                    <div className="top-head">
                        <div className="heading-side">
                            <div className="head">
                                {activityDetailApi?.details?.title}
                            </div>
                            <div className="sec-head">
                                {activityDetailApi?.details?.subtitle}
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div
                        className="desc"
                        dangerouslySetInnerHTML={{
                            __html: activityDetailApi?.details?.description,
                        }}
                    />
                </div>
                <RelatedBar
                    relatedBarData={activityDetailApi?.relateds}
                    navigateSlug="activity-detail"
                    barHeadText="Activities"
                    seeMoreBtn="activities"
                />
            </div>
        </div>
    );
};

export default ActivityDetail;

