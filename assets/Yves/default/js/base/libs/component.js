'use strict';

var _ = require('lodash');

var Component = {
    name: '',
    controller: null,
    view: null,
    initialState: {},
    options: {}
};

function create(body) {
    return _.assign({}, Component, body);
}

module.exports = create;
