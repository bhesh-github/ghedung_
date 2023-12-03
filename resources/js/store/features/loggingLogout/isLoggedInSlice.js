import { createSlice } from "@reduxjs/toolkit";

const initialState = {
  isLoggedInState: false,
};

export const isLoggedInSlice = createSlice({
  name: "isLoggedIn",
  initialState,
  reducers: {
    loginReducer: (state) => {
      state.isLoggedInState = true;
    },
    logoutReducer: (state) => {
      state.isLoggedInState = false;
    },
  },
});

export const { loginReducer, logoutReducer } = isLoggedInSlice.actions;
export default isLoggedInSlice.reducer;
