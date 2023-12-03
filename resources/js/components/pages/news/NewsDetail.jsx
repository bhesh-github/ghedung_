import React, { useState, useEffect } from "react";
import axios from "axios";
import { useParams } from "react-router-dom";

// import Button from "@mui/material/Button";
import NewsCard from "../../forAll/NewsCard";
// import { BiLogoFacebook } from "react-icons/bi";
// import { BsFillShareFill, BsWhatsapp, BsSkype } from "react-icons/bs";
// import { AiOutlineTwitter } from "react-icons/ai";
// import { LuMail } from "react-icons/lu";

const NewsDetail = () => {
    const { newsSlug = "" } = useParams();

    const [newsDetailApi, setNewsDetailApi] = useState();

    const fetchNews = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + `/api/news/details/${newsSlug}`
        );
        const data = await res.data;
        setNewsDetailApi(data);
    };

    useEffect(() => {
        fetchNews();
    }, [newsSlug]);

    return (
        <div className="news-detail-page">
            <div className="contents">
                <div className="main-column">
                    <div className="heading-wrapper">
                        <div className="heading">
                            {newsDetailApi?.details?.title}
                        </div>
                    </div>
                    <img
                        src={newsDetailApi?.details?.writer_image_link}
                        alt=""
                        className="show-image"
                    />
                    <div
                        className="desc"
                        dangerouslySetInnerHTML={{
                            __html: newsDetailApi?.details?.description,
                        }}
                    />
                </div>
                <div className="side-column">
                    {newsDetailApi &&
                        newsDetailApi?.relateds.map((news) => {
                            return <NewsCard key={news?.id} news={news} />;
                        })}
                </div>
            </div>
        </div>
    );
};

export default NewsDetail;
