import React, { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import axios from "axios";
import GalleryCarousel from "./GalleryCarousel";
import { VscClose } from "react-icons/vsc";
import img2 from "../../../images/pages/home/newsSection/news2.jpg";
import img3 from "../../../images/pages/home/newsSection/news3.jpg";
import img4 from "../../../images/pages/home/newsSection/news4.jpg";
import img5 from "../../../images/pages/home/newsSection/news5.jpg";
import { lazy } from "react";
const InnerBanner = lazy(() => import("../../forAll/InnerBanner"));

const GalleryImages = ({ images }) => {
    const [imagesApi, setImagesApi] = useState();

    const { gallerySlug = "" } = useParams();

    const [isSliderOverlay, setIsSliderOverlay] = useState(false);
    const [currentImageIdx, setCurrentImageIdx] = useState();

    const innerBannerInfo = {
        pageName: "फोटोहरु",
        // title: "Rolling",
    };
    const fetchImages = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL +
                `/api/gallery/${gallerySlug && gallerySlug}`
        );
        const data = await res.data;
        setImagesApi(data);
    };

    useEffect(() => {
        fetchImages();
    }, [gallerySlug]);

    return (
        <div className="gallery-images-page">
            <InnerBanner innerBannerInfo={innerBannerInfo} />

            <div className="contents">
                <div className="heading-wrapper">
                    <div className="title">फोटोहरु</div>
                </div>
                <div className="images-wrapper">
                    {imagesApi &&
                        imagesApi.map((img, idx) => {
                            const { id = "", image_link = "" } = img;
                            return (
                                <div
                                    className="card-wrapper"
                                    key={id}
                                    onClick={() => {
                                        setIsSliderOverlay(true);
                                        setCurrentImageIdx(idx);
                                    }}
                                >
                                    <div
                                        className="image-card"
                                        style={{
                                            backgroundImage: `url(${image_link})`,
                                        }}
                                    ></div>
                                </div>
                            );
                        })}
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
                    <div className="silder-comp">
                        <GalleryCarousel
                            currentImageIdx={currentImageIdx && currentImageIdx}
                            imagesList={imagesApi && imagesApi}
                        />
                    </div>
                </div>
            )}
        </div>
    );
};

export default GalleryImages;
GalleryImages.defaultProps = {
    images: [img2, img3, img4, img5, img2, img3, img4, img5],
};
