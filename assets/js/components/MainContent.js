import React from 'react';
import { Route, Switch } from 'react-router-dom';
import Catalogue from './Catalogue';
import BookPreview from './BookPreview';
import PageNotFound from './PageNotFound';

class MainContent extends React.Component{
    render(){
        return (
            <Switch>
              <Route exact path='/' component={ Catalogue }></Route>
              <Route path='/books/:id' component={ BookPreview }></Route>
              <Route component={ PageNotFound }></Route>
            </Switch>
        )
    }
}

export default MainContent;

