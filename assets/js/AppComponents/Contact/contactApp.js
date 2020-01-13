import React from "react";
import symfonyIcon from "./../../../img/symfony_black_03.png";
import myPicture from "./../../../img/ben4.jpg";
import mySql from "./../../../img/mysql.svg";

export default function ContactApp() {
    return(
        <div id="contactMain">
            <h2>Contact</h2>
            <div id="contactBody">
                <div id="picture">
                    <div id="layerPicture"></div>
                    <img className="me" src={myPicture} alt="my face"></img>

                </div>
                <div id="bio">
                    <h3>Qui suis-je ?</h3>
                    <div id="present">
                    <p> Avant, j'étais musicien professionnel, bassiste et contrebassiste.<br/> Aujourd'hui je suis développeur Web.
                        Pour réussir cette reconversion j'ai suivi une formation à distance sanctionnée par un diplôme de "Développeur intégrateur en réalisation d’applications web".<br/>
                        Je  suis aussi passionné par les sciences, la géopolitique et bien d'autres choses...<br/><br/>
                        Ce site Web présente un instantané de mes connaissances dans le développement. Il est en constante évolution en fonction de mes nouvelles compétences acquises.
                    </p>
                    </div>
                        <div id="mailto">
                            <p>
                                N'hésitez pas à me contacter : <a href="mailto:benjaminfournie.web@gmail.com">benjaminfournie.web@gmail.com</a>
                            </p>
                        </div>

                    <h4>Technology</h4>
                    <div id="technology">

                        <i className="fab fa-html5"></i>
                        <i className="fab fa-css3-alt"></i>
                        <i className="fab fa-sass"></i>
                        <i className="fab fa-js"></i>
                        <i className="fab fa-react"></i>
                        <i className="fab fa-php"></i>
                        <img className="symfonyIcon" src={symfonyIcon} alt="logo symfony"></img>
                        <img className="mySqlIcon" src={mySql} alt="logo mySql"></img>



                    </div>

                </div>
            </div>

        </div>
    )

}