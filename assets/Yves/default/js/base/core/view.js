'use strict';

var _ = require('lodash');
var Base = require('./base');

var View = {
    $root: null
};

function create(body) {
    return _.create(Base.prototype, View, body);
}

module.exports = create;

