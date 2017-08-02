/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

module.exports = {
    name: 'disable-on-click',
    view: {
        init: function($root) {
            this.$root = $root;

            $($root).on('click', this.onClick.bind(this));
        },

        onClick: function(e) {
            var $target = $(e.currentTarget);

            $target.addClass('disabled');
        }
    }
};
