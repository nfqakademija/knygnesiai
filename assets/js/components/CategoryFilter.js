import React from 'react';
import { connect } from 'react-redux';
import { fetchCategories } from "../actions/categories";


class CategoryFilter extends React.Component {

    componentDidMount() {
        this.props.fetchCategories();
    }

    render() {
        const categories = this.props.categories.map(item => <li className="filter-list__item" key={ item.id }><span>{ item.name }</span><span className="filter-list__count">(200)</span></li>)
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
    categories: state.categories.items
})

const mapDispatchToProps = dispatch => ({
    fetchCategories: () => dispatch(fetchCategories())
})


export default connect(mapStateToProps, mapDispatchToProps)(CategoryFilter)


