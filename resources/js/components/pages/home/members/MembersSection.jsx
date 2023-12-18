import React, { useState, useEffect } from "react";
import axios from "axios";
import MemberCard from "../../../forAll/MembersCard";
import { useNavigate } from "react-router-dom";

const MembersSection = () => {
    const [sliceNum, setSliceNum] = useState(6);
    const [teamsApi, setTeamsApi] = useState();

    const navigate = useNavigate();

    const fetchTeams = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/home/teams"
        );
        const data = await res.data;
        setTeamsApi(data);
    };
    const windowWidth = window.innerWidth;

    useEffect(() => {
        windowWidth <= 550 ? setSliceNum(4) : setSliceNum(6);
        fetchTeams();
    }, []);

    const mCard =
        teamsApi?.[0] &&
        teamsApi
            .slice(0, sliceNum)
            .map((member) => <MemberCard cardInfo={member} key={member?.id} />);

    return (
        <div className="team-members-page">
            <div className="in-wrapper">
                <div className="heading-wrapper">
                    <div className="title">हाम्रो टिम</div>
                    {teamsApi?.length > sliceNum && (
                        <div
                            className="see-more"
                            onClick={() => {
                                navigate("/samiti/karyasamiti");
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
        </div>
    );
};

export default MembersSection;
