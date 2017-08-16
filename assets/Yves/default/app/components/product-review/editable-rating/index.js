/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

var $ = require('jquery');
require('jquery-bar-rating');

const RATING_THEME = 'fontawesome-stars-o';
const IGNORED_RATING_VALUE = -1;
const EDITABLE_RATING_BAR_SELECTOR = 'select';

module.exports = {
    name: 'product-review-editable-rating',
    view: {
        init: function($root) {
            this.$root = $root;

            this.displayEditableRatingBar();
        },

        displayEditableRatingBar: function() {
            this.$root.find(EDITABLE_RATING_BAR_SELECTOR).barrating({
                theme: RATING_THEME,
                deselectable: true,
                allowEmpty:true,
                emptyValue: IGNORED_RATING_VALUE,
                initialRating: IGNORED_RATING_VALUE
            });
        }
    }
};
