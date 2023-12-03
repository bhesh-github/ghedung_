import React from "react";

import {
  loginReducer,
  logoutReducer,
} from "../../../store/features/loggingLogout/isLoggedInSlice";
import { forgotPasswordFormReducer } from "../../../store/features/currentForm/currentFormSlice";

import {
  createAccountFormReducer,
  loginFormReducer,
} from "../../../store/features/currentForm/currentFormSlice";

import { profileSettingFormReducer } from "../../../store/features/currentProfileForm/currentProfileForm";
import { useNavigate } from "react-router-dom";
import { useDispatch, useSelector } from "react-redux";

import Box from "@mui/material/Box";
import Menu from "@mui/material/Menu";
import MenuItem from "@mui/material/MenuItem";
import ListItemIcon from "@mui/material/ListItemIcon";
import Divider from "@mui/material/Divider";
import IconButton from "@mui/material/IconButton";
import Tooltip from "@mui/material/Tooltip";
import Logout from "@mui/icons-material/Logout";
import LoginIcon from "@mui/icons-material/Login";
import PersonAddIcon from "@mui/icons-material/PersonAdd";
import LockResetIcon from "@mui/icons-material/LockReset";

import Avatar from "./Avatar";

export default function AccountMenu({ setLogginOut }) {
  const [anchorEl, setAnchorEl] = React.useState(null);
  const open = Boolean(anchorEl);
  const navigate = useNavigate();
  const dispatch = useDispatch();
  const isLoggedIn = useSelector((state) => state.isLoggedIn.isLoggedInState);

  const handleClick = (event) => {
    setAnchorEl(event.currentTarget);
  };
  const handleClose = () => {
    setAnchorEl(null);
  };
  const handleLogout = () => {
    setLogginOut(true);
    setTimeout(() => {
      setLogginOut(false);
      navigate("/register");
      dispatch(logoutReducer());
    }, 3000);
  };
  let userData;
  if (isLoggedIn) {
    userData = {
      imgLink:
        "https://cdn.britannica.com/47/79847-050-A78604A0/Thomas-Alva-Edison.jpg",
      name: "Thomas Alva Edison",
    };
  } else {
    userData = {
      imgLink: "",
      name: "",
    };
  }
  return (
    <>
      <Box sx={{ display: "flex", alignItems: "center", textAlign: "center" }}>
        <Tooltip title="Account settings">
          <IconButton
            onClick={handleClick}
            size="small"
            sx={{ ml: 2 }}
            aria-controls={open ? "account-menu" : undefined}
            aria-haspopup="true"
            aria-expanded={open ? "true" : undefined}
          >
            <Avatar
              img_link={userData && userData.imgLink}
              name={userData && userData.name}
            />
          </IconButton>
        </Tooltip>
      </Box>
      <Menu
        anchorEl={anchorEl}
        id="account-menu"
        open={open}
        onClose={handleClose}
        onClick={handleClose}
        className="account-menu-wrapper"
        PaperProps={{
          elevation: 0,
          sx: {
            overflow: "visible",
            filter: "drop-shadow(0px 2px 8px rgba(0,0,0,0.32))",
            mt: 1.5,
            "& .MuiAvatar-root": {
              width: 32,
              height: 32,
              ml: -0.5,
              mr: 1,
            },
            "&:before": {
              content: '""',
              display: "block",
              position: "absolute",
              top: 0,
              right: 14,
              width: 10,
              height: 10,
              bgcolor: "background.paper",
              transform: "translateY(-50%) rotate(45deg)",
              zIndex: 0,
            },
          },
        }}
        transformOrigin={{ horizontal: "right", vertical: "top" }}
        anchorOrigin={{ horizontal: "right", vertical: "bottom" }}
      >
        {isLoggedIn && (
          <>
            <MenuItem
              onClick={() => {
                // handleClose();
                // dispatch(profileSettingFormReducer());
                // navigate("/profile");
              }}
              className="profile-text"
              style={{ fontStyle: "normal !important" }}
            >
              <Avatar
                img_link={userData && userData.imgLink}
                name={userData && userData.name}
              />
              My profile
            </MenuItem>
            <Divider />
          </>
        )}
        {isLoggedIn ? (
          <>
            <MenuItem
              className="content-item"
              onClick={() => {
                handleClose();
                // dispatch(forgotPasswordFormReducer());
                // navigate("/register");
              }}
            >
              <ListItemIcon>
                <LockResetIcon
                  fontSize="small"
                  className="icon"
                  style={{ marginLeft: "-2px" }}
                />
              </ListItemIcon>
              Change password
            </MenuItem>
            <MenuItem
              className="content-item"
              onClick={() => {
                // handleClose();
                // handleLogout();
                dispatch(logoutReducer());
              }}
            >
              <ListItemIcon>
                <Logout fontSize="small" className="icon" />
              </ListItemIcon>
              Logout
            </MenuItem>
          </>
        ) : (
          <>
            <MenuItem
              className="content-item"
              onClick={() => {
                handleClose();
                // dispatch(loginFormReducer());
                // navigate("/register");
                dispatch(loginReducer());
              }}
            >
              <ListItemIcon>
                <LoginIcon
                  fontSize="small"
                  className="icon"
                  style={{ marginLeft: "-0.7px" }}
                />
              </ListItemIcon>
              Sign In
            </MenuItem>
            <MenuItem
              className="content-item"
              onClick={() => {
                // handleClose();
                // dispatch(createAccountFormReducer());
                // navigate("/register");
              }}
            >
              <ListItemIcon>
                <PersonAddIcon fontSize="small" className="icon" />
              </ListItemIcon>
              Register
            </MenuItem>
          </>
        )}
      </Menu>
    </>
  );
}
