/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

module.exports = {
    name: 'product-group',
    view: {
        init: function($root) {
            this.$root = $root;
            this.$mainImage = $('.thumbnail img:nth-child(1)', this.$root);
            this.$productGroupItems = $('li[data-product-group-preview]', this.$root);
            this.$productGroupItems.hover(this.itemOver.bind(this), this.itemOut.bind(this));
        },

        itemOver: function(e) {
            $('#' + $(e.currentTarget).data('productGroupPreview')).removeClass('hide');
            this.$mainImage.addClass('hide');
        },

        itemOut: function(e) {
            $('#' + $(e.currentTarget).data('productGroupPreview')).addClass('hide');
            this.$mainImage.removeClass('hide');
        }
    }
};
