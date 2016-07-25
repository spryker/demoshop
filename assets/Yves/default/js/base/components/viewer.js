/**
 *
 * Demoshop 2.0 prototype
 * @author: Alessandro Bellini <alessandro.bellini@spryker.com>
 *
 */

'use strict';

var dom = require('js/base/dom');

function showHandler(e) {
    var target = this.getAttribute('data-viewer-show');
    var href = this.getAttribute('href');

    dom('[data-viewer-id].__is-shown').removeClass('__is-shown');
    dom('[data-viewer-id="' + target + '"]').addClass('__is-shown');

    if (!!href){
        e.preventDefault();
    }
}

function resetHandler(e) {
    var href = this.getAttribute('href');

    dom('[data-viewer-id].__is-shown').removeClass('__is-shown');
    dom('[data-viewer-default]').addClass('__is-shown');

    if (!!href){
        e.preventDefault();
    }
}

function init() {
    dom('[data-viewer-default]').addClass('__is-shown');
    dom('[data-viewer-show]').on('click', showHandler);
    dom('[data-viewer-reset]').on('click', resetHandler);
}

module.exports = {
    init: init
}
