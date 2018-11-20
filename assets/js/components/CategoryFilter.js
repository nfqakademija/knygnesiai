import React from 'react';
import { connect } from 'react-redux';
import { fetchCategories } from "../actions/categories";
import { setCategory } from "../actions/categories";

class CategoryFilter extends React.Component {
    
    componentDidMount() {
        this.props.fetchCategories();
    }

    render() {
        const categories = this.props.categories.map(item => 
            <li onClick={() => this.props.setCategory(item.id)} className={ "filter-list__item " + (this.props.selected === item.id ? "filter-list__item--selected":"")} key={ item.id }>
                <span>{ item.name }</span>
                <span className="filter-list__count">(200)</span>
            </li>
        )
        return (
            <div className="filter-list__container">
                <div className="filter-list">
                    <div className="filter-list__title">Categories</div>
                    <ul>
                        { categories }
                    </ul>
                </div>
            </div>
        )
    }
}

const mapStateToProps = (state) => ({
    categories: state.categories.items,
    selected: state.categories.selected
})

const mapDispatchToProps = dispatch => ({
    fetchCategories: () => dispatch(fetchCategories()),
    setCategory: (id) => dispatch(setCategory(id)) 
})


export default connect(mapStateToProps, mapDispatchToProps)(CategoryFilter)


