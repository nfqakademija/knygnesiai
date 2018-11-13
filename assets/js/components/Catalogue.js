import React from "react";
import SubmitForm from "./SubmitForm";
import BookList from "./BookList";
import CategoryFilter from  "./CategoryFilter";


export default class Catalogue extends React.Component {
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

        return(
            <React.Fragment>
                <main className="main-wrapper">
                    <div className="content-wrapper">
                        <aside className="left-container">
                            <CategoryFilter />
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
                                <BookList />
                            </div>
                        </div>
                    </div>
                </main>
                
                {/* <SubmitForm toggleForm={ this.toggleForm } display={ this.state.displaySubmitForm } /> */}
            </React.Fragment>
            
        )
    }
}