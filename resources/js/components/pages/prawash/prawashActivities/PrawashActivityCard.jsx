import React from "react";
import { useNavigate } from "react-router-dom";

import { BsFillShareFill } from "react-icons/bs";

const PrawashActivityCard = ({ cardDetail }) => {
  const { title = "", desc = "", image_link = "" } = cardDetail;
  const navigate = useNavigate();

  return (
    <div className="prawash-activity-card">
      <div className="prawash-card">
        <div className="text-side">
          <div
            className="title"
            onClick={() => {
              navigate("/prawash/activity-detail");
            }}
          >
            {title}
          </div>
          {/* <div
          className="name"
          onClick={() => {
            navigate("/activity-detail");
          }}
        >
          {name}
        </div> */}
          <div className="brief">{desc}</div>
          <div className="links-wrapper">
            <div className="icon-text-wrap">
              <BsFillShareFill className="icon" />
              <div>सेयर</div>
            </div>
          </div>
        </div>
        <img
          src={image_link}
          alt=""
          className="card-img"
          onClick={() => {
            navigate("/prawash/activity-detail");
          }}
        />
      </div>
      <hr />
    </div>
  );
};

export default PrawashActivityCard;
