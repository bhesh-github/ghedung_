import React, { useState, useEffect } from "react";
import axios from "axios";

const Sallahakar = () => {
    const [sallahakarApi, setSallahakarApi] = useState();

    const fetchAdvisors = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/sallahakar"
        );
        const data = await res.data;
        setSallahakarApi(data);
    };

    useEffect(() => {
        fetchAdvisors();
    }, []);

    return (
        <div className="content">
            <div className="heading-wrapper">
                <div className="title">सल्लाहकार</div>
            </div>

            <table className="names-table">
                <tr>
                    <th>क्र.सं.</th>
                    <th>नाम</th>
                    <th>इमेल</th>
                    <th>सम्पर्क नं.</th>
                    <th>ठेगाना</th>
                </tr>
                {sallahakarApi &&
                    sallahakarApi.map((item, idx) => {
                        const {
                            id = "",
                            name = "",
                            email = "",
                            phone = "",
                            address = "",
                        } = item;
                        return (
                            <tr key={id}>
                                <td>{idx + 1}.</td>
                                <td>{name}</td>
                                <td>{email}</td>
                                <td>{phone}</td>
                                <td>{address}</td>
                            </tr>
                        );
                    })}
            </table>
        </div>
    );
};

export default Sallahakar;
