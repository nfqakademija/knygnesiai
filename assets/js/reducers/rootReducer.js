import { combineReducers } from "redux";
import books from "./bookReducer";
import categories from "./categoryReducer";
import mainSearch from  "./mainSearchReducer";

const rootReducer = combineReducers ({
    books,
    categories,
    mainSearch
})

export default rootReducer;