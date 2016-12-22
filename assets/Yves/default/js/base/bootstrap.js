'use strict';

var $ = require('jquery');
var _ = require('lodash');

function create(component) {
    var selector = '[data-component="' + component.name + '"]';

    $(selector).each(function(index, root){
        var view = _.assign({}, component.view);
        var controller = _.assign({}, component.controller);
        var state = _.assign({}, component.state);
        var options = _.assign({}, component.options);

        function setState(newState) {
            var hasChanged = {};
            var oldState = _.assign({}, state);

            _.keys(newState).forEach(function(key) {
                hasChanged[key] = !_.isUndefined(newState[key]);

                if (hasChanged[key]) {
                    hasChanged[key] = (newState[key] !== oldState[key]);
                }
            });

            view.state = controller.state = state = _.assign({}, state, newState);

            controller.dispatch && controller.dispatch(hasChanged, oldState);
            return state;
        }

        view.state = controller.state = _.assign({}, state);
        view.setState = controller.setState = setState;

        view.init && view.init($(root), options);
        controller.init && controller.init(view, options);

        setState(state);
    });
}

function bootstrap(components) {
    components.forEach(create);
}

module.exports = bootstrap;
