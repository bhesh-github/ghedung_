import React from "react";

// export default class PDFViewer extends React.Component {
//   openPdfInNewTab = () => {
//     const { src } = this.props
//     window.open(src)
//   }
//   render() {
//     const { src } = this.props
//     return (
//       <div style={{width:'800px', height:'900px'}}>
//         {/* <p><strong>Source:</strong> {src}</p> */}
//         <button onClick={this.openPdfInNewTab}>Save PDF</button>
//         <iframe src={src} style={{width: '100%', height: '100%'}}></iframe>
//       </div>
//     )
//   }
// }

const PdfViewer = ({ pdfSrc = "" }) => {
    return (
        <div className="pdf-viewer">
            <a href={pdfSrc} target="__blank">View In New Page</a>
            <iframe
            className="i-frame"
                title="pdf"
                src={pdfSrc}
                style={{ width: "100%", height: "100%" }}
            ></iframe>
        </div>
    );
};

export default PdfViewer;
