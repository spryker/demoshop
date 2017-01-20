/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

var _ = require('lodash');

var BaseController = {
    init: function() {},
    dispatch: function() {}
};

function create(controller) {
    return _.assign({}, BaseController, controller);
}

module.exports = {
    create: create
};

