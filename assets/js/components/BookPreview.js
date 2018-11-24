import React from 'react';
import { NavLink } from 'react-router-dom';

class BookPreview extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            data:  null,
            display: false
        }
    }

    componentDidUpdate(props){
        if (props.location.key != props.history.location.key) {
            this.fetchBook();
        }
    }

    componentDidMount() {
        this.fetchBook(); 
    }

    fetchBook(){
        const book_id = this.props.match.params.id;
        const url = '/api/books/' + book_id;
        fetch(url)
          .then(response => response.json())
          .then(json => this.setState({data: json}))   
    }
    

    render() {
        console.log(this.state.data)
        if (!this.state.data) return null
        return (
            <React.Fragment>
            <div className="bookPreview__mainContainer">
                <div className="bookPreview__leftContainer">
                    <div className="bookPreview__contentContainer">
                        /* FIXME: temporary fix, so project would not fail in yarn run encore production */
                        {/*<img className= "bookPreview__image" src={require('../../../public/uploads/' + this.state.data.media)} alt="book"></img>*/}
                    </div>
                </div>
                <div className="bookPreview__rightContainer">
                    <div className="bookPreview__contentContainer">
                        <NavLink to="/"><div className="bookPreview__closeBtnContainer"></div></NavLink>
                        <div>
                            <h1 className="bookPreview__title">{this.state.data.title}</h1>
                        </div>
                        <div>
                            <p className="bookPreview__author">by {this.state.data.author}</p>
                        </div>
                        <div>
                            <p className="bookPreview__year">published in {this.state.data.yearPublication}</p>
                        </div>
                        <div>
                            <p className="bookPreview__description"><em>{this.state.data.description}</em></p>
                        </div>
                        <div>
                            <p className="bookPreview__rating"><em>Current rating: {this.state.data.likeCount}</em></p>
                        </div>
                    </div>
                </div>

                
            </div>
            </React.Fragment>
        )
    }
}

export default BookPreview;


//description, yearPublication, pageCount,  author, rating