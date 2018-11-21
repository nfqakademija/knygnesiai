import { fetchBooks } from './books';

export const setSearchString = searchString => {
    searchString = searchString.trim();
    return  (dispatch, getState) => {
        if (getState().searchString != searchString) {
            dispatch({
                searchString,
                type: "SET_SEARCH_STRING"
            });
            dispatch(fetchBooks());
        }
    }
}


export const clearSearchDropdown = () => ({
    type: "CLEAR_SEARCH_DROPDOWN"
})
