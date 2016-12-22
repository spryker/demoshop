'use strict';

var _ = require('lodash');

var Base = function() {
    this.dispatch = function() {};
};

_.extend(Base.prototype, {
    state: {},

    setState: function(newState) {
        var hasChanged = {};
        var oldState = _.assign({}, this.state);

        _.keys(newState).forEach(function(key) {
            hasChanged[key] = !_.isUndefined(newState[key]);

            if (hasChanged[key]) {
                hasChanged[key] = (newState[key] !== oldState[key]);
            }
        });

        this.state = _.assign({}, oldState, newState);
        this.dispatch && this.dispatch(hasChanged, oldState);
        return this.state;
    }
});

var Controller = {
    view: null
};

function create(body) {
    return _.create(Base.prototype, Controller, body);
}

module.exports = Base;

