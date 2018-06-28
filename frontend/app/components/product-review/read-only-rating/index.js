/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

var $ = require('jquery');
require('jquery-bar-rating');

var RATING_THEME = 'fontawesome-stars-o';
var IGNORED_RATING_VALUE = -1;
var READ_ONLY_RATING_BAR_SELECTOR = 'select';

module.exports = {
    name: 'product-review-read-only-rating',
    view: {
        init: function($root) {
            this.$root = $root;

            this.displayReadOnlyRatingBar();
        },

        displayReadOnlyRatingBar: function() {
            var currentRating = this.formatRating(this.$root.find(READ_ONLY_RATING_BAR_SELECTOR).data('current-rating'));

            this.$root.find(READ_ONLY_RATING_BAR_SELECTOR).barrating({
                theme: RATING_THEME,
                showSelectedRating: false,
                initialRating: currentRating,
                readonly: true,
                deselectable: true,
                allowEmpty:true,
                emptyValue: IGNORED_RATING_VALUE
            });
        },

        /**
         * Returns the nearest "half" or "whole" number for the provided input
         * - returns the provided input if it is the "IGNORED_RATING_VALUE"
         *
         * Example:
         *   2   =>  2
         *   2.1 =>  2
         *   2.2 =>  2
         *   2.3 =>  2.5
         *   2.4 =>  2.5
         *   2.5 =>  2.5
         *   2.6 =>  2.5
         *   2.7 =>  2.5
         *   2.8 =>  3
         *   2.9 =>  3
         *  -1   => -1
         *
         * @param {number} rating
         *
         * @returns {number}
         */
        formatRating: function(rating) {
            rating = parseFloat(rating);

            if (rating === IGNORED_RATING_VALUE) {
                return rating;
            }

            rating = Math.round(rating * 2) / 2;

            return rating;
        }
    }
};
