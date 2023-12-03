import { createSlice } from "@reduxjs/toolkit";

const initialState = {
  toggleMobileCategoryBarState: false,
};

export const toggleMobileCategoryBarSlice = createSlice({
  name: "toggleMobileCategoryBar",
  initialState,
  reducers: {
    toggleMobileCategoryBar: (state) => {
      if (state.toggleMobileCategoryBarState) {
        state.toggleMobileCategoryBarState = false;
      } else {
        state.toggleMobileCategoryBarState = true;
      }
    },
  },
});

export const { toggleMobileCategoryBar } = toggleMobileCategoryBarSlice.actions;
export default toggleMobileCategoryBarSlice.reducer;
