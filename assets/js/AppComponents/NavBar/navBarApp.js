import React,{Component} from "react";
import ProjectApp from "../Portfolio/projectApp";
import ContactApp from "../Contact/contactApp";


export default class NavBarApp extends Component{

    constructor(props){
        super(props);

        this.state = {
            parts:<ProjectApp/>,
            isLoaded:true
        };
        this.projectClick = this.projectClick.bind(this);
        this.contactClick = this.contactClick.bind(this);
    }

    projectClick(){
        this.setState({
            parts:<ProjectApp/>,
        })
    }

    contactClick(){
        this.setState({
            parts:<ContactApp/>,
        })
    }

    render(){
        return(
            <div id="main">
                <div id="navBar">
                    <header id="logo">
                        <h1>Benjamin Fournié</h1>
                        <p>Développeur Web</p>
                    </header>
                    <button id="project" onClick={()  => this.projectClick()}>
                        <p>projets</p>
                    </button>
                    <button id="contact" onClick={()  => this.contactClick()}>
                        <p>contact</p>
                    </button>
                </div>

                <div>
                    {this.state.parts}
                </div>
            </div>
        )
    }



}