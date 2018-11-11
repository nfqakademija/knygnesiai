import React from "react";

export default class Book extends React.Component{
    constructor(props) {
        super(props);
        this.state = {
            highlighted: false
        }
        this.toggleHighlighted = this.toggleHighlighted.bind(this);
    }

    toggleHighlighted() {
        this.setState({highlighted: !this.state.highlighted})
        
        
    }

    render(){
        return(
            <div onMouseEnter={ this.toggleHighlighted } onMouseLeave={ this.toggleHighlighted } className={ "book-container " + (this.state.highlighted ? "book-container--highlighted" : "")}>
                <img className="book-container__img" src={ require('../../../public/uploads/' + this.props.media) } alt="book"/>
                <div className="book-container__title">{this.props.title}</div> 
                <div className="book-container__author">by {this.props.author}</div>
                <div className="book-container__rating"></div>
            </div>
        )
    }
}