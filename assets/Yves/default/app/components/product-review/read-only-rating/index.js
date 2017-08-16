/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

var $ = require('jquery');
require('jquery-bar-rating');

const RATING_THEME = 'fontawesome-stars-o';
const IGNORED_RATING_VALUE = -1;
const READ_ONLY_RATING_BAR_SELECTOR = 'select';

module.exports = {
    name: 'product-review-read-only-rating',
    view: {
        init: function($root) {
            this.$root = $root;

            this.displayReadOnlyRatingBar();
        },

        displayReadOnlyRatingBar: function() {
            var currentRating = this.$root.find(READ_ONLY_RATING_BAR_SELECTOR).data('current-rating');

            this.$root.find(READ_ONLY_RATING_BAR_SELECTOR).barrating({
                theme: RATING_THEME,
                showSelectedRating: false,
                initialRating: currentRating,
                readonly: true,
                deselectable: true,
                allowEmpty:true,
                emptyValue: IGNORED_RATING_VALUE
            });
        }
    }
};
