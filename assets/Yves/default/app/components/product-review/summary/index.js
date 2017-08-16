/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

var $ = require('jquery');

const ADD_REVIEW_BUTTON_SELECTOR = '.js-button-add-review';
const PRODUCT_REVIEW_FORM_SELECTOR = '.js-form-product-review';

module.exports = {
    name: 'product-review-summary',
    view: {
        init: function($root) {
            this.$root = $root;

            this.bindAddReviewButton();
        },

        bindAddReviewButton: function() {
            var $root = this.$root;

            this.$root.find(ADD_REVIEW_BUTTON_SELECTOR).on('click', function() {
                $(this).hide();
                $root.find(PRODUCT_REVIEW_FORM_SELECTOR).removeClass('hide');
            });
        }
    }
};
