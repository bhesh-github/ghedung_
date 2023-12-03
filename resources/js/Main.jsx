import "./App.scss";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import { lazy, Suspense } from "react";

const Header = lazy(() => import("./components/main/header/Header"));
const Footer = lazy(() => import("./components/main/Footer"));

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
const Prawash = lazy(() => import("./components/pages/prawash/Prawash"));
const PrawashTeamMembers = lazy(() =>
  import("./components/pages/prawash/PrawashTeamMembers")
);
const PrawashActivities = lazy(() =>
  import("./components/pages/prawash/prawashActivities/PrawashActivities")
);
const PrawashActivityDetail = lazy(() =>
  import("./components/pages/prawash/prawashActivities/PrawashActivityDetail")
);

const ActivityDetail = lazy(() =>
  import("./components/pages/activities/ActivityDetail")
);
const NoticeDetail = lazy(() =>
  import("./components/pages/notice/NoticeDetail")
);
const Gallery = lazy(() => import("./components/pages/gallery/Gallery"));
const NotFoundPage = lazy(() => import("./components/pages/NotFoundPage"));

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
              <Route path="/news-detail/:newsSlug" element={<NewsDetail />} />
              <Route path="/notice" element={<Notice />} />
              <Route path="/notice-detail/:noticeSlug" element={<NoticeDetail />} />
              <Route path="/videos" element={<VideosPage />} />
              <Route path="/gallery" element={<Gallery />} />
              <Route
                path="gallery/:gallerySlug/images"
                element={<GalleryImages />}
              />
              <Route path="/samiti/:linkSlug" element={<Samiti />} />
              <Route path="/documents" element={<Dastabej />} />
              <Route path="/about" element={<AboutUs />} />
              <Route path="/articles" element={<Articles />} />
              <Route path="/article-detail/:articleSlug" element={<ArticlesDetail />} />
              <Route path="/activities" element={<Activities />} />
              <Route path="/activity-detail/:activitySlug" element={<ActivityDetail />} />
              <Route path="/prawash" element={<Prawash />} />
              <Route
                path="/prawash/karyasamiti"
                element={<PrawashTeamMembers />}
              />
              <Route
                path="/prawash/activities"
                element={<PrawashActivities />}
              />
              <Route
                path="/prawash/activity-detail"
                element={<PrawashActivityDetail />}
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
