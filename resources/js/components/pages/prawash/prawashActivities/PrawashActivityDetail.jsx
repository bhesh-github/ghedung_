import React from "react";
import articleImg1 from "../../../../images/articleImg1.jpg";
import articleImg2 from "../../../../images/articleImg2.jpg";
import { lazy } from "react";
const RelatedBar = lazy(() => import("../../../forAll/RelatedBar"));

const PrawashActivityDetail = ({ relatedBarData }) => {
  return (
    <div className="prawash-activity-detail">
      <div className="contents">
        <div className="main-column">
          <div className="top-head">
            {/* <div className="writer-side">
            <div className="img-name-wrap">
              <img
                src="https://www.nayapatrikadaily.com/uploads/reporter/1056827533Sanjit-Pariyar.jpeg"
                alt=""
                className="writer-img"
              />
              <div className="name-address-wrap">
                <div className="name">संजित तामाङ</div>
                <div className="address">काठमाडाैं</div>
              </div>
            </div>
            <div className="date-title-wrap">
              <LuClock9 className="clock-icon" />
              <span className="date-tile">२०८० कार्तिक ४ शनिबार ०६:१६:००</span>
            </div>
            <div className="share-links-wrap">
              <div className="num-link">
                <span className="num">25</span>
                <span className="text">Shares</span>
              </div>
              <BiLogoFacebook className="link-icon fb-icon" />
              <BsShareFill className="link-icon share-icon" />
            </div>
          </div> */}
            <div className="heading-side">
              <div className="head">धार्मिक स्वतन्त्रता र धर्मनिरपेक्षता</div>
              <div className="sec-head">
                धर्मनिरपेक्ष हुनु भनेको आफ्नो धर्म मान्नु हो; धर्मका नाममा घृणा
                फैलाउनु, मारकाट गर्नु, अरूलाई दुःख दिनु, सताउनु, अपमानित गर्नु
                कदापि होइन ।
              </div>
            </div>
          </div>
          <hr />
          <div className="desc">
            नेपाल धार्मिक र धर्मनिरपेक्ष दुई किसिमको अतिवादमा फस्दै गएको
            देखिन्छ । र, यी दुवै अतिवादले मधेशका बहुसंख्यक हिन्दुलाई
            हिन्दुराष्ट्रवाद — जो धार्मिक अतिवादकै एउटा रूप हो — को दलदलमा
            फसाउने प्रयास गरिराखेको भान हुन्छ, ताकि केही खास वर्ग र प्रवृत्तिका
            मानिसको स्वार्थसिद्धि होस् ।
            <br />
            <br />
            <img src={articleImg1} alt="" style={{ width: "100%" }} />
            <br />
            <br />
            धरानमा गाईगोरु काट्ने घटना र त्यसलाई अमुक समुदायको अधिकारको भाष्यका
            रूपमा खडा गर्ने प्रयास एवं जनकपुर, वीरगन्ज, मलंगवा अनि नेपालगन्जमा
            चाडपर्वका नाममा वा व्यक्तिगत रिसइबीलाई साम्प्रदायिक रंग दिने र अफवाह
            फैलाएर एक समुदायलाई अर्कोसँग जुधाउने प्रयत्न मधेशलाई हिन्दु घृणाको
            रंगले पोतेर हिन्दु अतिवादसँगै भारतमा जस्तै नेपालमा हिन्दु
            राष्ट्रवादलाई आगाडि बढाउने धृष्टता हो । यी दुवै अतिवादबाट नेपाललाई
            कसरी जोगाउने, अहिलेको मुख्य प्रश्न यही हो ।
            <br />
            <br />
            पृथ्वीनारायण शाहको ‘असिल् हिन्दुस्ताना’ लाई जतिसुकै गाली गरे पनि,
            जङ्गबहादुरको हिन्दु जात–आधारित विभेदकारी सामाजिक व्यवस्थालाई जतिसुकै
            सरापे पनि र त्यसपछिको शाहवंशीय शासन व्यवस्थाको जतिसुकै खेदो खने पनि
            ती सबै अहिले संवैधानिक रूपमा विगत भइसकेका छन् । तर हिन्दुहरूको
            गाईगोरुप्रतिको श्रद्धा वा बन्देज नेपालको बहुसंख्यक हिन्दु समाजमा
            व्यापक रूपमा फैलिएर अन्तस्करणमा पसिसकेको छ । त्यसैले गाईगोरु
            काट्न–मार्न पाउनु नेपालजस्तो समाजमा धर्मनिरपेक्ष राज्यभित्रको अधिकार
            हुन सक्दैन किनभने धर्मनिरपेक्ष भनेको एक धर्म–समुदाय वा व्यक्तिले
            अर्को धर्म–समुदायको मौलिक आस्थामाथि प्रहार गर्नु होइन, सम्मान गर्नु
            हो; खास गरी त्यस्तो राज्य वा समुदायमा जहाँ सदियौंदेखि त्यो आस्था
            मौलिक रूपमा बसिसकेको छ । यसले धर्म मान्ने समुदायको मौलिक श्रद्धा र
            आस्थामाथि प्रहार गर्दछ; त्यसले गर्दा हिंसा भड्किन्छ र सामुदायिक घृणा
            फैलिन्छ । त्यस्तै, अरू धर्मप्रति घृणा फैलाउनेहरूलाई र अरू
            धर्मावलम्बीलाई अधर्मी–कुधर्मी वा नर्क जाने ठान्नु अनि धर्म भनेको
            एउटै हो, आध्यात्मिक बाटो एउटै हो, अरू धर्मै होइनन् भन्नु र त्यस्ता
            हानिकारक विचार फैलाएर पैसा वा अरू नै कुनै प्रलोभनका बलमा अरूको धर्म
            परिवर्तन गर्न खोज्नु पनि नेपालजस्तो विविधताले भरिएको मुलुकमा
            धर्मनिरपेक्षता हुन सक्दैन । व्यक्तिगत आस्थाका भरमा कसैले कुनै धर्म
            मान्छ भने त्यो अर्कै कुरा हो ।
            <br />
            <br />
            राज्यबाट धर्मलाई अलग गर्ने क्रममा हामीले न धार्मिक हुन जानिरहेका छौं
            न त धर्मनिरपेक्ष । र, यो धर्मसम्बन्धी अँध्यारो गल्लीको यात्रामा
            हाम्रा छरछिमेकी अब हिन्दीमा ‘मान न मान मैं तेरा मेहमान’ भने जस्तै
            जबरजस्ती सघाउन उद्यत छन् ।
            <br />
            <br />
            <img src={articleImg2} alt="" style={{ width: "100%" }} />
            <br />
            <br />
            धरानमा गाईगोरु काटेको प्रकरण र त्यसप्रति पक्ष–विपक्षबाट सामाजिक
            सञ्जालमा भएको प्रतिक्रिया अनि मलंगवा, वीरगन्ज र रामनवमीका अवसरमा
            जनकपुरमा भएका धार्मिक असहिष्णुताका घटनाहरूले यसबारे हाम्रो अन्योललाई
            उजागर गरेका छन् ।
          </div>
        </div>
        <RelatedBar
          relatedBarData={relatedBarData}
          seeMoreBtn="prawash/activities"
          navigateSlug="prawash/activity-detail"
        />
      </div>
    </div>
  );
};

export default PrawashActivityDetail;
PrawashActivityDetail.defaultProps = {
  relatedBarData: [
    {
      id: 0,
      title: "विचार विचारहरु कार्तिक २, २०८० निराशाबीच आएको उल्लासको पर्व",
      // name: "रमेश योन्जन तामाङ",
      desc: "नेपालमा उद्योग र उत्पादनशील क्षेत्रको प्रगति न्यून छ । यसका प्रमुख कारण आवश्यक पूर्वाधारको कमी, लगानीयोग्य वातावरण तथा नीतिगत स्थिरता नहुनु, उपयुक्त सीप तथा संख्यामा जनशक्ति अभावलगायत हुन् ।",
      image_link:
        "https://assets-cdn-api.kantipurdaily.com/thumb.php?src=https://assets-cdn.kantipurdaily.com/uploads/source/news/kantipur/2023/miscellaneous/isrealgazawarshuva-9-19102023120050-1000x0.jpg&w=300&h=0",
    },
    {
      id: 1,
      title: "एनआरएनका नयाँ मुद्दा",
      // name: "रोसन तामाङ",
      desc: "नेपालमा उद्योग र उत्पादनशील क्षेत्रको प्रगति न्यून छ । यसका प्रमुख कारण आवश्यक पूर्वाधारको कमी, लगानीयोग्य वातावरण तथा नीतिगत स्थिरता नहुनु, उपयुक्त सीप तथा संख्यामा जनशक्ति अभावलगायत हुन् ।",
      image_link:
        "https://assets-cdn-api.kantipurdaily.com/thumb.php?src=https://assets-cdn.kantipurdaily.com/uploads/source/news/kantipur/2023/ped/park-cover-19102023045048-1000x0.jpg&w=300&h=0",
    },
    {
      id: 3,
      title: "विचार विचारहरु कार्तिक २, २०८० निराशाबीच आएको उल्लासको पर्व",
      // name: "रमेश योन्जन तामाङ",
      desc: "नेपालमा उद्योग र उत्पादनशील क्षेत्रको प्रगति न्यून छ । यसका प्रमुख कारण आवश्यक पूर्वाधारको कमी, लगानीयोग्य वातावरण तथा नीतिगत स्थिरता नहुनु, उपयुक्त सीप तथा संख्यामा जनशक्ति अभावलगायत हुन् ।",
      image_link:
        "https://assets-cdn-api.kantipurdaily.com/thumb.php?src=https://assets-cdn.kantipurdaily.com/uploads/source/news/kantipur/2023/third-party/gazaa-17102023043522-1000x0.jpg&w=300&h=0",
    },
    {
      id: 4,
      title: "विचार विचारहरु कार्तिक २, २०८० निराशाबीच आएको उल्लासको पर्व",
      // name: "रमेश योन्जन तामाङ",
      desc: "नेपालमा उद्योग र उत्पादनशील क्षेत्रको प्रगति न्यून छ । यसका प्रमुख कारण आवश्यक पूर्वाधारको कमी, लगानीयोग्य वातावरण तथा नीतिगत स्थिरता नहुनु, उपयुक्त सीप तथा संख्यामा जनशक्ति अभावलगायत हुन् ।",
      image_link:
        "https://assets-cdn-api.kantipurdaily.com/thumb.php?src=https://assets-cdn.kantipurdaily.com/uploads/source/news/kantipur/2023/miscellaneous/isrealgazawarshuva-9-19102023120050-1000x0.jpg&w=300&h=0",
    },
    {
      id: 5,
      title: "एनआरएनका नयाँ मुद्दा",
      // name: "रोसन तामाङ",
      desc: "नेपालमा उद्योग र उत्पादनशील क्षेत्रको प्रगति न्यून छ । यसका प्रमुख कारण आवश्यक पूर्वाधारको कमी, लगानीयोग्य वातावरण तथा नीतिगत स्थिरता नहुनु, उपयुक्त सीप तथा संख्यामा जनशक्ति अभावलगायत हुन् ।",
      image_link:
        "https://assets-cdn-api.kantipurdaily.com/thumb.php?src=https://assets-cdn.kantipurdaily.com/uploads/source/news/kantipur/2023/ped/park-cover-19102023045048-1000x0.jpg&w=300&h=0",
    },
    {
      id: 6,
      title: "विचार विचारहरु कार्तिक २, २०८० निराशाबीच आएको उल्लासको पर्व",
      // name: "रमेश योन्जन तामाङ",
      desc: "नेपालमा उद्योग र उत्पादनशील क्षेत्रको प्रगति न्यून छ । यसका प्रमुख कारण आवश्यक पूर्वाधारको कमी, लगानीयोग्य वातावरण तथा नीतिगत स्थिरता नहुनु, उपयुक्त सीप तथा संख्यामा जनशक्ति अभावलगायत हुन् ।",
      image_link:
        "https://assets-cdn-api.kantipurdaily.com/thumb.php?src=https://assets-cdn.kantipurdaily.com/uploads/source/news/kantipur/2023/third-party/gazaa-17102023043522-1000x0.jpg&w=300&h=0",
    },
  ],
};
