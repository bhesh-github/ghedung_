import React, { useEffect, useState } from "react";
import axios from "axios";
import { useParams } from "react-router-dom";

import { lazy } from "react";
const SubCompanyRelatedBar = lazy(() =>
    import("../../../forAll/SubCompanyRelatedBar")
);

const SubCompanyActivityDetail = () => {
    const [activityDetailApi, setActivityDetailApi] = useState();
    const { subCompanySlug = "", activitySlug = "" } = useParams();

    const fetchActivityDetail = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL +
                `/api/sub-company/activity/details/${subCompanySlug}/${activitySlug}`
        );
        const data = await res.data;
        setActivityDetailApi(data);
    };

    useEffect(() => {
        fetchActivityDetail();
    }, [subCompanySlug]);

    return (
        <div className="sub-company-activity-detail">
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
                {activityDetailApi?.relateds?.[0] && (
                    <SubCompanyRelatedBar
                        barType="subCompany"
                        relatedBarData={activityDetailApi?.relateds}
                        seeMoreBtn="activities"
                        navigateSlug="activity-detail"
                        subCompanySlug={subCompanySlug}
                    />
                )}
            </div>
        </div>
    );
};

export default SubCompanyActivityDetail;
