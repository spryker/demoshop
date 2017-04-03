/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

module.exports = {
    init: function($root, state) {
        this.$root = $root;
        this.$form = $('form', this.$root);
        this.$button = $('.js-button', this.$root);
        this.$panel = $('.js-panel', this.$root);
        this.state = state;

        this.mapEvents();
    },

    getWishlistCollectionUrl: function() {
        return this.$root.data('wishlistCollectionUrl');
    },

    mapEvents: function() {
        this.$button.on('click', this.onButtonClick.bind(this));

        this.$root.on('click', '.js-wishlist-option', this.onOptionClick.bind(this));
    },

    onButtonClick: function() {
        if (!this.state.current.loaded) {
            this.state.set({
                loaded: true
            });

            return;
        }

        this.state.set({
            visible: !this.state.current.visible
        });
    },

    onOptionClick: function(e) {
        var $target = $(e.target);

        this.submitForm($target.data('wishlistName'));
    },

    updatePanel: function() {
        this.$panel.html(this.state.current.wishlistCollection);
    },

    submitForm: function(wishlistName) {
        $('.js-wishlist-name', this.$root).val(wishlistName);

        this.$form.submit();
    },

    togglePanel: function() {
        this.$panel.toggleClass('is-hidden');
    },

    startLoader: function() {
        // TODO: implement startLoader
        console.log('loading...');
    },

    stopLoader: function() {
        // TODO: implement stopLoader
        console.log('done');
    },

    getWishlistOptions: function() {
        var wishlistOptions = [];

        this.$panel.find('.js-wishlist-option').each(function(i, wishlistOption) {
            wishlistOptions[i] = $(wishlistOption).data('wishlistName');
        });

        return wishlistOptions;
    }
};
