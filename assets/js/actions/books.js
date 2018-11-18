export const loadBooksDropdown = books => ({
    books,
    type: "LOAD_BOOKS_DROPDOWN"
})

export const loadBooks = books => ({
    books,
    type: "LOAD_BOOKS"
})

export const addBook = newBook => ({
    newBook,
    type: "ADD_BOOK"
})

export const updateBooks = book => ({
    book,
    type: "UPDATE_BOOKS"
}) 

export const uploadBook = newBook => {
    return dispatch => {
        fetch("http://127.0.0.1:8000/books", {
            method: "POST", 
            headers: {
                "Content-Type": "application/json; charset=utf-8"
            },
            body: JSON.stringify(newBook)
        })
        .then(response => response.json())
        .then(json => dispatch(addBook(json)));
    }
}

export const fetchAllBooks = () => {
    return dispatch => {
        fetch("/api/books")
        .then(response => response.json())
        .then(json => dispatch(loadBooks(json)));
    }
}

export const fetchBooksByCategory = () => {
    return (dispatch, getState) => {
        const category = getState().categories.selected;
        fetch('/api/books/categories/' + category)
        .then(response => response.json())
        .then(json => dispatch(loadBooks(json)))
    }
}

export const searchBooks = (searchString) => {
    return dispatch => {
        fetch("/api/books?q=" + searchString)
            .then(response => response.json())
            .then(json => dispatch(loadBooksDropdown(json)));
    }
}




