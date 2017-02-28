/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

var $ = require('jquery');

var DEFAULT_CLASS_TO_TOGGLE = 'is-visible';

module.exports = {
    name: 'toggle',
    view: {
        init: function($root) {
            this.$root = $root;

            var target = this.$root.data('component-target');
            this.$target = $(target);
            this.$toggler = this.$root;

            this.isCheck = this.$root.is(':checkbox');
            this.isRadio = this.$root.is(':radio');

            if (this.isRadio) {
                var radioGroupSelector = '[name="' + this.$root.attr('name') + '"]:radio';
                this.$toggler = $(radioGroupSelector);
            }

            this.classToToggle = this.$root.data('component-class-to-toggle') || DEFAULT_CLASS_TO_TOGGLE;
            this.preventDefault = !!this.$root.data('component-prevent-default');

            this.mapEvents();
            this.updateToggle();
        },

        mapEvents: function() {
            if (this.$target.length === 0) {
                this.$toggler.on('click', this.onEmpty.bind(this));
                return;
            }

            if (this.isCheck) {
                this.$toggler.on('change', this.onToggle.bind(this));
                return;
            }

            if (this.isRadio) {
                this.$toggler.on('change', this.onToggleRadio.bind(this));
                return;
            }

            this.$toggler.on('click', this.onToggle.bind(this));
        },

        updateToggle: function() {
            if (this.isRadio) {
                this.onToggleRadio();
                return;
            }

            this.onToggle();
        },

        onEmpty: function(e){
            if (e && this.preventDefault) {
                e.preventDefault();
            }
        },

        onToggle: function(e) {
            if (e && this.preventDefault) {
                e.preventDefault();
            }

            this.$target.toggleClass(this.classToToggle);
        },

        onToggleRadio: function(e) {
            var $currentRadio = e ? $(e.currentTarget) : this.$root;
            var addClass = !($currentRadio.is(this.$root) && $currentRadio.is(':checked'));

            if (e && this.preventDefault) {
                e.preventDefault();
            }

            this.$target.toggleClass(this.classToToggle, addClass);
        }
    },
};
