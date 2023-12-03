import "react-responsive-carousel/lib/styles/carousel.min.css"; // requires a loader
import { Carousel } from "react-responsive-carousel";


const ReactResponsiveCarousel = ({ images, currentImageId }) => {
  return (
    <div>
      <Carousel
        style={{ zIndex: "-9" }}
        showArrows={true}
        showThumbs={false}
        swipeable={true}
        stopOnHover={true}
        showStatus={false}
        autoPlay={false}
        selectedItem={currentImageId}
        interval="2000"
        infiniteLoop={false}
        transitionTime="400"
        className="react-responsive-carousel"
      >
        {images &&
          images.map((item, idx) => (
            <div
              key={idx}
              className="image-wrapper"
            >
              <img src={item && item} alt="" className="carousel-image" />
            </div>
          ))}
      </Carousel>
    </div>
  );
};

export default ReactResponsiveCarousel;