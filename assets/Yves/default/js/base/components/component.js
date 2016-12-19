'use strict';

var Component = {
    $el: '',
    name: '',
    observers: [],

    children: function(register) {},

    init: function() {},

    update: function() {
        var that = this;
        this.observers.forEach(function(observer) {
            observer.call(that);
        });
    },

    onUpdate: function(observer) {
        this.observers.push(observer);
    }
};

module.exports = Component;
