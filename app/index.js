import "regenerator-runtime/runtime";

import CookieInfo from "./js-components/cookie-info";
import Revision from "./js-components/revision";

// window.podPressShowHidePlayer = (...args) => console.log(args);

window.onload = () => {
  CookieInfo();
  Revision();
};
