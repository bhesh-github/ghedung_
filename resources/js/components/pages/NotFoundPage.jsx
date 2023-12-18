import React from "react";
import { useNavigate } from "react-router-dom";
import { lazy } from "react";

const InnerBanner = lazy(() => import("../forAll/InnerBanner"));

const NotFoundPage = () => {
  const navigate = useNavigate();

  // setTimeout(() => {
  //   navigate("/");
  // }, 1000);
  
  const innerBannerInfo = {
    pageName: "404 - Page Not Found",
    // title: "Rolling",
  };

  return (
    <div className="not-found-page" style={{ height: "400px" }}>
      <InnerBanner innerBannerInfo={innerBannerInfo} />
      <div className="contents">
        <div className="heading-wrapper">
          <div className="title">Page Not Found</div>
        </div>
      </div>
    </div>
  );
};

export default NotFoundPage;
