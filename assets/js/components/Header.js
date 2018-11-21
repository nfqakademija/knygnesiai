import React from 'react';
import { connect } from 'react-redux';
import { NavLink } from 'react-router-dom';
import MainSearch from './MainSearch';
import { resetFilters } from '../actions';
import { resetBookList } from '../actions/books';
import Catalogue from './Catalogue';


class Header extends React.Component {
    constructor(props) {
        super(props);
        this.handleClick = this.handleClick.bind(this);
    }

    handleClick() {
        this.props.resetBookList();
        this.props.resetFilters();
    }

    render() {
        return (
            <header className="header">
                <nav className="navBar">
                    <ul className="navBar__linkContainer">
                        <NavLink to='/'><li onClick={ this.handleClick } className="navBar__link">Home</li></NavLink>
                        <li className="navBar__link">Contacts</li>
                        <li className="navBar__link">About</li>
                    </ul>
                </nav>
                <MainSearch />
                <div className="actions">
                    <ul className="actions__container">
                        <li className="actions__link">Login</li>
                    </ul>
                </div>
            </header>
        )
    }
}


const mapDispatchToProps = dispatch => ({
    resetFilters: () => dispatch(resetFilters()),
    resetBookList: () => dispatch(resetBookList())
})

export default connect(null, mapDispatchToProps)(Header);

