export const fetchCategories = () => {
    return dispatch => {
        fetch("http://127.0.0.1:8000/categories")
            .then(response => response.json())
            .then(json => dispatch(loadCategories(json)));
    }
}

export const setCategory = (categoryId) => ({
    categoryId,
    type: "SET_CATEGORY"
})

export const loadCategories = categories => ({
    categories,
    type: "LOAD_CATEGORIES"
})