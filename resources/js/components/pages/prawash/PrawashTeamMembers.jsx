import React from "react";
import MemberCard from "../../forAll/MembersCard";
import { lazy } from "react";

const InnerBanner = lazy(() => import("../../forAll/InnerBanner"));

const PrawashTeamMembers = ({ teamMembers }) => {
  const mCard =
    teamMembers &&
    teamMembers.map((item) => (
      <MemberCard cardInfo={item && item} key={item.id} />
    ));

  const innerBannerInfo = {
    pageName: "प्रवास कार्यसमिति",
  };
  return (
    <div className="prawash-karya-samiti-page">
      <InnerBanner innerBannerInfo={innerBannerInfo} />

      <div className="contents">
        <div className="heading-wrapper">
          <div className="title">कार्यसमिति</div>
        </div>
        <div className="cards-wrapper" data-aos="fade-right">
          {mCard && mCard}
        </div>
      </div>
    </div>
  );
};

export default PrawashTeamMembers;
PrawashTeamMembers.defaultProps = {
  teamMembers: [
    {
      id: 0,
      image_link:
        "https://i.pinimg.com/736x/c5/e8/97/c5e897122524a087508808f30b3f2f94.jpg",
      name: "मोहन गोल",
      position: "अध्यक्ष",
      socialLinks: ["", "", ""],
    },
    {
      id: 1,
      image_link:
        "https://i.pinimg.com/736x/c5/e8/97/c5e897122524a087508808f30b3f2f94.jpg",
      name: "कुमार सिंह घिसिङ तामाङ",
      position: "सहअध्यक्ष",
      socialLinks: ["", "", ""],
    },

    {
      id: 2,
      image_link:
        "https://i.pinimg.com/736x/c5/e8/97/c5e897122524a087508808f30b3f2f94.jpg",
      name: "Naryan Kaji",
      position: "Document Head",
      socialLinks: ["", "", ""],
    },
    {
      id: 3,
      image_link:
        "https://i.pinimg.com/736x/c5/e8/97/c5e897122524a087508808f30b3f2f94.jpg",
      name: "Jack Chhetri",
      position: "Senior counsler ",
      socialLinks: ["", "", ""],
    },
    {
      id: 4,
      image_link:
        "https://i.pinimg.com/736x/c5/e8/97/c5e897122524a087508808f30b3f2f94.jpg",
      name: "मोहन गोल",
      position: "अध्यक्ष",
      socialLinks: ["", "", ""],
    },
    {
      id: 5,
      image_link:
        "https://i.pinimg.com/736x/c5/e8/97/c5e897122524a087508808f30b3f2f94.jpg",
      name: "कुमार सिंह घिसिङ तामाङ",
      position: "सहअध्यक्ष",
      socialLinks: ["", "", ""],
    },

    {
      id: 6,
      image_link:
        "https://i.pinimg.com/736x/c5/e8/97/c5e897122524a087508808f30b3f2f94.jpg",
      name: "Naryan Kaji",
      position: "Document Head",
      socialLinks: ["", "", ""],
    },
  ],
};
