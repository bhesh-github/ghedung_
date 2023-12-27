import React from "react";
import profileIcon from "../../images/forAll/profile-icon.jpg";

const MembersCard = ({ cardInfo = "" }) => {
    const {
        name = "",
        designation = "",
        email = "",
        image_link = "",
    } = cardInfo;
    return (
        <div className="member-card">
            <img
                src={image_link}
                alt=""
                className="member-img"
                style={{ width: "100%" }}
            />
            {/* <span className="icons">
                <a href={facebook} target="__blank">
                    <GrFacebookOption className="icon fb" />
                </a>
                <a href={instagram} target="__blank">
                    <LuInstagram className="icon github" />
                </a>
                <a href={twitter} target="__blank">
                    <BsTwitterX className="icon linkedin" />
                </a>
            </span> */}
            <span className="text-wrapper">
                <div className="name">{name}</div>
                <div className="designation">{designation}</div>
                <div >{email}</div>
            </span>
        </div>
    );
};

export default MembersCard;
