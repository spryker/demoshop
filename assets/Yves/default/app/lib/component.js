/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

var $ = require('jquery');
var _ = require('lodash');
var State = require('./state');
var View = require('./view');
var Controller = require('./controller');

var BaseComponent = {
    name: '',
    initialState: {},
    view: null,
    controller: null
};

function create(component) {
    return _.assign({}, BaseComponent, component);
}

function mount(component) {
    var $elements = $('[data-component="' + component.name + '"]');

    $elements.each(function(index, root){
        var state = State.create();
        var view = View.create(component.view);
        var controller = Controller.create(component.controller);

        state.init(controller);
        view.init($(root), state);
        controller.init(view, state);

        state.set(component.initialState);
    });
}

module.exports = {
    create: create,
    mount: mount
};
