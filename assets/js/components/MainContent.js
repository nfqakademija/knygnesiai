import React from 'react';
import { Route, Switch } from 'react-router-dom';
import Catalogue from './Catalogue';
import BookPreview from './BookPreview';

class MainContent extends React.Component{
    render(){
        return (
            <Switch>
              <Route exact path='/' component={ Catalogue }></Route>
              <Route path='/books/:id' component={ BookPreview }></Route>
            </Switch>
        )
    }
}

export default MainContent;

