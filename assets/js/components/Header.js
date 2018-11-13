import React from 'react';
import MainSearch from './MainSearch';

class Header extends React.Component {
    render() {
        return (
            <header className="header">
                <nav className="navBar">
                    <ul className="navBar__linkContainer">
                        <li className="navBar__link">Home</li>
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

export default Header;

