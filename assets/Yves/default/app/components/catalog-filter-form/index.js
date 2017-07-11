/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

module.exports = {
    name: 'catalog-filter-form',
    view: {
        init: function($root) {
            this.$root = $root;

            $($root).on('submit', this.onSubmit.bind(this));
        },

        onSubmit: function(e) {
            var $target = $(e.currentTarget);

            $target.find(':input[data-default-value]').each(function(i, input) {
                var $input = $(input);
                if ($(input).data('defaultValue') == $input.val() || $input.val() === '') {
                    $input.attr('disabled', true);
                }
            });
        }
    }
};
