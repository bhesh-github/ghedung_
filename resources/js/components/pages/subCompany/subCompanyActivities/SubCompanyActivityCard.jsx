import React from "react";
import { useNavigate } from "react-router-dom";

const SubCompanyActivityCard = ({ cardDetail = "", subCompanySlug = "" }) => {
    const {
        title = "",
        subtitle = "",
        slug = "",
        description = "",
        image_link = "",
    } = cardDetail;
    const navigate = useNavigate();

    return (
        <div className="sub-company-activity-card">
            <div className="prawash-card">
                <div className="text-side">
                    <div
                        className="title"
                        onClick={() => {
                            setTimeout(() => {
                                navigate(
                                    `/sub-company/activity-detail/${subCompanySlug}/${slug}`
                                );
                            }, 150);
                        }}
                    >
                        {title}
                    </div>
                    <div
                        className="sub-title"
                        onClick={() => {
                            setTimeout(() => {
                                navigate(
                                    `/sub-company/activity-detail/${subCompanySlug}/${slug}`
                                );
                            }, 150);
                        }}
                    >
                        {subtitle}
                    </div>
                    {/* <div
          className="name"
          onClick={() => {
            navigate("/activity-detail");
          }}
        >
          {name}
        </div> */}
                    <div
                        className="brief"
                        dangerouslySetInnerHTML={{
                            __html: description,
                        }}
                    />
                    {/* <div className="links-wrapper">
                        <div className="icon-text-wrap">
                            <BsFillShareFill className="icon" />
                            <div>सेयर</div>
                        </div>
                    </div> */}
                </div>
                <img
                    src={image_link}
                    alt=""
                    className="card-img"
                    onClick={() => {
                        setTimeout(() => {
                            navigate(
                                `/sub-company/activity-detail/${subCompanySlug}/${slug}`
                            );
                        }, 150);
                    }}
                />
            </div>
            <hr />
        </div>
    );
};

export default SubCompanyActivityCard;
