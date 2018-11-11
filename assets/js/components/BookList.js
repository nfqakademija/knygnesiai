import React from "react";
import { connect } from "react-redux";
import { fetchBooks } from "../actions/books";
import Book from "./Book";

class BookList extends React.Component{
    
    componentDidMount() {
        this.props.fetchBooks();
    }
    
    render() {
        const books = this.props.books.map((item, index) => <Book key={ index } {...item} />);
        return(
            <React.Fragment>
                { books }
            </React.Fragment> 
        )
    }
}

const mapStateToProps = (state) => ({
    books: state.books.items
})

const mapDispatchToProps = (dispatch, ownProps) => ({
    fetchBooks: () => dispatch(fetchBooks())
})


export default connect(mapStateToProps, mapDispatchToProps)(BookList)