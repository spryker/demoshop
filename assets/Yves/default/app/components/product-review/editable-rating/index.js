/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

var $ = require('jquery');
require('jquery-bar-rating');

var RATING_THEME = 'fontawesome-stars-o';
var IGNORED_RATING_VALUE = -1;
var EDITABLE_RATING_BAR_SELECTOR = 'select';

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
                emptyValue: IGNORED_RATING_VALUE
            });
        }
    }
};
