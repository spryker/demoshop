/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

// add your custom common js here
// and/or change the existing one

var $ = require('jquery');
var run = require('./libs/run');

$(function(){
    run([
        require('./components/aside'),
        require('./components/viewer'),
        require('./components/suggestions')
    ]);
});
