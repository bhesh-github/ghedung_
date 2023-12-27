import { useState, useEffect } from "react";
import axios from "axios";
import { useParams } from "react-router-dom";

import { lazy } from "react";
const InnerBanner = lazy(() => import("../../forAll/InnerBanner"));
const Karyasamiti = lazy(() => import("./sections/Karyasamiti"));
const ActivitySec = lazy(() => import("./sections/ActivitySec"));

const Samiti = () => {
    const { linkSlug = "" } = useParams();
    const [samitiDetailApi, setSamitiDetailApi] = useState();

    const fetchSamitiDetail = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL +
                `/api/samiti/details/${linkSlug}`
        );
        const data = await res.data;
        setSamitiDetailApi(data);
    };

    useEffect(() => {
        fetchSamitiDetail();
    }, [linkSlug]);

    const innerBannerInfo = {
        pageName: "समिति",
        title: samitiDetailApi?.details?.title,
    };

    return (
        <div className="samiti-page">
            <InnerBanner innerBannerInfo={innerBannerInfo} />
            <div className="contents">
                <Karyasamiti
                    samitiDetailApi={samitiDetailApi && samitiDetailApi}
                />
                {samitiDetailApi?.activities?.[0] && (
                    <ActivitySec activitiesList={samitiDetailApi?.activities} />
                )}
            </div>
        </div>
    );
};

export default Samiti;
