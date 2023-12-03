import * as React from "react";
import Avatar from "@mui/material/Avatar";
import Stack from "@mui/material/Stack";

export default function ImageAvatars({ img_link, name }) {
  return (
    <Stack direction="row" spacing={2}>
      <Avatar
        style={{ cursor: "pointer" }}
        alt={name ? name : "R"}
        src={img_link}
        className="avatar-img"
      />
    </Stack>
  );
}
