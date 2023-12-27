import React from "react";
import ReactDOM from "react-dom/client";
// import './index.scss';
import Main from "./Main";
import reportWebVitals from "./reportWebVitals";
// import { pdfjs } from 'react-pdf';
import { store } from "./store/store";
import { Provider } from "react-redux";

// pdfjs.GlobalWorkerOptions.workerSrc = new URL(
//   'pdfjs-dist/build/pdf.worker.min.js',
//   import.meta.url,
// ).toString();

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(
  <React.StrictMode>
    <Provider store={store}>
      <Main />
    </Provider>
  </React.StrictMode>
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
