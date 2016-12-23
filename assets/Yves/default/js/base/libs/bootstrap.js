/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

var mount = require('./mount');

function bootstrap(array) {
    array = array || [];
    array.forEach(mount);
}

module.exports = bootstrap;


