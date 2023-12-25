import React, { useState, useEffect } from "react";
import axios from "axios";
import ReactPlayer from "react-player";
import { useNavigate } from "react-router-dom";

const VideosSection = () => {
    const navigate = useNavigate();

    const [videosApi, setVideosApi] = useState();

    const fetchVideos = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/home/videos"
        );
        const data = await res.data;
        setVideosApi(data);
    };

    useEffect(() => {
        fetchVideos();
    }, []);

    return (
        <div className="videos-section">
            {videosApi?.length > 0 && (
                <div className="contents">
                    <div className="heading-wrapper">
                        <div className="title">भिडियोहरु</div>
                        {videosApi?.length > 2 && (
                            <div
                                className="see-more"
                                onClick={() => {
                                    navigate("/gallery/videos");
                                }}
                            >
                                थप हेर्नुहोस्
                            </div>
                        )}
                    </div>
                    <div className="videos-wrapper">
                        {videosApi &&
                            videosApi.slice(0, 2).map((video) => (
                                <div key={video?.id} className="video-card">
                                    <ReactPlayer
                                        className="react-player"
                                        url={video?.link}
                                        width="100%"
                                        controls
                                    />
                                </div>
                            ))}
                    </div>
                </div>
            )}
        </div>
    );
};

export default VideosSection;
