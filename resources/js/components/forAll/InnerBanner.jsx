import React from "react";

const InnerBanner = ({ innerBannerInfo }) => {
  return (
    <div className="inner-banner">
      <div className="text-wrapper">
        <h2 className="page-name">
          {innerBannerInfo &&
            innerBannerInfo.pageName &&
            innerBannerInfo.pageName}
        </h2>
        <span className="title">
          {innerBannerInfo && innerBannerInfo.title && innerBannerInfo.title}
        </span>
      </div>
    </div>
  );
};

export default InnerBanner;
