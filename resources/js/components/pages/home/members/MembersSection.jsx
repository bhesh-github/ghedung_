import React, { useState, useEffect } from "react";
import axios from "axios";
import MemberCard from "../../../forAll/MembersCard";
import { useNavigate } from "react-router-dom";

const MembersSection = () => {
    const [sliceNum, setSliceNum] = useState(6);
    // const [teamsApi, setTeamsApi] = useState();
    const [samitiListApi, setSamitiListApi] = useState([]);
    const [samitiDetailApi, setSamitiDetailApi] = useState();

    const navigate = useNavigate();

    // const fetchTeams = async () => {
    //     const res = await axios.get(
    //         import.meta.env.VITE_API_BASE_URL + "/api/home/teams"
    //     );
    //     const data = await res.data;
    //     setTeamsApi(data);
    // };
    const windowWidth = window.innerWidth;

    const fetchSamitiListApi = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/nav/samiti"
        );
        const data = await res.data;
        setSamitiListApi(data);
    };

    const fetchSamitiDetail = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL +
                `/api/samiti/details/${
                    samitiListApi && samitiListApi?.[0]?.slug
                }`
        );
        const data = await res.data;
        setSamitiDetailApi(data);
    };

    useEffect(() => {
        windowWidth <= 550 ? setSliceNum(4) : setSliceNum(6);
        fetchSamitiListApi();
        fetchSamitiDetail();
        // fetchTeams();
    }, []);

    const mCard =
        samitiDetailApi?.members_card?.[0] &&
        samitiDetailApi?.members_card
            .slice(0, sliceNum)
            .map((member) => <MemberCard cardInfo={member} key={member?.id} />);

    return (
        <div className="team-members-page">
            {samitiDetailApi?.members_card?.length > 0 && (
                <div className="in-wrapper">
                    <div className="heading-wrapper">
                        <div className="title">हाम्रो टिम</div>
                        {samitiDetailApi?.members_card?.length > sliceNum && (
                            <div
                                className="see-more"
                                onClick={() => {
                                    navigate(
                                        `/samiti/${samitiListApi?.[0]?.slug}`
                                    );
                                }}
                            >
                                थप हेर्नुहोस्
                            </div>
                        )}
                    </div>
                    <div className="cards-wrapper" data-aos="fade-right">
                        {mCard && mCard}
                    </div>
                </div>
            )}
        </div>
    );
};

export default MembersSection;
