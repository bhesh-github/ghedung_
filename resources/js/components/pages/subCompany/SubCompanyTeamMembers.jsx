import { useState, useEffect } from "react";
import axios from "axios";
import MemberCard from "../../forAll/MembersCard";
import { useParams } from "react-router-dom";

import { lazy } from "react";

const InnerBanner = lazy(() => import("../../forAll/InnerBanner"));

const SubCompanyTeamMembers = () => {
    const [subCompanyTeamApi, setSubCompanyTeamApi] = useState();

    const { subCompanySlug = "" } = useParams();

    const fetchSubCompanyTeam = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + `/api/sub-company/teams/${subCompanySlug}`

        );
        const data = await res.data;
        setSubCompanyTeamApi(data);
    };

    useEffect(() => {
        fetchSubCompanyTeam();
    }, [subCompanySlug]);

    const innerBannerInfo = {
        pageName: "अन्य कार्यसमिति",
    };
    return (
        <div className="sub-company-karya-samiti-page">
            <InnerBanner innerBannerInfo={innerBannerInfo} />

            <div className="contents">
                <div className="heading-wrapper">
                    <div className="title">कार्यसमिति</div>
                </div>
                <div className="cards-wrapper" data-aos="fade-right">
                    {subCompanyTeamApi?.[0] &&
                        subCompanyTeamApi.map((item) => (
                            <MemberCard cardInfo={item && item} key={item.id} />
                        ))}
                </div>
            </div>
        </div>
    );
};

export default SubCompanyTeamMembers;

