import React from "react";
import Stack from "@mui/material/Stack";
import CircularProgress from "@mui/material/CircularProgress";

const ProgressIndicator = ({ sentColor }) => {
  return (
    <Stack sx={{ color: "grey.500" }} spacing={2} direction="row">
      <CircularProgress className="spinner" style={{ color: `${sentColor}` }} />
    </Stack>
  );
};

export default ProgressIndicator;
