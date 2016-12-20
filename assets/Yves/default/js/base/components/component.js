'use strict';

var Component = {
    name: '',
    state: {},
    $root: null,

    init: function() {},
    onChangeState: function(changes, oldState) {},

    changeState: function(newState) {
        var changes = {};
        var oldState = Object.assign({}, this.state);

        for (var key in newState) {
            changes[key] = typeof newState[key] !== 'undefined';
            changes[key] || (changes[key] = newState[key] === oldState[key]);
        }

        this.state = Object.assign({}, oldState, newState);
        this.onChangeState && this.onChangeState(changes, oldState);
    }
};

module.exports = Component;
