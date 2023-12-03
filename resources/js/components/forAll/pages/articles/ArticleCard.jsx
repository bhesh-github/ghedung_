import React from "react";
import { useNavigate } from "react-router-dom";
// import { BsFillShareFill } from "react-icons/bs";

const ArticleCard = ({ cardDetail }) => {
    const {
        title = "",
        writer_name = "",
        slug = "",
        description = "",
        article_post_date = "",
        image_link = "",
    } = cardDetail;

    const navigate = useNavigate();

    return (
        <div className="article-card-wrapper">
            <div className="articles-date">{article_post_date}</div>
            <div className="article-card">
                <div className="text-side">
                    <div
                        className="title"
                        onClick={() => {
                            setTimeout(() => {
                                navigate(`/article-detail/${slug}`);
                            }, 150);
                        }}
                    >
                        {title}
                    </div>
                    <div
                        className="name"
                        onClick={() => {
                            setTimeout(() => {
                                navigate(`/article-detail/${slug}`);
                            }, 150);
                        }}
                    >
                        {writer_name}
                    </div>
                    <div
                        className="brief"
                        onClick={() => {
                            setTimeout(() => {
                                navigate(`/article-detail/${slug}`);
                            }, 150);
                        }}
                        dangerouslySetInnerHTML={{
                            __html: description,
                        }}
                    />
                    {/* <div className="links-wrapper">
                        <div className="icon-text-wrap">
                            <BsFillShareFill className="share-icon" />
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
                            navigate(`/article-detail/${slug}`);
                        }, 150);
                    }}
                />
            </div>
            <hr />
        </div>
    );
};

export default ArticleCard;
