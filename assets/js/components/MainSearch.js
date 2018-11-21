import React from "react";
import { connect } from 'react-redux';
import { searchTitles } from '../actions/books';
import SearchDropdown from './SearchDropdown';
import { clearSearchDropdown } from '../actions/search';

 class MainSearch extends React.Component {
    constructor(props) {
         super(props);
         this.state = {
             displayDropdown: false
         }
         this.handleChange = this.handleChange.bind(this);
         this.toggleDropdown = this.toggleDropdown.bind(this);
    }
    handleChange(e) {
        let value = e.target.value.trim();
        if (value) {
            this.setState({displayDropdown: true})
            this.props.searchTitles(value);
        } else {
            this.props.clearSearchDropdown();
            this.setState({displayDropdown: false})
        }
    }


    toggleDropdown(e) {
        console.log(e.target)
        if (e.target.value) {
            setTimeout(() => this.setState({displayDropdown: !this.state.displayDropdown}), 100);
        }
    }
        
 
    render(){
        return(
            <div className="main-search-input-container">
                <input onBlur={ this.toggleDropdown } onFocus={ this.toggleDropdown } onChange={ this.handleChange } className="main-search-input" spellCheck="false" placeholder="Search for a book..."></input>
                {/* <button className="main-search-input__button"><span>Search<i className="main-search-input__icon fa fa-search fa-xs"></i></span></button> */}
                {this.state.displayDropdown ? <SearchDropdown /> : null}
            </div>
        )
    }
}

const mapStateToProps = state => ({
    searchString: state.mainSearch.searchString
})

const mapDispatchToProps = dispatch => ({
    searchTitles: string => dispatch(searchTitles(string)),
    clearSearchDropdown: () => dispatch(clearSearchDropdown())
})

export default connect(mapStateToProps, mapDispatchToProps)(MainSearch);
