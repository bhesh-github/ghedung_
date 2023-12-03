import React, { useState, useEffect } from "react";
import axios from "axios";
import { useParams } from "react-router-dom";

import NoticeCard from "../../forAll/NoticeCard";
// import { BiLogoFacebook } from "react-icons/bi";
// import { BsFillShareFill, BsWhatsapp, BsSkype } from "react-icons/bs";
// import { AiOutlineTwitter } from "react-icons/ai";
// import { LuMail } from "react-icons/lu";

const NoticeDetail = () => {
    const { noticeSlug = "" } = useParams();

    const [noticeDetailApi, setNoticeDetailApi] = useState();

    const fetchNotice = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL +
                `/api/news/details/${noticeSlug}`
        );
        const data = await res.data;
        setNoticeDetailApi(data);
    };

    useEffect(() => {
        fetchNotice();
    }, [noticeSlug]);

    return (
        <div className="notice-detail-page">
            <div className="contents">
                <div className="main-column">
                    <div className="heading-wrapper">
                        <div className="heading">
                            {noticeDetailApi?.details?.title}
                        </div>
                        {/* <div className="social-icons">
              <Button className="mui-btn-wrapper fb-btn">
                <BiLogoFacebook className="social-icon" />
              </Button>
              <Button className="mui-btn-wrapper twitter-icon">
                <AiOutlineTwitter className="social-icon" />
              </Button>
              <Button className="mui-btn-wrapper share-icon">
                <BsFillShareFill className="social-icon" />
              </Button>
              <Button className="mui-btn-wrapper whatsapp-icon">
                <BsWhatsapp className="social-icon" />
              </Button>
              <Button className="mui-btn-wrapper skype-icon">
                <BsSkype className="social-icon" />
              </Button>
              <Button className="mui-btn-wrapper mail-icon">
                <LuMail className="social-icon" />
              </Button>
            </div> */}
                    </div>
                    <img
                        src="https://pbs.twimg.com/media/DysZrPzWwAAwWLP.jpg"
                        alt=""
                        className="show-image"
                    />
                    <div
                        className="desc"
                        dangerouslySetInnerHTML={{
                            __html: noticeDetailApi?.details?.description,
                        }}
                    />
                </div>
                <div className="side-column">
                    {noticeDetailApi &&
                        noticeDetailApi?.relateds?.map((item) => {
                            return (
                                <NoticeCard key={item?.id} cardDetail={item} />
                            );
                        })}
                </div>
            </div>
        </div>
    );
};

export default NoticeDetail;
