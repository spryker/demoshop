'use strict';

var $ = require('jquery');
var _ = require('lodash');

var View = {};

var Controller = {};

var State = {
    current: {},
    callbacks: $.Callbacks(),

    init: function() {
        this.set(this.current);
    },

    set: function(newState) {
        var hasChanged = {};
        var oldState = _.assign({}, this.current);

        _.keys(newState).forEach(function(key) {
            hasChanged[key] = !_.isUndefined(newState[key]);

            if (hasChanged[key]) {
                hasChanged[key] = (newState[key] !== oldState[key]);
            }
        });

        this.current = _.assign({}, oldState, newState);
        this.callbacks.fire(hasChanged, oldState);
        return this.clone();
    },

    clone: function() {
        return _.assign({}, this.current);
    },

    onChange: function(callback) {
        this.callbacks.add(callback);
    }
};

function createView(body) {
    return _.assign({}, View, body);
}

function createController(body) {
    return _.assign({}, Controller, body);
}

function createState(body) {
    return _.assign({}, State, {
        current: body
    });
}

function createComponent(body) {
    var selector = '[data-component="' + body.name + '"]';

    $(selector).each(function(index, root){
        var view =  createView(body.view);
        var controller =  createController(body.controller);
        var state = createState(body.initialState);
        var options = _.assign({}, body.options);

        view.init && view.init(state, $(root), options);
        controller.init && controller.init(state, view, options);
        state.init && state.init();
    });
}

function bootstrap(array) {
    array.forEach(createComponent);
}

module.exports = bootstrap;

