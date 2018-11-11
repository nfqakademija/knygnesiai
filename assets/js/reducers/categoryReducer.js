const initialState = {
    items: [],
    selected: []
}

const categoryReducer = (state = initialState, action) => {
    let updatedSelected;
    switch(action.type) {
        case "LOAD_CATEGORIES":
            return {...state, items: action.categories}
        case "ADD_TO_SELECTED":
            updatedSelected = state.selected.slice();
            updatedSelected.push(action.category); 
            return {...state, selected: updatedSelected}
        default:
            return state;
    }
}

export default categoryReducer;