const initialState = {
    items: [],
    selected: 0,
    name: ""
}

const categoryReducer = (state = initialState, action) => {
    console.log(action)
    switch(action.type) {
        case "LOAD_CATEGORIES":
            return {...state, items: action.categories}
        case "SET_CATEGORY":
            return {...state, selected: action.categoryId, name: action.name}
        default:
            return state;
    }
}

export default categoryReducer;