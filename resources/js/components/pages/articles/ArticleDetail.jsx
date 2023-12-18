import React, { useState, useEffect } from "react";
import axios from "axios";

import { useParams } from "react-router-dom";
import { LuClock9 } from "react-icons/lu";

// import { BsShareFill } from "react-icons/bs";
// import { BiLogoFacebook } from "react-icons/bi";
import { lazy } from "react";

const RelatedBar = lazy(() => import("../../forAll/RelatedBar"));

const ArticleDetail = () => {
    const { articleSlug = "" } = useParams();

    const [articleDetailApi, setArticleDetailApi] = useState();

    const fetchArticles = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL +
                `/api/article/details/${articleSlug}`
        );
        const data = await res.data;
        setArticleDetailApi(data);
    };

    useEffect(() => {
        fetchArticles();
    }, [articleSlug]);

    return (
        <div className="article-detail">
            <div className="contents">
                <div className="main-column">
                    <div className="top-head">
                        <div className="writer-side">
                            <div className="img-name-wrap">
                                <img
                                    src={
                                        articleDetailApi?.details
                                            ?.writer_image_link
                                    }
                                    alt=""
                                    className="writer-img"
                                />
                                <div className="name-address-wrap">
                                    <div className="name">
                                        {articleDetailApi?.details?.writer_name}
                                    </div>
                                    <div className="address">
                                        {
                                            articleDetailApi?.details
                                                ?.writer_address
                                        }
                                    </div>
                                </div>
                            </div>
                            <div className="date-title-wrap">
                                <LuClock9 className="clock-icon" />
                                <span className="date-tile">
                                    {
                                        articleDetailApi?.details
                                            ?.article_post_date
                                    }
                                </span>
                            </div>
                            {/* <div className="share-links-wrap">
                                <div className="num-link">
                                    <span className="num">25</span>
                                    <span className="text">Shares</span>
                                </div>
                                <BiLogoFacebook className="link-icon fb-icon" />
                                <BsShareFill className="link-icon share-icon" />
                            </div> */}
                        </div>
                        <div className="heading-side">
                            <div className="head">
                                {articleDetailApi?.details?.title}
                            </div>
                            <div className="sec-head">
                                {articleDetailApi?.details?.subtitle}
                            </div>
                        </div>
                    </div>
                    <hr />
                    <img
                        src={articleDetailApi?.details?.image_link}
                        alt=""
                        width="100%"
                    />
                    <div
                        className="desc"
                        dangerouslySetInnerHTML={{
                            __html: articleDetailApi?.details?.description,
                        }}
                    />
                </div>
                {articleDetailApi?.relateds?.[0] && (
                    <RelatedBar
                        relatedBarData={articleDetailApi?.relateds}
                        navigateSlug="article-detail"
                        barHeadText="Articles"
                        seeMoreBtn="articles"
                    />
                )}
            </div>
        </div>
    );
};

export default ArticleDetail;
