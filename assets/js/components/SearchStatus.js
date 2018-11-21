import React from 'react';
import { connect } from 'react-redux';

import { setSearchString } from '../actions/search';

class SearchStatus extends React.Component {
    constructor(props){
        super(props);
    }

    render() {
        const { numberOfBooks, searchString, category, categoryName } = this.props;
        return (
            <div>
           {(searchString || category) ?
                <div className="search-status-container">
                    <div className="search-status">
                        {`We've found ${numberOfBooks} ${'book' + ((numberOfBooks > 1 || numberOfBooks < 1) ? 's' : '')} ${searchString ? 'for "' + searchString + '"': ''} ${category ? 'in ' + categoryName : ''}`}
                    </div>
                    {searchString ? <button onClick={() => this.props.clearSearch()} className="search-status__btn">Clear search</button> : null}
                </div> : 
                null
            }
            </div>
        )
    }
}



const mapStateToProps = (state) => ({
    numberOfBooks: state.books.items.length,
    searchString: state.mainSearch.searchString,
    category: state.categories.selected,
    categoryName: state.categories.name
})

const mapDispatchToProps = dispatch => ({
    clearSearch: () => dispatch(setSearchString(""))
})



export default connect(mapStateToProps, mapDispatchToProps)(SearchStatus);