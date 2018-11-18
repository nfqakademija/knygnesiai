import React from "react";
import { connect } from "react-redux";
import { NavLink } from 'react-router-dom';
import { fetchAllBooks } from "../actions/books";
import { fetchBooksByCategory } from "../actions/books";
import Book from "./Book";

class BookList extends React.Component{
    
    componentDidMount() {
        if (this.props.category) {
            this.props.fetchBooksByCategory();
        } else {
            this.props.fetchAllBooks();
        }
    }

    componentDidUpdate(props) {
        if (this.props.category != props.category) {
            this.props.fetchBooksByCategory();
        }
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
    books: state.books.items,
    category: state.categories.selected
})

const mapDispatchToProps = (dispatch, ownProps) => ({
    fetchAllBooks: () => dispatch(fetchAllBooks()),
    fetchBooksByCategory: () => dispatch(fetchBooksByCategory())
})


export default connect(mapStateToProps, mapDispatchToProps)(BookList)