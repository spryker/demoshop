/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

var _ = require('lodash');

var Component = {
    name: '',
    controller: null,
    view: null,
    initialState: {},
    options: {}
};

function create(body) {
    return _.assign({}, Component, body);
}

module.exports = create;
