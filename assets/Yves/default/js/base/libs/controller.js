'use strict';

var _ = require('lodash');

var Controller = {
    init: function() {},
    dispatch: function() {}
};

function create(body) {
    return _.assign({}, Controller, body);
}

module.exports = create;

