/**
 *
 * Demoshop 2.0 prototype
 * @author: Alessandro Bellini <alessandro.bellini@spryker.com>
 *
 */

'use strict';

// add your custom common js here
// and/or change the existing one

if (DEV) {
    console.warn('Demoshop v2: DEVELOPMENT mode');
} else {
    console.info('Demoshop v2: PRODUCTION mode');
}

var aside = require('js/base/components/aside');
var viewer = require('js/base/components/viewer');

aside.init();
viewer.init();
