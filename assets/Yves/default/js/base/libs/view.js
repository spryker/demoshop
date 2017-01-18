/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

var _ = require('lodash');

var BaseView = {
    init: function() {}
};

function create(view) {
    return _.assign({}, BaseView, view);
}

module.exports = {
    create: create
};

