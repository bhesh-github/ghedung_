import React from "react";
import { useParams } from "react-router-dom";

import { lazy } from "react";
const InnerBanner = lazy(() => import("../../forAll/InnerBanner"));
const Karyasamiti = lazy(() => import("./pages/Karyasamiti"));
const Sallahakar = lazy(() => import("./pages/Sallahakar"));

const Samiti = () => {
    const { linkSlug = "" } = useParams();

    const innerBannerInfo = {
        pageName: "समिति",
        title: linkSlug === "karyasamiti" ? "कार्यसमिति" : "सल्लाकार",
    };

    return (
        <div className="samiti-page">
            <InnerBanner innerBannerInfo={innerBannerInfo} />
            <div className="contents">
                {linkSlug === "karyasamiti" && <Karyasamiti />}
                {linkSlug === "sallakar" && <Sallahakar />}
            </div>
        </div>
    );
};

export default Samiti;
