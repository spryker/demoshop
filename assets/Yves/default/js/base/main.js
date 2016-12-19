/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

// add your custom common js here
// and/or change the existing one

var aside = require('js/base/components/aside');
var viewer = require('js/base/components/viewer');

aside.init();
viewer.init();

var $ = require('jquery');
var bootstrap = require('js/base/bootstrap');
var Suggestions = require('js/base/components/suggestions');

$(function(){
    bootstrap([
        Suggestions
    ]);
});

