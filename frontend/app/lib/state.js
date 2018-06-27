/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

var _ = require('lodash');

var BaseState = {
    current: {},

    init: function(initialState, controller) {
        this.current = initialState;
        this.set = createStateSetter(controller);
    }
};

function createStateSetter(controller) {
    return function(newState) {
        var that = this;

        setTimeout(function() {
            var oldState = _.assign({}, that.current);
            var hasChanged = _.reduce(newState, function(changes, value, key) {
                changes[key] = !_.isEqual(value, oldState[key]);
                return changes;
            }, {});

            that.current = _.assign({}, oldState, newState);
            controller.dispatch(hasChanged, oldState);
        }, 0);
    }
}

function create() {
    return _.assign({}, BaseState);
}

module.exports = {
    create: create
};
