import React from "react";
import PropTypes from "prop-types";


export default function Projects(props) {
    const {
        projects,
        onHandleClick
    } = props;


    return (
        <div>
            <div id="present">
                <p>" Développement, conception et production pour le Web. "</p>
            </div>
            <h2>Mes Projets</h2>

            <div id="buttonProject">
            {projects.map((project) => (
                <button
                key={project.id}
                onClick={() => onHandleClick(project.url)}>
                    <p>{project.name}</p>
                </button>
            ))}

        </div>
        </div>
    )
}

Projects.propTypes = {
    projects: PropTypes.array.isRequired,
    onHandleClick: PropTypes.func,
};