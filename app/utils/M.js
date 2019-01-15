import classnames from "classnames";

const M = {
  _getSelector: (name) => {
    return `[data-${name}]`;
  },

  getElements: (name, context = document) => {
    const selector = M._getSelector(name);
    const elements = context.querySelectorAll(selector);

    if (elements) {
      return Array.from(elements);
    }

    return null;
  },

  _getClassObject: (classList) => {
    const classes = {};
    Array.from(classList).forEach((className) => classes[className] = true);

    return classes;
  },

  addClass: (element, className) => {
    const classes = M._getClassObject(element.classList);
    element.className = classnames(classes, className);
  },

  removeClass: (element, classNameToRemove) => {
    const classes = M._getClassObject(element.classList);
    element.className = classnames({
      ...classes,
      [classNameToRemove]: false,
    });
  }
};

export default M;
