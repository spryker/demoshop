'use strict';

var $ = require('jquery');
var BaseComponent = require('js/base/components/component');

function register(Component, $parentEl) {
    var selector = '[data-component="' + Component.name + '"]';

    $(selector, $parentEl).not('[data-component-registered]').each(function(index, el){
        var $el = $(el);
        var component = Object.assign({}, BaseComponent, Component);

        !!component.children && component.children(function(ChildComponent){
            return register(ChildComponent, $el);
        });

        component.$el = $el;
        component.$el.attr('data-component-registered', true);

        !!component.init && component.init();
    });
}

function bootstrap(RootComponent) {
    return register(RootComponent, null);
}

module.exports = bootstrap;
