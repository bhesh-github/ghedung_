import React, { useState, useEffect } from "react";
import axios from "axios";
import { lazy } from "react";

const InnerBanner = lazy(() => import("../../forAll/InnerBanner"));
const ArticleCard = lazy(() =>
    import("../../forAll/pages/articles/ArticleCard")
);

const Articles = ({ articlesData }) => {
    const [articlesApi, setArticlesApi] = useState();

    const fetchArticles = async () => {
        const res = await axios.get(
            import.meta.env.VITE_API_BASE_URL + "/api/articles/list"
        );
        const data = await res.data;
        setArticlesApi(data);
    };

    useEffect(() => {
        fetchArticles();
    }, []);

    const innerBannerInfo = {
        pageName: "विचार",
        // title: "Rolling",
    };
    return (
        <div className="articles-page">
            <InnerBanner innerBannerInfo={innerBannerInfo} />
            <div className="contents">
                <div className="heading-wrapper">
                    <div className="title">विचारहरु</div>
                </div>
                {articlesApi &&
                    articlesApi.map((article) => {
                        return (
                            <div
                                className="sec-by-date-wrapper"
                                key={article?.id}
                            >
                                {/* {articles.map((item) => {
                                    return ( */}
                                <ArticleCard cardDetail={article} />
                                {/* );
                                })} */}
                            </div>
                        );
                    })}
            </div>
        </div>
    );
};

export default Articles;
Articles.defaultProps = {
    articlesData: [
        {
            id: 0,
            date: "कार्तिक २, २०८०",
            articles: [
                {
                    id: 0,
                    title: "विचार विचारहरु कार्तिक २, २०८० निराशाबीच आएको उल्लासको पर्व",
                    name: "रमेश योन्जन तामाङ",
                    desc: "नेपालमा उद्योग र उत्पादनशील क्षेत्रको प्रगति न्यून छ । यसका प्रमुख कारण आवश्यक पूर्वाधारको कमी, लगानीयोग्य वातावरण तथा नीतिगत स्थिरता नहुनु, उपयुक्त सीप तथा संख्यामा जनशक्ति अभावलगायत हुन् ।",
                    image_link:
                        "https://assets-cdn-api.kantipurdaily.com/thumb.php?src=https://assets-cdn.kantipurdaily.com/uploads/source/news/kantipur/2023/miscellaneous/isrealgazawarshuva-9-19102023120050-1000x0.jpg&w=300&h=0",
                },
                {
                    id: 1,
                    title: "एनआरएनका नयाँ मुद्दा",
                    name: "रोसन तामाङ",
                    desc: "नेपालमा उद्योग र उत्पादनशील क्षेत्रको प्रगति न्यून छ । यसका प्रमुख कारण आवश्यक पूर्वाधारको कमी, लगानीयोग्य वातावरण तथा नीतिगत स्थिरता नहुनु, उपयुक्त सीप तथा संख्यामा जनशक्ति अभावलगायत हुन् ।",
                    image_link:
                        "https://assets-cdn-api.kantipurdaily.com/thumb.php?src=https://assets-cdn.kantipurdaily.com/uploads/source/news/kantipur/2023/ped/park-cover-19102023045048-1000x0.jpg&w=300&h=0",
                },
                {
                    id: 3,
                    title: "विचार विचारहरु कार्तिक २, २०८० निराशाबीच आएको उल्लासको पर्व",
                    name: "रमेश योन्जन तामाङ",
                    desc: "नेपालमा उद्योग र उत्पादनशील क्षेत्रको प्रगति न्यून छ । यसका प्रमुख कारण आवश्यक पूर्वाधारको कमी, लगानीयोग्य वातावरण तथा नीतिगत स्थिरता नहुनु, उपयुक्त सीप तथा संख्यामा जनशक्ति अभावलगायत हुन् ।",
                    image_link:
                        "https://assets-cdn-api.kantipurdaily.com/thumb.php?src=https://assets-cdn.kantipurdaily.com/uploads/source/news/kantipur/2023/third-party/gazaa-17102023043522-1000x0.jpg&w=300&h=0",
                },
            ],
        },
        {
            id: 1,
            date: "आश्विन २८, २०८०",
            articles: [
                {
                    id: 0,
                    title: "विचार विचारहरु कार्तिक २, २०८० निराशाबीच आएको उल्लासको पर्व",
                    name: "रमेश योन्जन तामाङ",
                    desc: "नेपालमा उद्योग र उत्पादनशील क्षेत्रको प्रगति न्यून छ । यसका प्रमुख कारण आवश्यक पूर्वाधारको कमी, लगानीयोग्य वातावरण तथा नीतिगत स्थिरता नहुनु, उपयुक्त सीप तथा संख्यामा जनशक्ति अभावलगायत हुन् ।",
                    image_link:
                        "https://assets-cdn-api.kantipurdaily.com/thumb.php?src=https://assets-cdn.kantipurdaily.com/uploads/source/news/kantipur/2023/ped/sskc-19102023044919-1000x0.jpg&w=300&h=0",
                },
            ],
        },
        {
            id: 2,
            date: "असार २, २०८०",
            articles: [
                {
                    id: 0,
                    title: "विचार विचारहरु कार्तिक २, २०८० निराशाबीच आएको उल्लासको पर्व",
                    name: "रमेश योन्जन तामाङ",
                    desc: "नेपालमा उद्योग र उत्पादनशील क्षेत्रको प्रगति न्यून छ । यसका प्रमुख कारण आवश्यक पूर्वाधारको कमी, लगानीयोग्य वातावरण तथा नीतिगत स्थिरता नहुनु, उपयुक्त सीप तथा संख्यामा जनशक्ति अभावलगायत हुन् ।",
                    image_link:
                        "https://assets-cdn-api.kantipurdaily.com/thumb.php?src=https://assets-cdn.kantipurdaily.com/uploads/source/news/kantipur/2023/ped/ck-lal-lekh-18102023054706-1000x0.jpg&w=300&h=0",
                },
                {
                    id: 1,
                    title: "एनआरएनका नयाँ मुद्दा",
                    name: "रोसन तामाङ",
                    desc: "नेपालमा उद्योग र उत्पादनशील क्षेत्रको प्रगति न्यून छ । यसका प्रमुख कारण आवश्यक पूर्वाधारको कमी, लगानीयोग्य वातावरण तथा नीतिगत स्थिरता नहुनु, उपयुक्त सीप तथा संख्यामा जनशक्ति अभावलगायत हुन् ।",
                    image_link:
                        "https://assets-cdn-api.kantipurdaily.com/thumb.php?src=https://assets-cdn.kantipurdaily.com/uploads/source/news/kantipur/2023/ped/duo-cover-20102023043347-1000x0.jpg&w=300&h=0",
                },
            ],
        },
    ],
};
