import React from "react";
import { connect } from "react-redux";
import { NavLink } from "react-router-dom";
import { setSearchString } from "../actions/search";


class SearchDropdown extends React.Component {
    render() {
        return (
            <div className="search-dropdown-container">
                <ul>
                    {this.props.titles.map((obj) => 
                        <NavLink to="/">
                            <li className="search-dropdown__item" onMouseDown={ () => this.props.setSearchString(obj.title) } key={ obj.title }>{ obj.title }</li></NavLink>)}
                        
                </ul>
            </div>
        )
    }
}

const mapStateToProps = state => ({
    titles: state.mainSearch.dropdownItems
})

const mapDispatchToProps = dispatch => ({
    setSearchString: (string) => dispatch(setSearchString(string))
})


export default connect(mapStateToProps, mapDispatchToProps)(SearchDropdown);