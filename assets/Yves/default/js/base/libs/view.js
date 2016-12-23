/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

var _ = require('lodash');

var View = {
    init: function() {}
};

function create(body) {
    return _.assign({}, View, body);
}

module.exports = create;

