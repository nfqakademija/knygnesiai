export const fetchCategories = () => {
    return dispatch => {
        fetch("http://127.0.0.1:8000/categories")
            .then(response => response.json())
            .then(json => dispatch(loadCategories(json)));
    }
}

export const loadCategories = categories => ({
    categories,
    type: "LOAD_CATEGORIES"
})