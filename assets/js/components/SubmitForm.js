import React from "react";
import { connect } from "react-redux";
import { uploadBook } from "../actions/books";

class SubmitForm extends React.Component{
    constructor(props) {
        super(props);
        this.state = {
            data: {
                "title" : "",
                "author" : "",
                "year" : "",
                "language" : "",
                "description": "",
                "numOfPages" : "",
                "condition": "",
                "lookingFor": "",
                "category": "",
                "format" : "",
                "image":"" 
            },
            display: false
        }
        this.htmlForm = React.createRef();
        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleChange = this.handleChange.bind(this);
        this.handleUpload = this.handleUpload.bind(this);
    }

    componentWillReceiveProps(nextProps) {
        this.setState({display: nextProps.display})
        // console.log(document.body.offsetWidth)
        // console.log(document.body.offsetHeight)
        // let node = this.htmlForm.current;
        // let left = (document.body.offsetWidth - node.offsetWidth) / 2
        // let top = (document.body.offsetHeight - node.offsetHeight) / 2
        // node.style.left = left + "px";
        // node.style.top = top + "px";
       
    }

    componentDidMount(){
        

        // console.log(left)
        // console.log(top)
        
    }

    handleChange(event) {

        const target = event.target;
        const name = target.name;
        const value = target.value;
        const updatedData = {...this.state.data};
        updatedData[name] = value;
        this.setState({data: updatedData})
    }

    handleSubmit(event) {
        event.preventDefault();
        this.props.submit(this.state.data);
        this.resetFormData();
        this.props.toggleForm();
    }

    handleUpload(event) {
        let files = event.target.files;
        let reader = new FileReader();
        let updatedData = {...this.state.data}
        reader.readAsDataURL(files[0]);

        reader.onload = (e) => {
            updatedData.image = e.target.result;
            this.setState({data: updatedData});
        }
    }

    resetFormData(){
        let data = {
            "author" : "",
            "title" : "",
            "year" : "",
            "numOfPages" : "",
            "category": "",
            "type" : "",
            "image":"" 
        }
        this.setState({data}); 
    }

    render() {
        
        return(
            <React.Fragment>
                <form onSubmit={ this.handleSubmit }  className={"submitForm " + (this.state.display ? " submitForm--show" : " submitForm--hide")}  ref={ this.htmlForm }>
            <div>
                <label> Author: <input autoComplete="off" onChange={this.handleChange} name="author" type="text" value={ this.state.data.author } /></label>
            </div>
            <div>
                <label> Title: <input autoComplete="off" onChange={this.handleChange} name="title" type="text" value={ this.state.data.title } /></label>
            </div>
            <div>
                <label>Year: <input autoComplete="off" onChange={this.handleChange} name="year" type="text" value={ this.state.data.year } /></label>
            </div> 
            <div>
                <label>Number of Pages:<input autoComplete="off" onChange={this.handleChange} name="numOfPages" type="text" value={ this.state.data.numOfPages } /></label>
            </div>
            <div>
                <label>Genre:<input autoComplete="off" onChange={this.handleChange} name="category" type="text" value={ this.state.data.category } /></label>
            </div>  
            <div>
                <label>Type:<input autoComplete="off" onChange={this.handleChange} name="format" type="text" value={ this.state.data.format }/></label>
            </div>
            <div>
                <input type="file" name="file" onChange={this.handleUpload} />
            </div>  
            <div>
                <input type="submit" value="Upload" />
            </div>
                </form>
            </React.Fragment>
        )
        
    }
}




const mapDispatchToProps = (dispatch, ownProps) => ({
    submit: data => dispatch(uploadBook(data))
    
})

export default connect(null, mapDispatchToProps)(SubmitForm);