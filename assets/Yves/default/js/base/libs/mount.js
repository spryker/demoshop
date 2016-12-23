/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

var $ = require('jquery');
var _ = require('lodash');
var createView = require('./view');
var createController = require('./controller');
var createState = require('./state');
var createComponent = require('./component');

function mount(body) {
    var component = createComponent(body);
    var selector = '[data-component="' + component.name + '"]';

    $(selector).each(function(index, root){
        var view =  createView(component.view);
        var controller =  createController(component.controller);
        var state = createState(controller);
        var options = _.assign({}, component.options);

        view.init($(root), state, options);
        controller.init(view, state, options);
        state.init(component.initialState);
    });
}

module.exports = mount;
