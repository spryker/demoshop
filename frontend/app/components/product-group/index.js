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
            this.$container = $root.parents('.js-product-container');

            if (!this.$container.length) {
                return;
            }

            this.$image = $('.thumbnail img:nth-child(1)', this.$container);
            this.originalImageSrc = this.$image.attr('src');
            this.$productGroupItems = $('li[data-product-group-item-preview]', this.$root);

            this.$productGroupItems.hover(this.itemOver.bind(this), this.itemOut.bind(this));
        },

        itemOver: function(e) {
            this.$image.attr('src', $(e.currentTarget).data('productGroupItemPreview'));
        },

        itemOut: function() {
            this.$image.attr('src', this.originalImageSrc);
        }
    }
};
