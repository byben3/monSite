import React, { Component } from "react";
import { getProjects } from "../../api/project_api";
import Projects from "./project";
import IframeApp from "./iframeApp";

export default class ProjectApp extends Component {
    constructor(props) {
        super(props);
        this.state = {
            projects:[],
            sourceUrl: "",
            classNameDivIframe:"iframeTriesToLoad",
        };
        this.handleClick = this.handleClick.bind(this);
        this.closeClick = this.closeClick.bind(this);
        this.loader = this.loader.bind(this);
    }

    componentDidMount() {
        getProjects()
            .then((data) => {
                this.setState({
                    projects: data,
                })
            });
    }

    handleClick(url){
        this.setState({
            sourceUrl: url,
            classNameDivIframe:"iframeTriesToLoad",
        })
    }
    closeClick(){
        this.setState({
            sourceUrl: "",
            classNameDivIframe:"iframeTriesToLoad",
        })
    }

    loader(){
        this.setState({
            classNameDivIframe: "iframeHasToLoad",
        })
    }

    render() {
        return (
            <section id="portfolio">
                <IframeApp
                    {...this.props}
                    {...this.state}
                    onCloseClick={this.closeClick}
                    loader={this.loader}
                />
                <Projects
                    {...this.props}
                    {...this.state}
                    onHandleClick={this.handleClick}
                />
            </section>
        );
    }
}
