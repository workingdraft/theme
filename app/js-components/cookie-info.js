/**
 * Cookie info to inform users
 */
import Cookie from "js-cookie";
import M from "../utils/M";

const name = "cookie-info";
const cookieInfos = M.getElements(name);

const cookieName = "cookieconsent";
const currentState = Cookie.get(cookieName) === "1";

const onClick = (info) => () => {
  Cookie.set(cookieName, 1);

  M.addClass(info, "is-hidden");
};

const addListeners = (info) => {
  const buttons = M.getElements(`${name}-button`, info);

  buttons.forEach((button) => button.addEventListener("click", onClick(info)));
};

cookieInfos.forEach((info) => {
  if (currentState) {
    return;
  }

  M.removeClass(info, "is-hidden");
  addListeners(info);
});
