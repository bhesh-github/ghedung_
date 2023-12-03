import "react-responsive-carousel/lib/styles/carousel.min.css";
import { Carousel } from "react-responsive-carousel";

const GalleryCarousel = ({ imagesList, currentImageIdx }) => {
    return (
        <div>
            <Carousel
                style={{ zIndex: "-9" }}
                // showArrows={true}
                showThumbs={false}
                swipeable={true}
                // showIndicators={false}
                stopOnHover={true}
                showStatus={false}
                autoPlay={false}
                selectedItem={currentImageIdx}
                interval="2000"
                infiniteLoop={false}
                transitionTime="400"
                showArrows={true}
                className="gallery-carousel"
            >
                {imagesList &&
                    imagesList.map((img) => {
                        const { id = "", image_link = "" } = img;

                        return (
                            <div key={id} className="image-wrapper">
                                <img
                                    src={image_link}
                                    alt=""
                                    className="slider-img"
                                />
                            </div>
                        );
                    })}
            </Carousel>
        </div>
    );
};

export default GalleryCarousel;
