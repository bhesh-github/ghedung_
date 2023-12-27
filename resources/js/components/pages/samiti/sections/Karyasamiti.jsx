import { lazy } from "react";

const MemberCard = lazy(() => import("../../../forAll/MembersCard"));
const PDFViewer = lazy(() => import("../../../forAll/PdfViewer"));

const Karyasamiti = ({ samitiDetailApi = "" }) => {
    return (
        <div className="karyasamiti-sec">
            <div className="heading-wrapper">
                <div className="title">{samitiDetailApi?.details?.title}</div>
            </div>
            {samitiDetailApi?.members_card?.[0] && (
                <>
                    <div className="first-card-wrapper">
                        {samitiDetailApi?.members_card
                            .slice(0, 1)
                            .map((item) => (
                                <MemberCard
                                    cardInfo={item && item}
                                    key={item.id}
                                />
                            ))}
                    </div>
                    <div className="cards-wrapper" data-aos="fade-right">
                        {samitiDetailApi?.members_card
                            .slice(1, samitiDetailApi?.members_card.length)
                            .map((item) => (
                                <MemberCard
                                    cardInfo={item && item}
                                    key={item.id}
                                />
                            ))}
                    </div>
                </>
            )}
            {samitiDetailApi?.details?.samiti_pdf && (
                <div className="pdf-wrapper">
                    <PDFViewer
                        pdfSrc={samitiDetailApi?.details?.pdf_file_link}
                    />
                </div>
            )}
        </div>
    );
};

export default Karyasamiti;
