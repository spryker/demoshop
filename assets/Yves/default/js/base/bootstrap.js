'use strict';

var $ = require('jquery');
var BaseComponent = require('js/base/components/component');

function register(Component) {
    var selector = '[data-component="' + Component.name + '"]';

    $(selector).not('[data-component-registered]').each(function(index, el){
        var component = Object.assign({}, BaseComponent, Component);

        component.$el = $(el);
        component.$el.attr('data-component-registered', true);

        !!component.init && component.init();
    });
}

function bootstrap(components) {
    components.forEach(register);
}

module.exports = bootstrap;
