require("../css/styles.scss");

import React from "react";
import { render } from "react-dom";
import NavBarApp from "./AppComponents/NavBar/navBarApp";


render(<NavBarApp/>, document.getElementById("mainSection"));
