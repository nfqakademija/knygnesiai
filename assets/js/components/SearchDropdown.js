import React from "react";
import { connect } from "react-redux";
import { NavLink } from "react-router-dom";


class SearchDropdown extends React.Component {
    render() {
        return (
            <div className="searchDropdown-container">
                <ul>
                    {this.props.books.map((item) => <li key={ item.id }><NavLink to={'/books/' + item.id}>{ item.title }</NavLink></li>)}
                </ul>
            </div>
        )
    }
}

const mapStateToProps = state => ({
    books: state.books.dropdownItems
})


export default connect(mapStateToProps, null)(SearchDropdown);