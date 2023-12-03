import { useNavigate } from "react-router-dom";

const NoticeCard = ({ cardDetail = "" }) => {
    const navigate = useNavigate();
    const {
        title = "",
        slug = "",
        image_link = "",
        created_at = "",
    } = cardDetail;

    const months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];
    const d = new Date(created_at);

    const formatedData = `${d.getDate()} ${
        months[d.getMonth()]
    } ${d.getFullYear()} `;

    return (
        <>
            <div className="notice-card">
                <div className="img-wrapper">
                    <img
                        src={image_link}
                        alt=""
                        className="card-img"
                        onClick={() => {
                            setTimeout(() => {
                                navigate(`/notice-detail/${slug}`);
                            }, 150);
                        }}
                    />
                </div>

                <div className="text-area">
                    <div className="created-date">{formatedData}</div>
                    <div
                        className="title"
                        onClick={() => {
                            setTimeout(() => {
                                navigate(`/notice-detail/${slug}`);
                            }, 150);
                        }}
                    >
                        {title}
                    </div>
                    {/* <EyeIcon className="eye-icon" /> */}
                </div>
            </div>
        </>
    );
};
export default NoticeCard;
