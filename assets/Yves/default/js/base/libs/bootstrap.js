/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

var _ = require('lodash');
var Component = require('./component');

function bootstrap(array) {
    array = array || [];

    _.forEach(array, function(component) {
        Component.mount(Component.create(component));
    });
}

module.exports = bootstrap;


