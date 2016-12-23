/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

var _ = require('lodash');

var Controller = {
    init: function() {},
    dispatch: function() {}
};

function create(body) {
    return _.assign({}, Controller, body);
}

module.exports = create;

