import { createSlice } from "@reduxjs/toolkit";

const initialState = {
  currentFormState: "loginForm",
};

export const currentFormSlice = createSlice({
  name: "currentForm",
  initialState,
  reducers: {
    createAccountFormReducer: (state) => {
      state.currentFormState = "createAccountForm";
    },
    loginFormReducer: (state) => {
      state.currentFormState = "loginForm";
    },
    forgotPasswordFormReducer: (state) => {
      state.currentFormState = "forgotPasswordForm";
    },
  },
});

export const {
  createAccountFormReducer,
  loginFormReducer,
  forgotPasswordFormReducer,
} = currentFormSlice.actions;
export default currentFormSlice.reducer;
