/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

var view = require('./view');
var controller = require('./controller');

module.exports = {
    name: 'add-to-wishlist',
    controller: controller,
    view: view,
    initialState: {
        visible: null,
        loaded: false,
        wishlistCollection: null
    }
};
