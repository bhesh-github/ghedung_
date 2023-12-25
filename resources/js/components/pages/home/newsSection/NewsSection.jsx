import React, { useState, useEffect } from "react";
import axios from "axios";
import NewsCard from "../../../forAll/NewsCard";
import { useNavigate } from "react-router-dom";

const NewsSection = () => {
    const [sliceNum, setSliceNum] = useState(6);

    const [newsApi, setNewsApi] = useState();

    const navigate = useNavigate();

    const fetchNews = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/home/news"
        );
        const data = await res.data;
        setNewsApi(data);
    };

    const windowWidth = window.innerWidth;

    useEffect(() => {
        windowWidth <= 550 ? setSliceNum(2) : setSliceNum(6);
        fetchNews();
    }, []);

    return (
        <div className="news-section">
            {newsApi?.length > 0 && (
                <div className="news-contents">
                    <div className="heading-wrapper">
                        <div className="title">न्यूजहरु</div>
                        {newsApi?.length > sliceNum && (
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
                        {newsApi?.[0] &&
                            newsApi.slice(0, sliceNum).map((news) => {
                                return <NewsCard key={news?.id} news={news} />;
                            })}
                    </div>
                </div>
            )}
        </div>
    );
};

export default NewsSection;
