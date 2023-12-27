import React from "react";
import pdfImg from "../../../../images/forAll/pdf-icon.png";

const ActivitySec = ({ activitiesList }) => {
    return (
        <div className="samiti-activity-sec">
            <div className="content">
                <div className="heading-wrapper">
                    <div className="title">गतिविधि</div>
                </div>
                <div className="activities">
                    {activitiesList.map((activity) => {
                        const {
                            id = "",
                            title = "",
                            file_link = "",
                        } = activity;
                        return (
                            <a
                                key={id}
                                href={file_link}
                                target="__blank"
                                className="pdf-card"
                            >
                                <img src={pdfImg} alt="" className="pdf-img" />
                                <div className="title">{title}</div>
                            </a>
                        );
                    })}
                </div>
            </div>
        </div>
    );
};

export default ActivitySec;
