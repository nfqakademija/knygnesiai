import React, { Component } from 'react';
import MainContent from './components/MainContent';
// import './App.css';

class App extends Component {
  render() {
    return (
      <React.Fragment>
          {/* <header className="header_container" alt="background" >
          
          <div className="header__absolute">
          <nav className="main-navbar">
              <ul className="meninmenu d-flex justify-content-start">
                <li className="main-navbar__item">Home</li>
                <li className="main-navbar__item">About</li>
                <li className="main-navbar__item">Books</li>
                <li className="main-navbar__item">Contacts</li>
              </ul>
          </nav>
        </div>
        </header> */}
        <MainContent />
      </React.Fragment>
      
    );
  }
}



export default App;
