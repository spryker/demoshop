/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

var $ = require('jquery');

module.exports = {
    name: 'aside',
    view: {
        init: function($root) {
            this.$root = $root;
            $('[data-aside-toggle]').on('click', this.onClick.bind(this));
        },

        onClick: function() {
            this.$root.focus();
            return false;
        }
    }
};
