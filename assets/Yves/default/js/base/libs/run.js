/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

var _ = require('lodash');
var Component = require('./component');

function run(components) {
    components = components || [];

    _.forEach(components, function(component) {
        Component.mount(Component.create(component));
    });
}

module.exports = run;
