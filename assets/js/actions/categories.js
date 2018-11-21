import { fetchBooks } from './books';

export const fetchCategories = () => {
    return dispatch => {
        fetch("/categories")
        .then(response => response.json())
        .then(json => dispatch(loadCategories(json)));
    }
}

export const setCategory = (categoryId, name) => (dispatch, getState) => {
    if (getState().categories.selected === categoryId) return;
    dispatch(fetchBooks(categoryId));
    dispatch({
        categoryId,
        name,
        type: "SET_CATEGORY"
    })
}

export const loadCategories = categories => ({
    categories,
    type: "LOAD_CATEGORIES"
})