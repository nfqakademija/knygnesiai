import React from 'react';
import { connect } from 'react-redux';
import { fetchCategories } from "../actions/categories";
import { setCategory } from "../actions/categories";

class CategoryFilter extends React.Component {
    
    componentDidMount() {
        this.props.fetchCategories();
    }

    render() {
        if (this.props.categories.length && this.props.categories[0].name != 'All') {
            this.props.categories.unshift({id: 0, name: "All"})
        }
        const categories = this.props.categories.map(item => 
            <li onClick={() => this.props.setCategory(item.id, item.name)} className={ "filter-list__item " + (this.props.selected === item.id ? "filter-list__item--selected":"")} key={ item.id }>
                <span>{ item.name }</span>
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
    setCategory: (id, name) => dispatch(setCategory(id, name)) 
})


export default connect(mapStateToProps, mapDispatchToProps)(CategoryFilter)


