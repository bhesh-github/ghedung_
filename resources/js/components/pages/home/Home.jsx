import React from "react";
import HomeCarousel from "./homeSlider/HomeCarousel";
import NewsSection from "./newsSection/NewsSection";
import VideosSection from "./videos/VideosSection";
import NoticeSection from "./noticeSection/NoticeSection";

import MembersSection from "./members/MembersSection";
import ContactSection from "./contact/ContactSection";
import ArticlesSection from "./articles/ArticlesSection";

const Home = () => {
    return (
        <div className="home-page">
            <div className="contents">
                <div className="carousel-wrapper">
                    <HomeCarousel />
                </div>
                <NewsSection />
                <VideosSection />
                <NoticeSection />
                <ArticlesSection />
                <MembersSection />
                <ContactSection />
            </div>
        </div>
    );
};

export default Home;
