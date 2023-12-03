import React, { useState, useEffect } from "react";
import axios from "axios";
import { useNavigate } from "react-router-dom";

import { lazy } from "react";
const ArticleCard = lazy(() =>
    import("../../../forAll/pages/articles/ArticleCard")
);

const ArticlesSection = () => {
    const navigate = useNavigate();

    const [articlesApi, setArticlesApi] = useState();

    const fetchArticles = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/home/articles"
        );
        const data = await res.data;
        setArticlesApi(data);
    };

    useEffect(() => {
        fetchArticles();
    }, []);

    return (
        <div className="articles-section">
            <div className="contents">
                <div className="heading-wrapper">
                    <div className="title">विचारहरु</div>
                    {articlesApi?.length > 2 && (
                        <div
                            className="see-more"
                            onClick={() => {
                                navigate("/articles");
                            }}
                        >
                            थप हेर्नुहोस्
                        </div>
                    )}
                </div>
                <div className="sec-by-date-wrapper">
                    {articlesApi &&
                        articlesApi
                            .slice(0, 2)
                            .map((article) => (
                                <ArticleCard
                                    key={article?.id}
                                    cardDetail={article}
                                />
                            ))}
                </div>
            </div>
        </div>
    );
};

export default ArticlesSection;
