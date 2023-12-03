import React, { useState, useEffect } from "react";
import axios from "axios";
import Button from "@mui/material/Button";
import { useForm } from "react-hook-form";

import { FaPhone } from "react-icons/fa";
import { GrMail } from "react-icons/gr";
import { MdLocationOn } from "react-icons/md";

import FallbackIndicator from "../../../forAll/fallbackIndicator/FallbackIndicator";
import SnackBar from "../../../forAll/SnackBar";

const ContactSection = ({ formObj }) => {
    const [companyProfileApi, setCompanyProfileApi] = useState();
    const [formSubmitting, setFormSubmitting] = useState(false);

    const [snackBarState, setSnackBarState] = useState({
        open: false,
        vertical: "bottom",
        horizontal: "center",
    });
    const [alertMessage, setAlertMessage] = useState({
        messageState: null,
        successMessage: "",
        failedMessage: "",
    });
    const handleClick = (newState) => () => {
        setSnackBarState((prev) => ({ ...prev, open: true }));
    };

    const fetchCompnayProfile = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/company-profile"
        );
        const data = await res.data;
        setCompanyProfileApi(data);
    };

    useEffect(() => {
        fetchCompnayProfile();
    }, []);

    const filteredFormInputs = formObj.filter(
        (item) =>
            item.inputType !== "textarea" && item.inputType !== "long-input"
    );
    const filteredSubjectInput = formObj.filter(
        (item) => item.inputType === "long-input"
    );
    const filteredMessageInput = formObj.filter(
        (item) => item.inputType === "textarea"
    );

    const { register, handleSubmit, reset } = useForm();

    const fetchContactPostForm = async (data) => {
        setFormSubmitting(true);
        try {
            const url = `${
                import.meta.env.VITE_API_BASE_URL
            }/api/contact/store?`;
            // Create a FormData object
            const formData = new FormData();

            // Append form fields
            formData.append("name", data.name);
            formData.append("email", data.email);
            formData.append("phone", data.phone);
            formData.append("company_name", data.company_name);
            formData.append("subject", data.subject);
            formData.append("message", data.message);

            // Send the POST request with FormData
            const response = await axios.post(url, formData);
            setTimeout(() => {
                if (response.data.status === "success") {
                    setAlertMessage((prev) => ({
                        ...prev,
                        messageState: true,
                        successMessage: "Message sent Successfully.",
                    }));
                    reset();
                } else {
                    setAlertMessage((prev) => ({
                        ...prev,
                        messageState: false,
                        failedMessage:
                            "Message was unable to send Successfully.",
                    }));
                }
                setFormSubmitting(false);
                setSnackBarState((prev) => ({ ...prev, open: true }));
                handleClick({ vertical: "bottom", horizontal: "center" });
            }, 3000);
        } catch (error) {
            // console.error("Error updating profile:", error);
        }
    };

    return (
        <>
            {formSubmitting && (
                <div className="spinner-wrapper">
                    <FallbackIndicator className="spinner" />
                </div>
            )}
            <div className="contact-section">
                <div className="contents">
                    <div className="heading-wrapper">
                        <div className="title">सम्पर्क</div>
                    </div>
                    <div className="alignment">
                        <form
                            className="form"
                            onSubmit={handleSubmit(async (data) => {
                                try {
                                    await fetchContactPostForm(data);
                                } catch (error) {}
                            })}
                        >
                            <div className="type-text">
                                {filteredFormInputs.map((item) => {
                                    const {
                                        id = "",
                                        name = "",
                                        label = "",
                                        placeholder = "",
                                        required = "",
                                    } = item;

                                    return (
                                        <div
                                            className="label-and-input-wrapper"
                                            key={id}
                                        >
                                            <label
                                                htmlFor="name"
                                                className="label"
                                            >
                                                <span className="label-text">
                                                    {label}
                                                </span>{" "}
                                                <br />
                                            </label>
                                            {required ? (
                                                <input
                                                    {...register(name)}
                                                    placeholder={placeholder}
                                                    className="input-type-text"
                                                    required
                                                />
                                            ) : (
                                                <input
                                                    {...register(name)}
                                                    placeholder={placeholder}
                                                    className="input-type-text"
                                                />
                                            )}
                                        </div>
                                    );
                                })}
                            </div>
                            <div className="type-long-input">
                                {filteredSubjectInput.map((item) => {
                                    const {
                                        id = "",
                                        name = "",
                                        label = "",
                                        placeholder = "",
                                    } = item;
                                    return (
                                        <div
                                            className="label-and-input-wrapper"
                                            key={id}
                                        >
                                            <label
                                                htmlFor="name"
                                                className="label"
                                            >
                                                <span className="label-text">
                                                    {label}
                                                </span>{" "}
                                                <br />
                                            </label>
                                            <input
                                                {...register(name)}
                                                placeholder={placeholder}
                                                className="input-type-text"
                                                required
                                            />
                                        </div>
                                    );
                                })}
                            </div>

                            <div className="type-textarea">
                                {filteredMessageInput.map((item) => {
                                    const {
                                        id = "",
                                        name = "",
                                        label = "",
                                        placeholder = "",
                                    } = item;
                                    return (
                                        <div
                                            className="label-and-textarea-wrapper"
                                            key={id}
                                        >
                                            <label
                                                htmlFor="name"
                                                className="label"
                                            >
                                                <span className="label-text">
                                                    {label}
                                                </span>{" "}
                                                <br />
                                            </label>
                                            <textarea
                                                {...register(name)}
                                                placeholder={placeholder}
                                                className="input-type-textarea"
                                                rows="4"
                                                required
                                            />
                                        </div>
                                    );
                                })}
                            </div>
                            <Button type="submit" className="submit-btn">
                                पठाउनुहोस्
                            </Button>
                        </form>

                        <div className="information">
                            <h4 className="info-heading">
                                Want to reach us directly?
                            </h4>
                            <div className="brief">
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Id dui pharetra elementum sit
                                id sagittis non donec egestas.
                            </div>
                            <div className="address-wrapper">
                                <div className="address">
                                    <span className="svg-icon-wrapper">
                                        <FaPhone className="svg-icon" />
                                    </span>
                                    <span className="details">
                                        <div>{companyProfileApi?.phone}</div>
                                    </span>
                                </div>
                                <div className="address">
                                    <span className="svg-icon-wrapper">
                                        <GrMail className="svg-icon" />
                                    </span>
                                    <span className="details">
                                        <div>{companyProfileApi?.email}</div>
                                    </span>
                                </div>
                                <div className="address">
                                    <span className="svg-icon-wrapper">
                                        <MdLocationOn className="svg-icon" />
                                    </span>
                                    <span className="details">
                                        <div>{companyProfileApi?.address}</div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <SnackBar
                alertMessage={alertMessage}
                snackBarState={snackBarState}
                setSnackBarState={setSnackBarState}
            />
        </>
    );
};

export default ContactSection;
ContactSection.defaultProps = {
    formObj: [
        {
            id: 0,
            name: "name",
            label: "नाम*",
            placeholder: "Full Name",
            inputType: "text",
            required: true,
        },
        {
            id: 1,
            label: "इमेल*",
            name: "email",
            placeholder: "email@example.com",
            inputType: "इमेल",
            required: true,
        },
        {
            id: 2,
            label: "संस्था",
            name: "company_name",
            placeholder: "Company Name",
            inputType: "text",
            required: false,
        },
        {
            id: 3,
            label: "फोन",
            name: "phone",
            placeholder: "Phone Number",
            inputType: "text",
            required: false,
        },
        {
            id: 3,
            label: "विषय*",
            name: "subject",
            placeholder: "Subject",
            inputType: "long-input",
            required: true,
        },
        {
            id: 4,
            label: "सन्देस*",
            name: "message",
            placeholder: "Your Meassage",
            inputType: "textarea",
            required: true,
        },
    ],
};
