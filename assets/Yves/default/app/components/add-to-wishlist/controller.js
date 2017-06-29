/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

module.exports = {
    init: function(view, state) {
        this.state = state;
        this.view = view;
        this.suggestionsUrl = this.view.getWishlistCollectionUrl();
    },

    dispatch: function(stateChanges) {
        if (stateChanges.loaded) {
            this.fetch();
        }

        if (stateChanges.wishlistCollection) {
            this.view.updatePanel();
        }

        if (stateChanges.visible) {
            this.view.togglePanel();
        }
    },

    fetch: function() {
        var that = this;

        this.view.startLoader();

        if (that.xhr) {
            that.xhr.abort();
        }

        that.xhr = $.get(that.suggestionsUrl, function(response) {
            that.state.set({
                wishlistCollection: response
            });

            setTimeout(function(){
                that.autoSelectWishlistOption()
            }, 0);
        }).always(function() {
            that.view.stopLoader();
        });
    },

    autoSelectWishlistOption: function() {
        var wishlistOptions = this.view.getWishlistOptions();

        switch (wishlistOptions.length) {
            case 0:
                this.view.submitForm();
                return;
            case 1:
                this.view.submitForm(wishlistOptions[0]);
                return;
        }

        this.state.set({
            visible: true
        });
    }
};
