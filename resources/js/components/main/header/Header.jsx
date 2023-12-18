import { useState, useEffect } from "react";
import axios from "axios";
import { useNavigate } from "react-router-dom";
import { NavLink } from "react-router-dom";
import { RxHamburgerMenu } from "react-icons/rx";
import { SlArrowRight } from "react-icons/sl";
import { BiCaretDown } from "react-icons/bi";

export default function SearchAppBar({ navItems }) {
    const [isDropdownContainer, setIsDropdownContainer] = useState("");
    const [selectedNavLinkDetail, setSelectedNavLinkDetail] = useState({
        slugNavLinkId: null,
    });
    const [companyProfileApi, setCompanyProfileApi] = useState();
    const [subCompaniesListApi, setSubCompaniesListApi] = useState();

    const handleContainerContentClick = () => {
        setIsDropdownContainer("none");
        setTimeout(() => {
            setIsDropdownContainer("");
        }, 100);
    };

    const navigate = useNavigate();

    const fetchCompanyProfile = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/company-profile"
        );
        const data = await res.data;
        setCompanyProfileApi(data);
    };
    const fetchSubCompaniesListApi = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/nav/sub-companies"
        );
        const data = await res.data;
        setSubCompaniesListApi(data);
    };

    useEffect(() => {
        fetchCompanyProfile();
        fetchSubCompaniesListApi();
    }, []);

    return (
        <>
            <div className="header">
                <div className="nav-wrapper">
                    <div className="top-nav">
                        <img
                            src={companyProfileApi?.company_flag_link}
                            alt=""
                            className="c-logo"
                            onClick={() => {
                                navigate("/");
                            }}
                        />
                        <div className="mid-wrapper">
                            <div className="tibetian-lipi">
                                {companyProfileApi?.tibetan_lipi}
                            </div>
                            <div className="name">
                                {/* {companyProfileApi?.company_name} */}
                                नेपाल तामाङ घेदुङ
                            </div>
                            <div className="address">
                                {/* {companyProfileApi?.address} */}
                                सङ्घीय कार्यसमिति
                            </div>
                        </div>
                        <img
                            src={companyProfileApi?.company_logo_link}
                            alt=""
                            className="c-flag"
                            onClick={() => {
                                navigate("/");
                            }}
                        />
                    </div>
                    <div className="nav-menu">
                        {navItems &&
                            navItems.map((item) => {
                                const {
                                    id = "",
                                    text = "",
                                    navigateLink = "",
                                    itemType = "",
                                    sublinks = "",
                                } = item;
                                const navlinkPath = navigateLink;
                                if (sublinks) {
                                    if (itemType === "samiti") {
                                        return (
                                            <div className="dropdown" key={id}>
                                                <button className="dropbtn">
                                                    {text}
                                                    <BiCaretDown className="drop-caret-icon" />
                                                </button>
                                                <div
                                                    className="hidden-dropdown"
                                                    style={{
                                                        display:
                                                            isDropdownContainer,
                                                    }}
                                                >
                                                    <div className="dropdown-content">
                                                        {sublinks &&
                                                            sublinks.map(
                                                                (item) => {
                                                                    const {
                                                                        id = "",
                                                                        title = "",
                                                                        slug = "",
                                                                    } = item;
                                                                    return (
                                                                        <div
                                                                            onClick={() => {
                                                                                navigate(
                                                                                    `${navlinkPath}/${slug}`
                                                                                );
                                                                                handleContainerContentClick();
                                                                            }}
                                                                            key={
                                                                                id
                                                                            }
                                                                            className="drop-item"
                                                                        >
                                                                            {
                                                                                title
                                                                            }
                                                                        </div>
                                                                    );
                                                                }
                                                            )}
                                                    </div>
                                                </div>
                                            </div>
                                        );
                                    } else if (itemType === "sub-company") {
                                        return (
                                            <div className="dropdown" key={id}>
                                                <button className="dropbtn">
                                                    {text}
                                                    <BiCaretDown className="drop-caret-icon" />
                                                </button>
                                                <div
                                                    className="hidden-dropdown"
                                                    style={{
                                                        display:
                                                            isDropdownContainer,
                                                    }}
                                                >
                                                    <div className="dropdown-content">
                                                        {subCompaniesListApi?.[0] &&
                                                            subCompaniesListApi.map(
                                                                (item) => {
                                                                    const {
                                                                        id = "",
                                                                        company_name = "",
                                                                        slug = "",
                                                                    } = item;
                                                                    return (
                                                                        <div
                                                                            onClick={() => {
                                                                                navigate(
                                                                                    `${navlinkPath}/${slug}`
                                                                                );
                                                                                handleContainerContentClick();
                                                                            }}
                                                                            key={
                                                                                id
                                                                            }
                                                                            className="drop-item"
                                                                        >
                                                                            {
                                                                                company_name
                                                                            }
                                                                        </div>
                                                                    );
                                                                }
                                                            )}
                                                    </div>
                                                </div>
                                            </div>
                                        );
                                    } else {
                                        return (
                                            <div className="dropdown" key={id}>
                                                <button className="dropbtn">
                                                    {text}
                                                    <BiCaretDown className="drop-caret-icon" />
                                                </button>
                                                <div
                                                    className="hidden-dropdown"
                                                    style={{
                                                        display:
                                                            isDropdownContainer,
                                                    }}
                                                >
                                                    <div className="dropdown-content">
                                                        {sublinks &&
                                                            sublinks.map(
                                                                (item) => {
                                                                    const {
                                                                        id = "",
                                                                        title = "",
                                                                        slug = "",
                                                                    } = item;
                                                                    return (
                                                                        <div
                                                                            onClick={() => {
                                                                                navigate(
                                                                                    `${navlinkPath}/${slug}`
                                                                                );
                                                                                handleContainerContentClick();
                                                                            }}
                                                                            key={
                                                                                id
                                                                            }
                                                                            className="drop-item"
                                                                        >
                                                                            {
                                                                                title
                                                                            }
                                                                        </div>
                                                                    );
                                                                }
                                                            )}
                                                    </div>
                                                </div>
                                            </div>
                                        );
                                    }
                                } else {
                                    return (
                                        <NavLink
                                            className="nav-item"
                                            key={id}
                                            to={navigateLink}
                                        >
                                            {text}
                                        </NavLink>
                                    );
                                }
                            })}
                    </div>
                    <RxHamburgerMenu
                        className="toggle-icon"
                        aria-label="open drawer"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight"
                        aria-controls="offcanvasRight"
                    />
                </div>
            </div>
            {/* -------------------------- sidebar ------------------------ */}
            <div
                className="offcanvas offcanvas-end sidebar"
                tabIndex="-1"
                id="offcanvasRight"
                aria-labelledby="offcanvasRightLabel"
            >
                <div className="offcanvas-header">
                    <div
                        className="company-title-wrapper"
                        data-bs-dismiss="offcanvas"
                        onClick={() => {
                            navigate("/");
                        }}
                    >
                        <img
                            src={companyProfileApi?.company_logo_link}
                            className="company-logo"
                            alt=""
                        />
                        <h5
                            className="offcanvas-title company-name"
                            id="offcanvasRightLabel"
                        >
                            {/* {companyProfileApi?.company_name} */}
                            नेपाल तामाङ घेदुङ
                        </h5>
                    </div>
                    <button
                        type="button"
                        className="btn-close"
                        data-bs-dismiss="offcanvas"
                        aria-label="Close"
                    ></button>
                </div>
                <hr className="hr hr-line" />
                <div className="offcanvas-body items-wrapper">
                    {navItems &&
                        navItems.map((item) => {
                            const {
                                id = "",
                                text = "",
                                itemType = "",
                                sublinks = "",
                                navigateLink = "",
                            } = item;
                            if (!sublinks) {
                                return (
                                    <div
                                        data-bs-dismiss="offcanvas"
                                        className="nav-item"
                                        key={id}
                                        onClick={() => {
                                            navigate(`${navigateLink}`);
                                        }}
                                    >
                                        <span className="text">{text}</span>
                                    </div>
                                );
                            } else {
                                if (itemType === "samiti") {
                                    return (
                                        <div
                                            key={id}
                                            className="dropdown-wrapper"
                                            onClick={() => {
                                                setSelectedNavLinkDetail(
                                                    (prev) => ({
                                                        ...prev,
                                                        slugNavLinkId:
                                                            selectedNavLinkDetail &&
                                                            selectedNavLinkDetail.slugNavLinkId ===
                                                                id
                                                                ? null
                                                                : id,
                                                    })
                                                );
                                            }}
                                        >
                                            <div
                                                className="drop-nav-item nav-item"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#samiti"
                                                aria-expanded="false"
                                                aria-controls="collapseExample"
                                            >
                                                {text}
                                                <SlArrowRight
                                                    className="indent-arrow"

                                                    //                             className={`indent-arrow
                                                    //   ${
                                                    //       id === selectedNavLinkDetail?.slugNavLinkId &&
                                                    //       "active-indent"
                                                    //   }
                                                    //   `}
                                                />
                                            </div>
                                            <div
                                                className="collapse sublink-wrapper"
                                                id="samiti"
                                            >
                                                {sublinks.map((item) => {
                                                    const {
                                                        id = "",
                                                        title = "",
                                                        slug = "",
                                                    } = item;
                                                    return (
                                                        <div
                                                            data-bs-dismiss="offcanvas"
                                                            className="sublink-item"
                                                            key={id}
                                                            onClick={() => {
                                                                navigate(
                                                                    `${navigateLink}/${slug}`
                                                                );
                                                            }}
                                                        >
                                                            {title}
                                                        </div>
                                                    );
                                                })}
                                            </div>
                                        </div>
                                    );
                                } else if (itemType === "sub-company") {
                                    return (
                                        <div
                                            key={id}
                                            className="dropdown-wrapper"
                                            onClick={() => {
                                                setSelectedNavLinkDetail(
                                                    (prev) => ({
                                                        ...prev,
                                                        slugNavLinkId:
                                                            selectedNavLinkDetail &&
                                                            selectedNavLinkDetail.slugNavLinkId ===
                                                                id
                                                                ? null
                                                                : id,
                                                    })
                                                );
                                            }}
                                        >
                                            <div
                                                className="drop-nav-item nav-item"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#anya"
                                                aria-expanded="false"
                                                aria-controls="collapseExample"
                                            >
                                                {text}
                                                <SlArrowRight
                                                    className="indent-arrow"
                                                    //                             className={`indent-arrow
                                                    //   ${
                                                    //       id === selectedNavLinkDetail?.slugNavLinkId &&
                                                    //       "active-indent"
                                                    //   }
                                                    //   `}
                                                />
                                            </div>
                                            <div
                                                className="collapse sublink-wrapper"
                                                id="anya"
                                            >
                                                {subCompaniesListApi?.[0] &&
                                                    subCompaniesListApi.map(
                                                        (item) => {
                                                            const {
                                                                id = "",
                                                                company_name = "",
                                                                slug = "",
                                                            } = item;
                                                            return (
                                                                <div
                                                                    data-bs-dismiss="offcanvas"
                                                                    className="sublink-item"
                                                                    key={id}
                                                                    onClick={() => {
                                                                        navigate(
                                                                            `${navigateLink}/${slug}`
                                                                        );
                                                                    }}
                                                                >
                                                                    {
                                                                        company_name
                                                                    }
                                                                </div>
                                                            );
                                                        }
                                                    )}
                                            </div>
                                        </div>
                                    );
                                } else {
                                    return (
                                        <div
                                            key={id}
                                            className="dropdown-wrapper"
                                            onClick={() => {
                                                setSelectedNavLinkDetail(
                                                    (prev) => ({
                                                        ...prev,
                                                        slugNavLinkId:
                                                            selectedNavLinkDetail &&
                                                            selectedNavLinkDetail.slugNavLinkId ===
                                                                id
                                                                ? null
                                                                : id,
                                                    })
                                                );
                                            }}
                                        >
                                            <div
                                                className="drop-nav-item nav-item"
                                                data-bs-toggle="collapse"
                                                data-bs-target={`#random${id}`}
                                                aria-expanded="false"
                                                aria-controls="collapseExample"
                                            >
                                                {text}
                                                <SlArrowRight
                                                    className="indent-arrow"

                                                    //                             className={`indent-arrow
                                                    //   ${
                                                    //       id === selectedNavLinkDetail?.slugNavLinkId &&
                                                    //       "active-indent"
                                                    //   }
                                                    //   `}
                                                />
                                            </div>
                                            <div
                                                className="collapse sublink-wrapper"
                                                id={`random${id}`}
                                            >
                                                {sublinks.map((item) => {
                                                    const {
                                                        id = "",
                                                        title = "",
                                                        slug = "",
                                                    } = item;
                                                    return (
                                                        <div
                                                            data-bs-dismiss="offcanvas"
                                                            className="sublink-item"
                                                            key={id}
                                                            onClick={() => {
                                                                navigate(
                                                                    `${navigateLink}/${slug}`
                                                                );
                                                            }}
                                                        >
                                                            {title}
                                                        </div>
                                                    );
                                                })}
                                            </div>
                                        </div>
                                    );
                                }
                            }
                        })}
                </div>
            </div>
        </>
    );
}

SearchAppBar.defaultProps = {
    navItems: [
        {
            id: 0,
            text: "गृहपृष्ठ",
            // linkType: "home",
            navigateLink: "/",
        },
        {
            id: 1,
            text: "समिति",
            itemType: "samiti",
            navigateLink: "samiti",
            sublinks: [
                {
                    id: 0,
                    title: "कार्यसमिति",
                    slug: "karyasamiti",
                },
                {
                    id: 1,
                    title: "सल्लाकार",
                    slug: "sallakar",
                },
            ],
        },
        {
            id: 2,
            text: "दस्तावेज",
            // linkType: "news",
            navigateLink: "documents",
        },
        {
            id: 3,
            text: "परिचय",
            // linkType: "notice",
            navigateLink: "about",
        },
        {
            id: 4,
            text: "ग्यालेरी",
            // linkType: "archive",
            navigateLink: "gallery",
            itemType: "gallery",
            sublinks: [
                {
                    id: 0,
                    title: "फोटोहरु",
                    slug: "images",
                },
                {
                    id: 1,
                    title: "भिडियोहरु",
                    slug: "videos",
                },
            ],
        },
        {
            id: 5,
            text: "विचार",
            // linkType: "gallery",
            navigateLink: "articles",
        },
        {
            id: 6,
            text: "गतिविधि",
            // linkType: "videos",
            navigateLink: "activities",
        },
        {
            id: 7,
            text: "अन्य",
            itemType: "sub-company",
            navigateLink: "sub-company",
            sublinks: [],
        },
    ],
};
