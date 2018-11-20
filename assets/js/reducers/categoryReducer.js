const initialState = {
    items: [],
    selected: 0
}

const categoryReducer = (state = initialState, action) => {
    switch(action.type) {
        case "LOAD_CATEGORIES":
            return {...state, items: action.categories}
        case "SET_CATEGORY":
            return {...state, selected: action.categoryId}
        default:
            return state;
    }
}

export default categoryReducer;