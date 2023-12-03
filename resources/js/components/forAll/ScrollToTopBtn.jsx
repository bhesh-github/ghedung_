import React, { useEffect, useState } from "react";
// import { AiOutlineArrowUp } from "react-icons/ai";
import { TfiArrowCircleUp } from "react-icons/tfi";

const ScrollToTopBtn = () => {
  const [isVisible, setIsVisible] = useState();
  const handleScroll = () => {
    window.scrollTo({ top: 0, left: 0, behavior: "smooth" });
  };

  const listenToScroll = () => {
    let heightToHidden = 250;
    const winScroll =
      document.body.scrollTop || document.documentElement.scrollTop;
    if (winScroll > heightToHidden) {
      setIsVisible(true);
    } else {
      setIsVisible(false);
    }
  };

  useEffect(() => {
    window.addEventListener("scroll", listenToScroll);
  }, []);

  return (
    <>
      {isVisible && (
        <div
          className="scroll-to-btn"
          onClick={() => {
            handleScroll();
          }}
        >
          <TfiArrowCircleUp className="scroll-icon" />
        </div>
      )}
    </>
  );
};

export default ScrollToTopBtn;
