import React, { useState, useEffect, useRef } from "react";
import axios from "axios";

import { VscClose } from "react-icons/vsc";
import ReactPlayer from "react-player";

import { lazy } from "react";
const InnerBanner = lazy(() => import("../../forAll/InnerBanner"));

const VideosPage = () => {
    const [videosApi, setVideosApi] = useState();
    const [activeVideo, setActiveVideo] = useState({
        videoLink: "",
    });

    const fetchVideos = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/videos"
        );
        const data = await res.data;
        setVideosApi(data);
    };

    useEffect(() => {
        fetchVideos();
    }, []);

    const [isSliderOverlay, setIsSliderOverlay] = useState(false);
    const playerRef = useRef();

    isSliderOverlay
        ? (document.body.style.overflowY = "hidden")
        : (document.body.style.overflowY = "scroll");

    const videoCard =
        videosApi?.[0] &&
        videosApi.map((video) => {
            const { id = "", link = "" } = video;
            return (
                <div
                    className="react-player-wrapper"
                    key={id}
                    onClick={() => {
                        setActiveVideo(link);
                        setIsSliderOverlay(true);
                    }}
                >
                    <div className="top-over-lay"></div>
                    <ReactPlayer
                        ref={playerRef}
                        url={link}
                        className="react-player"
                        volume={0}
                        muted={true}
                        controls={false}
                        onDuration={() => {}}
                        height="100%"
                        width="100%"
                        style={{
                            objectFit: "cover",
                            objectPosition: "center",
                        }}
                    />
                </div>
            );
        });
    const innerBannerInfo = {
        pageName: "भिडियोहरु",
        // title: "Rolling",
    };
    return (
        <>
            <div className="video-page">
                <InnerBanner innerBannerInfo={innerBannerInfo} />
                <div className="section-wrapper">
                    <div className="section-heading">
                        <div className="highlight">भिडियोहरु</div>
                    </div>
                    <div className="cards-wrapper">
                        {videoCard && videoCard}
                    </div>
                </div>
            </div>
            {isSliderOverlay && (
                <div className="overlay-outer">
                    <div
                        className="slider-overlay"
                        onClick={() => {
                            setIsSliderOverlay(false);
                        }}
                    >
                        <div className="btn-wrapper">
                            <VscClose
                                className="close-btn"
                                onClick={() => {
                                    setIsSliderOverlay(false);
                                }}
                            />
                        </div>
                    </div>
                    <div className="silders-comp">
                        <ReactPlayer
                            ref={playerRef}
                            url={activeVideo && activeVideo}
                            className="react-player"
                            volume={0}
                            muted={true}
                            playing={true}
                            controls={true}
                            onDuration={() => {}}
                            // height="100%"
                            width="100%"
                            style={{
                                objectFit: "cover",
                                objectPosition: "center",
                            }}
                        />
                    </div>
                </div>
            )}
        </>
    );
};

export default VideosPage;
