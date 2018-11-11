import { combineReducers } from "redux";
import books from "./bookReducer";
import categories from "./categoryReducer";

const rootReducer = combineReducers ({
    books,
    categories
})

export default rootReducer;