/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

module.exports = {
    name: 'viewer',
    view: {
        init: function($root) {
            this.$root = $root;
            this.$default = $('[data-viewer-default]');
            this.$show = $('[data-viewer-show]');
            this.$reset = $('[data-viewer-reset]');

            this.$default.addClass('__is-shown');
            this.$show.on('click', this.onShow.bind(this));
            this.$reset.on('click', this.onReset.bind(this));
        },

        getCurrent: function() {
            return $('[data-viewer-id].__is-shown');
        },

        onShow: function(e) {
            var $el = $(e.currentTarget);
            var target = $el.attr('data-viewer-show');
            var href = $el.attr('href');

            this.getCurrent().removeClass('__is-shown');
            $('[data-viewer-id="' + target + '"]').addClass('__is-shown');

            return !href;
        },

        onReset: function(e) {
            var href = $(e.currentTarget).attr('href');

            this.getCurrent().removeClass('__is-shown');
            this.$default.addClass('__is-shown');

            return !href;
        }
    }
};
