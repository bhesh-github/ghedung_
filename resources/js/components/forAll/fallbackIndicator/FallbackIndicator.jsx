import React from "react";
import ProgressIndicator from "../ProgressIndicator";

const FallbackIndicator = () => {
    
  return (
    <div className="fallback-spinner-wrapper">
      <ProgressIndicator className="spinner" />
    </div>
  );
};

export default FallbackIndicator;
