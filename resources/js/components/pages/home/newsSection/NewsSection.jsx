import React, { useState, useEffect } from "react";
import axios from "axios";
import NewsCard from "../../../forAll/NewsCard";
import { useNavigate } from "react-router-dom";

const NewsSection = () => {
    const navigate = useNavigate();

    const [newsApi, setNewsApi] = useState();

    const fetchNews = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/home/news"
        );
        const data = await res.data;
        setNewsApi(data);
    };

    useEffect(() => {
        fetchNews();
    }, []);

    return (
        <div className="news-section">
            <div className="news-contents">
                <div className="heading-wrapper">
                    <div className="title">न्यूजहरु</div>
                    {newsApi?.length > 6 && (
                        <div
                            className="see-more"
                            onClick={() => {
                                navigate("/news");
                            }}
                        >
                            थप हेर्नुहोस्
                        </div>
                    )}
                </div>
                <div className="news-cards">
                    {newsApi &&
                        newsApi.slice(0, 6).map((news) => {
                            return <NewsCard key={news?.id} news={news} />;
                        })}
                </div>
            </div>
        </div>
    );
};

export default NewsSection;
