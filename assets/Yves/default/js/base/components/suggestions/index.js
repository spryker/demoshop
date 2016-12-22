'use strict';

var keyboardCodes = require('js/base/utils/keyboard-codes');
var view = require('js/base/components/suggestions/view');
var controller = require('js/base/components/suggestions/controller');

module.exports = {
    name: 'suggestions',
    controller: controller,
    view: view,
    state: {
        visible: false,
        navigationIndex: 0
    },
    options: {
        keyboardCodes: keyboardCodes
    }
};
