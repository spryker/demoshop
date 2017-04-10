/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

module.exports = {
    init: function(view, state) {
        this.state = state;
        this.view = view;
        this.suggestionsUrl = this.view.getSuggestionsUrl();
    },

    dispatch: function(hasChanged) {
        if (hasChanged.query) {
            this.fetch();
            this.view.updateHint();
        } else {
            this.view.toggleHintVisibility(true);
        }

        if (hasChanged.hint) {
            this.view.updateHint();
        }

        if (hasChanged.suggestions) {
            this.view.updateSuggestions();
        }

        if (hasChanged.navigationIndex) {
            this.view.updateNavigation();
        }

        if (hasChanged.visible) {
            this.view.updateVisibility();
        }
    },

    fetch: function() {
        var that = this;

        that.view.startLoader();

        setTimeout(function() {
            var params = {
                q: that.state.current.query
            };

            if (that.xhr) {
                that.xhr.abort();
            }

            that.xhr = $.get(that.suggestionsUrl, params, function(data) {
                that.state.set({
                    visible: true,
                    hint: data.completion,
                    suggestions: data.suggestion,
                    navigationIndex: 0
                });
            }).complete(function(){
                that.view.stopLoader();
            });
        }, 0);
    }
};
