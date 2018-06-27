/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

module.exports = {
    name: 'product-variants',
    view: {
        init: function($root) {
            this.$root = $root;

            $('.js-reset-variant-attribute', $root).on('click', this.onResetVariantAttributeClick.bind(this));
        },

        onResetVariantAttributeClick: function(e) {
            e.preventDefault();

            var $target = $(e.currentTarget);
            var $input = $target.siblings('.js-variant-attribute-field');
            var $form = $target.parents('form');

            $input.val('');
            $form.submit();
        }
    }
};
