import React from "react";
import { GrFacebookOption } from "react-icons/gr";
import { BsTwitterX } from "react-icons/bs";
import { LuInstagram } from "react-icons/lu";

const MembersCard = ({ cardInfo = "" }) => {
    const {
        name = "",
        designation = "",
        facebook = "",
        instagram = "",
        twitter = "",
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
            <span className="icons">
                <a href={facebook} target="__blank">
                    <GrFacebookOption className="icon fb" />
                </a>
                <a href={instagram} target="__blank">
                    <LuInstagram className="icon github" />
                </a>
                <a href={twitter} target="__blank">
                    <BsTwitterX className="icon linkedin" />
                </a>
            </span>
            <span className="text-wrapper">
                <div className="name">{name}</div>
                <div className="staff-position">{designation}</div>
            </span>
        </div>
    );
};

export default MembersCard;
