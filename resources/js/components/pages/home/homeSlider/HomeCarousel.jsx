import React, { useState, useEffect } from "react";
import axios from "axios";
import "react-responsive-carousel/lib/styles/carousel.min.css"; // requires a loader
import { Carousel } from "react-responsive-carousel";

const HomeCarousel = () => {
    const [sliderApi, setSliderApi] = useState();

    const fetchSilder = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/sliders"
        );
        const data = await res.data;
        setSliderApi(data);
    };

    useEffect(() => {
        fetchSilder();
    }, []);

    return (
        <>
            <Carousel
                style={{ zIndex: "-9" }}
                className="home-carousel"
                showArrows={false}
                showThumbs={false}
                swipeable={true}
                stopOnHover={true}
                showStatus={false}
                autoPlay={true}
                interval="3000"
                infiniteLoop={true}
                transitionTime="400"
            >
                {sliderApi &&
                    sliderApi.map((slide) => (
                        <div key={slide?.id} className="image-wrapper">
                            <img
                                src={slide?.image_link}
                                alt=""
                                className="carousel-image"
                            />
                        </div>
                    ))}
            </Carousel>
        </>
    );
};

export default HomeCarousel;
