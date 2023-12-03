import React, { useState, useEffect } from "react";
import axios from "axios";
import { BsTwitter, BsYoutube } from "react-icons/bs";
import { RiFacebookFill } from "react-icons/ri";

const Footer = () => {
    const [newDate, setNewDate] = useState("");
    const [companyProfileApi, setCompanyProfileApi] = useState();

    const fetchCompnayProfile = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/company-profile"
        );
        const data = await res.data;
        setCompanyProfileApi(data);
    };

    useEffect(() => {
        fetchCompnayProfile();
        const todayDate = new Date();
        const year = todayDate.getFullYear();
        setNewDate(year.toString());
    }, []);

    return (
        <div className="footer">
            <div className="contents">
                <div className="social-icons">
                    <div className="icons-wrapper">
                        <a href={companyProfileApi?.facebook} target="__blank">
                            <RiFacebookFill className="icon" />
                        </a>
                    </div>
                    <div className="icons-wrapper">
                        <a href={companyProfileApi?.twitter} target="__blank">
                            <BsTwitter className="icon" />
                        </a>
                    </div>
                    <div className="icons-wrapper">
                        <a href={companyProfileApi?.youtube} target="__blank">
                            <BsYoutube className="icon" />
                        </a>
                    </div>
                </div>
                <div className="text-wrapper">
                    <div className="title">
                        {companyProfileApi?.company_name} Central Office
                    </div>
                    <div className="hr-line"></div>
                    <div className="texts">
                        <div>Address: {companyProfileApi?.address}</div>
                        <div> Phone: {companyProfileApi?.phone}</div>
                        <div>Email: {companyProfileApi?.email}</div>
                    </div>
                </div>
                <div className="copyright">
                    Copyright © {companyProfileApi?.company_name} {newDate}. All
                    rights reserved.
                </div>
            </div>
            {/* <img src={bottomBar} alt="" className="bottom-bar-img" /> */}
        </div>
    );
};

export default Footer;
