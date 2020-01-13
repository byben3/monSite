import React from "react";
import PropTypes from "prop-types";

export default function IframeApp(props) {

    const {
        sourceUrl,
        onCloseClick,
        loader,
        classNameDivIframe
    } = props;

    if (sourceUrl !== "") {
        return (
            <div id="iframeMain">
                <div id="buttonIframe">
                    <form target="_blank" action={sourceUrl}>
                        <input type="submit" value="Aller sur le site" />
                    </form>
                    <button className="closeIframe" onClick={()  => onCloseClick()}>Fermer</button>
                </div>
                <div id="iframeView">
                    <div className={classNameDivIframe}>
                        <iframe onLoad={() => loader()}  src={sourceUrl}></iframe>
                    </div>
                </div>
            </div>
        )
    }
    return(
        <div></div>
    )
}

IframeApp.propTypes = {
    sourceUrl: PropTypes.string.isRequired,
    onCloseClick: PropTypes.func,
    loader: PropTypes.func,
    classNameDivIframe: PropTypes.string
};

