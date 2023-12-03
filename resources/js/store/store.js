import { configureStore } from "@reduxjs/toolkit";
import isLoggedIn from "./features/loggingLogout/isLoggedInSlice";
import currentForm from "./features/currentForm/currentFormSlice";
import toggleMobileCategoryBar from "./features/toggleMobileCategoryBar/toggleMobileCategoryBarSlice";
import currentProfileForm from "./features/currentProfileForm/currentProfileForm";

export const store = configureStore({
  reducer: {
    isLoggedIn: isLoggedIn,
    currentForm: currentForm,
    toggleMobileCategoryBar: toggleMobileCategoryBar,
    currentProfileForm: currentProfileForm,
  },
});
