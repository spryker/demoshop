/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
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
