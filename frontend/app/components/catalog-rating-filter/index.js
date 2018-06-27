/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

module.exports = {
    name: 'catalog-rating-filter',
    view: {
        init: function($root) {
            this.$root = $root;
            this.$input = $root.find('.js-rating-filter-input');
            this.$form = $root.parents('form');

            $($root).on('click', '[data-rating-filter]', this.onFilterClick.bind(this));
        },

        onFilterClick: function(e) {
            var $target = $(e.currentTarget);
            var value = $target.data('ratingFilter');

            this.$input.val(value);
            this.$form.submit();
        }
    }
};
