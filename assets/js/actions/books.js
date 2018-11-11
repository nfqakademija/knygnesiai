export const fetchBooks = () => {
    return dispatch => {
        fetch("http://localhost:3000/books")
            .then(response => response.json())
            .then(json => dispatch(loadBooks(json)));
    }
}

export const loadBooks = books => ({
    books,
    type: "LOAD_BOOKS"
})

export const uploadBook = newBook => {
    return dispatch => {
        fetch("http://localhost:3000/books", {
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

export const addBook = newBook => ({
    newBook,
    type: "ADD_BOOK"
})

export const updateBooks = book => ({
    book,
    type: "UPDATE_BOOKS"
}) 


// export const fetchData = (filters, search, callback) => dispatch => {
//     let filteredMovies = filterMovies(movies, filters, search, callback);
//     if (callback) {
//       callback();
//     }
//     return dispatch({
//       type: "FETCH_MOVIES",
//       filteredMovies
//     });
//   };