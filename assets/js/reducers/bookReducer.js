const initialState = {
    items: []
}

const bookReducer = (state = initialState, action) => {
    let updatedBooks;
    switch(action.type) {
        case "LOAD_BOOKS":
            return {...state, items: action.books};
        case "UPDATE_BOOKS":
            updatedBooks = state.items.slice();
            updatedBooks.forEach((book, index) => {
                if (book.id === action.book.id) {
                    updatedBooks[index] = action.book;
                }
            })
            return {...state, items: updatedBooks};
        case "RESET_BOOK_LIST":
            return {...state, items: []}
        case "ADD_BOOK":
            updatedBooks = state.items.slice();
            updatedBooks.push(action.newBook);
            return {...state, items: updatedBooks};
        default:
            return state;
    }
}

export default bookReducer;