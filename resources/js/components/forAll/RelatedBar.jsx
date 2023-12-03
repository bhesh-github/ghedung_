import React from "react";
import { useNavigate } from "react-router-dom";

const RelatedBar = ({
    relatedBarData = "",
    navigateSlug = "",
    barHeadText = "",
    seeMoreBtn = "",
}) => {
    const navigate = useNavigate();

    // const navigateLink = barType === 'activities' ? 'activityDetail' :

    return (
        <div className="related-bar">
            <div className="bar-head">Related {barHeadText}</div>
            <div className="articles">
                {relatedBarData &&
                    relatedBarData.slice(0, 4).map((item) => {
                        const {
                            id = "",
                            slug = "",
                            title = "",
                            writer_name = "",
                            activity_post_date = "",
                            image_link = "",
                        } = item;
                        return (
                            <div
                                className="article"
                                key={id}
                                onClick={() => {
                                    navigate(`/${navigateSlug}/${slug}`);
                                }}
                            >
                                <img
                                    src={image_link}
                                    alt=""
                                    className="article-img"
                                />
                                <div className="texts">
                                    <div className="head">{title}</div>
                                    <div className="writer-name">
                                        {writer_name
                                            ? writer_name
                                            : activity_post_date}
                                    </div>
                                </div>
                            </div>
                        );
                    })}
            </div>
            {relatedBarData && relatedBarData.length > 4 && (
                <div
                    className="see-more-btn"
                    onClick={() => {
                        navigate(`/${seeMoreBtn}`);
                    }}
                >
                    थप हेर्नुहोस्
                </div>
            )}
        </div>
    );
};

export default RelatedBar;
