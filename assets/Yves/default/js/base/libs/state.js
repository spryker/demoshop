'use strict';

var _ = require('lodash');

var State = {
    current: {},

    init: function(initialState) {
        this.set(initialState);
    },

    set: function(newState) {
        var that = this;

        setTimeout(function() {
            var hasChanged = {};
            var oldState = _.assign({}, that.current);

            _.keys(newState).forEach(function(key) {
                hasChanged[key] = !_.isUndefined(newState[key]);

                if (hasChanged[key]) {
                    hasChanged[key] = (newState[key] !== oldState[key]);
                }
            });

            that.current = _.assign({}, oldState, newState);
            that.dispatch(hasChanged, oldState);
        }, 0);
    },

    clone: function() {
        return _.assign({}, this.current);
    },

    dispatch: function() {}
};

function create(controller) {
    return _.assign({}, State, {
        dispatch: controller.dispatch.bind(controller)
    });
}

module.exports = create;
