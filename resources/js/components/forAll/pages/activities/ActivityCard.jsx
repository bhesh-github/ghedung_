import React from "react";
import { useNavigate } from "react-router-dom";

// import { BsFillShareFill } from "react-icons/bs";

const ActivityCard = ({ cardDetail }) => {
    const {
        title = "",
        subtitle = "",
        slug = "",
        description = "",
        activity_post_date = "",
        image_link = "",
    } = cardDetail;
    const navigate = useNavigate();

    return (
        <div className="activity-card">
            <div className="articles-date">{activity_post_date}</div>
            <div className="inner-wrapper">
                <div className="text-side">
                    <div
                        className="title"
                        onClick={() => {
                            setTimeout(() => {
                                navigate(`/activity-detail/${slug}`);
                            }, 150);
                        }}
                    >
                        {title}
                    </div>
                    <div
                        className="sub-title"
                        onClick={() => {
                            setTimeout(() => {
                                navigate(`/activity-detail/${slug}`);
                            }, 150);
                        }}
                    >
                        {subtitle}
                    </div>
                    <div
                        className="brief"
                        onClick={() => {
                            setTimeout(() => {
                                navigate(`/activity-detail/${slug}`);
                            }, 150);
                        }}
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
                            navigate(`/activity-detail/${slug}`);
                        }, 150);
                    }}
                />
            </div>
            <hr />
        </div>
    );
};

export default ActivityCard;
