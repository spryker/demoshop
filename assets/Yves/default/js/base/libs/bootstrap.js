'use strict';

var mount = require('./mount');

function bootstrap(array) {
    array = array || [];
    array.forEach(mount);
}

module.exports = bootstrap;


