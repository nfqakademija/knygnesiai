import React from "react";
import SubmitForm from "./SubmitForm";
import BookList from "./BookList";
import CategoryFilter from  "./CategoryFilter";


export default class MainContent extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            displaySubmitForm: false
        }
        this.toggleForm = this.toggleForm.bind(this);
    }
    
    toggleForm() {
        this.setState({ displaySubmitForm: !this.state.displaySubmitForm })
    }

    render() {
        const languages = [
            "English",
            "Russian",
            "Lithuanian",
            "German",
            "Latvian",
            "Spanish",
            "French",
            "Chinese"
        ].map((item, index) => <li className="filter-list__item" key={ index }><span className="filter-list__checkbox">{ item }</span><span className="filter-list__count">(200)</span></li>)

        const bindings = [
            "Paperback",
            "Hardcover",
            "other"
        ].map((item, index) => <li className="filter-list__item" key={ index }><span className="filter-list__checkbox">{ item }</span><span className="filter-list__count">(200)</span></li>)

        const categories = [
            "Biographies", 
            "Business", 
            "Cookbooks", 
            "Health & Fitness", 
            "History", 
            "Mystery", 
            "Inspiration", 
            "Romance", 
            "Fiction",
            "Humor books",
            "Books for kids"
        ].map((item, index) => <li className="filter-list__item" key={ index }><span>{ item }</span><span className="filter-list__count">(200)</span></li>)


        return(
            <React.Fragment>
                <header className="header">
                        <nav className="navBar">
                            <ul className="navBar__linkContainer">
                                <li className="navBar__link">Home</li>
                                <li className="navBar__link">Contacts</li>
                                <li className="navBar__link">About</li>
                            </ul>
                        </nav>
                    <div className="main-search-input-container">
                        <input className="main-search-input" spellCheck="false" placeholder="Search for a book..."></input>
                        <button className="main-search-input__button"><span>Search<i className="main-search-input__icon fa fa-search fa-xs"></i></span></button>
                    </div>
                    <div className="actions">
                        <ul className="actions__container">
                            <li className="actions__link">Login</li>
                        </ul>
                    </div>
                </header>
                <main className="main-wrapper">
                    <div className="content-wrapper">
                        <aside className="left-container">
                            <CategoryFilter />
                            {/* <div className="filter-list__container">
                                <div className="filter-list">
                                    <div className="filter-list__title">Categories</div>
                                    <ul>
                                        { categories }
                                    </ul>
                                </div>
                            </div> */}
                            <div className="filter-list__container">
                                <div className="filter-list">
                                    <div className="filter-list__title">Languages</div>
                                    <ul>
                                        { languages }
                                    </ul>
                                </div>
                            </div>
                            <div className="filter-list__container">
                                <div className="filter-list">
                                    <div className="filter-list__title">Bindings</div>
                                    <ul>
                                        { bindings }
                                    </ul>
                                </div>
                            </div>
                        </aside>
                        <div className="right-container">
                            <div className="bookList-container">
                                {/* <BookList /> */}
                            </div>
                        </div>
                    </div>
                </main>
                
                {/* <SubmitForm toggleForm={ this.toggleForm } display={ this.state.displaySubmitForm } /> */}
            </React.Fragment>
            
        )
    }
}