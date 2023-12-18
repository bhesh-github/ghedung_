import React, { useState, useEffect } from "react";
import axios from "axios";
import NewsCard from "../../forAll/NewsCard";

import { lazy } from "react";
const InnerBanner = lazy(() => import("../../forAll/InnerBanner"));

const News = () => {
    // const [sliceNum, setSliceNum] = useState(3);
    const [newsApi, setNewsApi] = useState();

    const fetchNews = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/news/list"
        );
        // const data = await res.data.slice(0, sliceNum);
        const data = await res.data;

        // console.log("res-----------------", data.slice(0, sliceNum));
        setNewsApi(data);
    };

    useEffect(() => {
        fetchNews();
    }, []);

    // const handleInfiniteScroll = async () => {
    //     try {
    //         if (
    //             document.getElementById("cards_wrapper").getBoundingClientRect()
    //                 .bottom <=
    //             window.innerHeight + 100
    //         ) {
    //             setSliceNum((prev) => prev + prev);
    //         }
    //     } catch (error) {
    //         console.log(error);
    //     }
    // };

    // useEffect(() => {
    //     window.addEventListener("scroll", handleInfiniteScroll);
    // }, []);

    const innerBannerInfo = {
        pageName: "न्यूजहरु",
        // title: "Rolling",
    };

    return (
        <div className="news-page">
            <InnerBanner innerBannerInfo={innerBannerInfo} />
            <div className="contents">
                <div className="heading-wrapper">
                    <div className="title">न्यूजहरु</div>
                </div>
                <div className="news-cards" id="cards_wrapper">
                    {newsApi &&
                        newsApi.map((news) => {
                            return (
                                <NewsCard
                                    news={news}
                                    key={news?.id}
                                    // sentId={id}
                                    // thumbnail={thumbnail}
                                    // title={title}
                                    // desc={desc}
                                />
                            );
                        })}
                </div>
            </div>
        </div>
    );
};

export default News;

