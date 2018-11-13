import React, { Component } from 'react';
import MainContent from './components/MainContent';
import Header from './components/Header';

class App extends Component {
    render() {
        return (
            <React.Fragment>
                <Header />
                <MainContent />
            </React.Fragment>
        );
    }
}



export default App;
