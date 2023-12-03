import React, { useState, useEffect } from "react";
import axios from "axios";
import MemberCard from "../../../forAll/MembersCard";

const Karyasamiti = ({ teamMembers }) => {
    // const [sliceNum, setSliceNum] = useState(12);
    const [teamsApi, setTeamsApi] = useState();

    const fetchTeams = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/teams"
        );
        const data = await res.data;
        setTeamsApi(data);
    };

    useEffect(() => {
        fetchTeams();
    }, []);

    return (
        <div className="content">
            <div className="heading-wrapper">
                <div className="title">कार्यसमिति</div>
            </div>
            <div className="cards-wrapper" data-aos="fade-right">
                {teamsApi &&
                    teamsApi.map((item) => (
                        <MemberCard cardInfo={item && item} key={item.id} />
                    ))}
            </div>
        </div>
    );
};

export default Karyasamiti;

Karyasamiti.defaultProps = {
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
        {
            id: 7,
            image_link:
                "https://i.pinimg.com/736x/c5/e8/97/c5e897122524a087508808f30b3f2f94.jpg",
            name: "Jack Chhetri",
            position: "Senior counsler ",
            socialLinks: ["", "", ""],
        },
    ],
};
