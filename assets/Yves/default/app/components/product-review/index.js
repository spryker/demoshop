/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

var $ = require('jquery');
require('jquery-bar-rating');

const RATING_THEME = 'css-stars';

const ADD_REVIEW_BUTTON_SELECTOR = '.js-button-add-a-review';
const SUBMIT_FORM_SELECTOR = '.js-product-review-submit-form';
const EDITABLE_RATING_BAR_SELECTOR = '.js-jquery-bar-rating-stars select';
const READ_ONLY_RATING_BAR_SELECTOR = '.js-jquery-bar-rating-stars-read-only select';
const IGNORED_RATING_VALUE = -1;

module.exports = {
    name: 'product-review',
    view: {
        init: function($root) {
            this.$root = $root;

            this.displayEditableRatingBars();
            this.displayReadOnlyRatingBars();
            this.bindAddReviewButton();
        },

        displayEditableRatingBars: function() {
            this.$root.find(EDITABLE_RATING_BAR_SELECTOR).barrating({
                theme: RATING_THEME,
                deselectable: true,
                allowEmpty:true,
                emptyValue: IGNORED_RATING_VALUE,
                initialRating: IGNORED_RATING_VALUE
            });
        },

        displayReadOnlyRatingBars: function() {
            this.$root.find(READ_ONLY_RATING_BAR_SELECTOR).barrating({
                theme: RATING_THEME,
                readonly: true
            });
        },

        bindAddReviewButton: function() {
            let $root = this.$root;
            this.$root.find(ADD_REVIEW_BUTTON_SELECTOR).on('click', function() {
                $(this).hide();
                $root.find(SUBMIT_FORM_SELECTOR).removeClass('hide');
            });
        }
    }
};
