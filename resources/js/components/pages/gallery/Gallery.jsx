import React, { useState, useEffect } from "react";
import axios from "axios";
import { useNavigate } from "react-router-dom";

import { lazy } from "react";

const InnerBanner = lazy(() => import("../../forAll/InnerBanner"));

const Gallery = () => {
    const navigate = useNavigate();

    const [galleryApi, setGalleryApi] = useState();

    const fetchGallery = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/gallery"
        );
        const data = await res.data;
        setGalleryApi(data);
    };

    useEffect(() => {
        fetchGallery();
    }, []);

    const innerBannerInfo = {
        pageName: "ग्यालेरी",
        // title: "Rolling",
    };
    return (
        <>
            <div className="gallery-page">
                <InnerBanner innerBannerInfo={innerBannerInfo} />

                <div className="contents">
                    <div className="heading-wrapper">
                        <div className="title">ग्यालेरी</div>
                    </div>
                    <div className="gallery-containers">
                        {galleryApi &&
                            galleryApi.map((item, idx) => {
                                const {
                                    id = "",
                                    name = "",
                                    slug = "",
                                    image_link = "",
                                } = item;
                                return (
                                    <div
                                        className="image-card"
                                        key={id}
                                        onClick={() => {
                                            navigate(`/gallery/${slug}/images`);
                                        }}
                                    >
                                        <div
                                            className="image-card"
                                            style={{
                                                backgroundImage: `url(${image_link})`,
                                            }}
                                        ></div>
                                        <div className="gallery-name">
                                            <div className="name">{name}</div>
                                        </div>
                                    </div>
                                );
                            })}
                    </div>
                </div>
            </div>
        </>
    );
};

export default Gallery;

