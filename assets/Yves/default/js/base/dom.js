/**
 *
 * Demoshop 2.0 prototype
 * @author: Alessandro Bellini <alessandro.bellini@spryker.com>
 *
 */

'use strict';

// create a dom wrapper
function Dom(elements) {
    this._elements = elements || [];
    this.length = this._elements.length;
}

// return a specific, index based, HTMLElement
Dom.prototype.get = function get(index) {
    index = parseInt(index || 0);

    if (index != NaN && index >= 0 && index < this.length) {
        return this._elements[index];
    }

    return null;
}

// return selected HTMLElement array
Dom.prototype.all = function all() {
    return this._elements;
}

// add a class to selected elements
Dom.prototype.addClass = function addClass(className) {
    this._elements.forEach(function(element) {
        element.className = (element.className + ' ' + className).trim();
    });

    return this;
}

// remove a class from selected elements
Dom.prototype.removeClass = function removeClass(className) {
    var classRegExp = new RegExp('\\s+' + className, 'gm');

    this._elements.forEach(function(element) {
        element.className = (' ' + element.className)
            .replace(classRegExp, '')
            .trim();
    });

    return this;
}

// bind an event handler to all selected elements
Dom.prototype.on = function on(event, handler, capture) {
    this._elements.forEach(function(element) {
        element.addEventListener(event, handler.bind(element), !!capture);
    });

    return this;
}

function dom(args) {
    if (args instanceof Dom) {
        return args;
    }

    if (args instanceof HTMLElement) {
        return new Dom([args]);
    }

    if (args instanceof NodeList) {
        return new Dom([].slice.call(args));
    }

    if (args instanceof Array) {
        return new Dom(args);
    }

    return new Dom([].slice.call(document.querySelectorAll(args)));
}

module.exports = dom;
