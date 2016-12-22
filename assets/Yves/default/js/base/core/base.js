'use strict';

var _ = require('lodash');

var Base = function() {
    this.state = {};
    this.init = function() {};
    this.dispatch = function() {};
};

var View = {
    $root: null
};

var Controller = {
    view: null
};

_.extend(Base.prototype, {
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

function createView(body) {
    return _.create(Base.prototype, View, body);
}

function createController(body) {
    return _.create(Base.prototype, Controller, body);
}

function createComponent(component) {
    var selector = '[data-component="' + component.name + '"]';

    $(selector).each(function(index, root){
        var view = _.assign({}, component.view);
        var controller = _.assign({}, component.controller);
        var state = _.assign({}, component.state);
        var options = _.assign({}, component.options);

        view.$root = $(root);
        controller.view = view;

        view.init && view.init(options);
        controller.init && controller.init(options);

        Base.prototype.setState(state);
    });
}

module.exports = {
    view: createView,
    controller: createController,
    component: createComponent
};

