import { createSlice } from "@reduxjs/toolkit";

const initialState = {
  currentProfileFormState: "profileSettingForm",
};

export const currentProfileFormSlice = createSlice({
  name: "currentProfileForm",
  initialState,
  reducers: {
    profileSettingFormReducer: (state) => {
      state.currentProfileFormState = "profileSettingForm";
    },
    myOrdersFormReducer: (state) => {
      state.currentProfileFormState = "myOrdersForm";
    },
    previousOrdersFormReducer: (state) => {
      state.currentProfileFormState = "previousOrdersForm";
    },
    deliveryAddressFormReducer: (state) => {
      state.currentProfileFormState = "deliveryAddressForm";
    },
  },
});

export const {
  profileSettingFormReducer,
  myOrdersFormReducer,
  previousOrdersFormReducer,
  deliveryAddressFormReducer,
} = currentProfileFormSlice.actions;
export default currentProfileFormSlice.reducer;
