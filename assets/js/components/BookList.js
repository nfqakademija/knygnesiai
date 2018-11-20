import React from "react";
import { connect } from "react-redux";
import { NavLink } from 'react-router-dom';
import { fetchBooks } from "../actions/books";
import { fetchBooksByCategory } from "../actions/books";
import Book from "./Book";

class BookList extends React.Component{
    
    componentDidMount() {
        this.props.fetchBooks();
    }
    
    render() {
        console.log(this.props.category)
        const books = this.props.books.map((item, index) => <NavLink key={ item.id } to={'/books/' + item.id}><Book key={ item.id } {...item} /></NavLink>);
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