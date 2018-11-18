const initialState = {
    items: [],
    selected: ""
}

const categoryReducer = (state = initialState, action) => {
    console.log(action)
    switch(action.type) {
        case "LOAD_CATEGORIES":
            return {...state, items: action.categories}
        case "SET_CATEGORY":
            // updatedSelected = state.selected.slice();
            // updatedSelected.push(action.category); 
            return {...state, selected: action.categoryId}
        default:
            return state;
    }
}

export default categoryReducer;