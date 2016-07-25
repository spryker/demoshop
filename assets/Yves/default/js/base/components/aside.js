/**
 *
 * Demoshop 2.0 prototype
 * @author: Alessandro Bellini <alessandro.bellini@spryker.com>
 *
 */

'use strict';

var dom = require('js/base/dom');

function toggleAsideHandler(e) {
    dom('#aside').get().focus();
    e.preventDefault();
}

function init() {
    dom('[data-aside-toggle]').on('click', toggleAsideHandler);
}

module.exports = {
    init: init
}
