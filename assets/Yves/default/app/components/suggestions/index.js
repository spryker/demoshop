/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

var view = require('./view');
var controller = require('./controller');

module.exports = {
    name: 'suggestions',
    controller: controller,
    view: view,
    initialState: {
        visible: false,
        query: '',
        hint: '',
        suggestions: '',
        navigationIndex: 0
    }
};
