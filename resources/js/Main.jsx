import "./App.scss";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import { lazy, Suspense } from "react";

const Header = lazy(() => import("./components/main/header/Header"));
const Footer = lazy(() => import("./components/main/Footer"));
const NotFoundPage = lazy(() => import("./components/pages/NotFoundPage"));

const ScrollToTop = lazy(() => import("./components/forAll/ScrollToTop"));
const ScrollToTopBtn = lazy(() => import("./components/forAll/ScrollToTopBtn"));
const FallbackIndicator = lazy(() =>
    import("./components/forAll/fallbackIndicator/FallbackIndicator")
);

const Home = lazy(() => import("./components/pages/home/Home"));
const News = lazy(() => import("./components/pages/news/News"));
const NewsDetail = lazy(() => import("./components/pages/news/NewsDetail"));
const VideosPage = lazy(() => import("./components/pages/videos/VideosPage"));
const Notice = lazy(() => import("./components/pages/notice/Notice"));
const GalleryImages = lazy(() =>
    import("./components/pages/gallery/GalleryImages")
);
const Samiti = lazy(() => import("./components/pages/samiti/Samiti"));
const Dastabej = lazy(() => import("./components/pages/dastabej/Dastabej"));
const AboutUs = lazy(() => import("./components/pages/about/AboutUs"));
const Articles = lazy(() => import("./components/pages/articles/Articles"));
const ArticlesDetail = lazy(() =>
    import("./components/pages/articles/ArticleDetail")
);
const Activities = lazy(() =>
    import("./components/pages/activities/Activities")
);

const ActivityDetail = lazy(() =>
    import("./components/pages/activities/ActivityDetail")
);
const NoticeDetail = lazy(() =>
    import("./components/pages/notice/NoticeDetail")
);
const Gallery = lazy(() => import("./components/pages/gallery/Gallery"));

// Sub Companies
const SubCompany = lazy(() =>
    import("./components/pages/subCompany/SubCompany")
);
const SubCompanyTeamMembers = lazy(() =>
    import("./components/pages/subCompany/SubCompanyTeamMembers")
);
const SubCompanyActivities = lazy(() =>
    import(
        "./components/pages/subCompany/subCompanyActivities/SubCompanyActivities"
    )
);
const SubCompanyActivityDetail = lazy(() =>
    import(
        "./components/pages/subCompany/subCompanyActivities/SubCompanyActivityDetail"
    )
);

function Main() {
    return (
        <div className="App">
            <BrowserRouter>
                <Header />
                <Suspense fallback={<FallbackIndicator />}>
                    <ScrollToTop />
                    <Routes>
                        <Route path="/">
                            <Route index element={<Home />} />
                            <Route path="/news" element={<News />} />
                            <Route
                                path="/news-detail/:newsSlug"
                                element={<NewsDetail />}
                            />
                            <Route path="/notice" element={<Notice />} />
                            <Route
                                path="/notice-detail/:noticeSlug"
                                element={<NoticeDetail />}
                            />
                            <Route path="/gallery/videos" element={<VideosPage />} />
                            <Route
                                path="/gallery/images"
                                element={<Gallery />}
                            />
                            <Route
                                path="gallery/:gallerySlug/images"
                                element={<GalleryImages />}
                            />
                            <Route
                                path="/samiti/:linkSlug"
                                element={<Samiti />}
                            />
                            <Route path="/documents" element={<Dastabej />} />
                            <Route path="/about" element={<AboutUs />} />
                            <Route path="/articles" element={<Articles />} />
                            <Route
                                path="/article-detail/:articleSlug"
                                element={<ArticlesDetail />}
                            />
                            <Route
                                path="/activities"
                                element={<Activities />}
                            />
                            <Route
                                path="/activity-detail/:activitySlug"
                                element={<ActivityDetail />}
                            />
                            <Route
                                path="/sub-company/:subCompanySlug"
                                element={<SubCompany />}
                            />
                            <Route
                                path="/sub-company/karyasamiti/:subCompanySlug"
                                element={<SubCompanyTeamMembers />}
                            />
                            <Route
                                path="/sub-company/activities/:subCompanySlug"
                                element={<SubCompanyActivities />}
                            />
                            <Route
                                path="/sub-company/activity-detail/:subCompanySlug/:activitySlug"
                                element={<SubCompanyActivityDetail />}
                            />
                            <Route path="*" element={<NotFoundPage />} />
                        </Route>
                    </Routes>
                    <ScrollToTopBtn />
                    <Footer />
                </Suspense>
            </BrowserRouter>
        </div>
    );
}

export default Main;
