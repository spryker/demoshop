'use strict';

var _ = require('lodash');
var Base = require('./base');

var Controller = {
    view: null
};

function create(body) {
    return _.create(Base.prototype, Controller, body);
}

module.exports = create;

