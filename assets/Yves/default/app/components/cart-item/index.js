/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

module.exports = {
    name: 'cart-item',
    view: {
        init: function($root) {
            this.$root = $root;
            this.$container = $('.js-cart-item-select', $root);

            if (!this.$container.length) {
                return;
            }

            this.$container.change(this.itemChanged.bind(this));
        },

        itemChanged: function(event) {
            var $selectedValue = this.$container.children('select option:selected').val();
            this.$root.children('input:hidden').val($selectedValue);
            debugger;
            this.$root.closest('form').submit();

            event.preventDefault();
        }


    }
};
