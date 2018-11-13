const initialState = {
    searchString: ""
}

const mainSearchReducer = (state = initialState, action) => {
    let currentString = state.searchString;
    if (currentString != action.searchString) {
        return {...state, searchString: action.searchString}
    } else {
        return state;
    }
}

export default mainSearchReducer;