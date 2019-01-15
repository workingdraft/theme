if (!global._babelPolyfill) {
  require('babel-polyfill');
}

import CookieInfo from "./js-components/cookie-info";
import Revision from "./js-components/revision";

// window.podPressShowHidePlayer = (...args) => console.log(args);

window.onload = () => {
  CookieInfo();
  Revision();
};
