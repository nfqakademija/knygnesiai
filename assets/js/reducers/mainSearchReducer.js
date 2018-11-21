const initialState = {
    searchString: "",
    dropdownItems: []
}

const mainSearchReducer = (state = initialState, action) => {
    switch(action.type) {
        case "SET_SEARCH_STRING":
            return {...state, searchString: action.searchString}
        case "LOAD_BOOKS_DROPDOWN": 
            return {...state, dropdownItems: action.books};
        case "CLEAR_SEARCH_DROPDOWN":
            return {...state, dropdownItems: []}
        default:
            return state;
    }
}

export default mainSearchReducer;