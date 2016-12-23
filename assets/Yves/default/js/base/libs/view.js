'use strict';

var _ = require('lodash');

var View = {
    init: function() {}
};

function create(body) {
    return _.assign({}, View, body);
}

module.exports = create;

