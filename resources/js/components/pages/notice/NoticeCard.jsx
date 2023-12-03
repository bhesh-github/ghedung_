import React from "react";
import { useNavigate } from "react-router-dom";
import Button from "@mui/material/Button";
import { ReactComponent as EyeIcon } from "../../../images/forAll/eyeIcon.svg";

const NoticeCard = ({ newsData }) => {
  const { id = "", cardDetail = "" } = newsData;

  const navigate = useNavigate();
  const card =
    cardDetail &&
    cardDetail.map((item) => {
      const {
        id = "",
        title = "",
        // slug = "",
        // views = "",
        image_link = "",
        created_at = "",
      } = item;

      //   const months = [
      //     "January",
      //     "February",
      //     "March",
      //     "April",
      //     "May",
      //     "June",
      //     "July",
      //     "August",
      //     "September",
      //     "October",
      //     "November",
      //     "December",
      //   ];

      //   const d = new Date(created_at.slice(0, 10));
      //   const year = d.getFullYear();
      //   const month = months[d.getMonth()];
      //   const date = d.getDate();

      return (
        <div
          className="news-card"
          //   onClick={() => {
          //     navigate(`news-detail/${slug}`);
          //   }}
          key={id}
        >
          <img src={image_link} alt="" className="card-img" />
          <div className="text-wrapper">
            <div className="dates-news-text">
              <div className="dates">
                {/* {` ${date && date}, ${month && month} ${year && year}`} */}
                {created_at}
              </div>
              <div className="news-text">{title} </div>
            </div>
            <div className="views-wrapper">
              <EyeIcon className="eye-icon" />
              <span className="num">45</span>
            </div>
          </div>
        </div>
      );
    });

  return (
    <div className="carousel-outer">
      <div className="carousel-card" key={id}>
        {card && card}
      </div>
      <Button
        className="show-all-btn"
        onClick={() => {
          setTimeout(() => {
            navigate("/news-cards");
          }, 250);
        }}
      >
        Show all
      </Button>
    </div>
  );
};

export default NoticeCard;
