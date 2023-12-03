import { useNavigate } from "react-router-dom";

const NewsCard = ({ news = "" }) => {
    const { title = "", slug = "", image_link = "" } = news;
    const navigate = useNavigate();
    return (
        <>
            <div className="news-blog-card">
                <div className="img-wrapper">
                    <img
                        src={image_link}
                        alt=""
                        className="news-img"
                        onClick={() => {
                            setTimeout(() => {
                                navigate(`/news-detail/${slug}`);
                            }, 150);
                        }}
                    />
                </div>
                {/* <div className="title">{title}</div> */}
                <div
                    className="news-heading"
                    onClick={() => {
                        setTimeout(() => {
                            navigate(`/news-detail/${slug}`);
                        }, 150);
                    }}
                >
                    {title}
                </div>
            </div>
        </>
    );
};
export default NewsCard;
