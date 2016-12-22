'use strict';

var $ = require('jquery');
var fetchUrl = '/search/suggest';

module.exports = {
    init: function(state, view) {
        this.state = state;
        this.view = view;
        this.state.onChange(this.dispatch.bind(this));
    },

    dispatch: function(hasChanged) {
        if (hasChanged.query) {
            this.fetch();
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

        if (that.xhr) {
            that.xhr.abort();
        }

        that.xhr = $.get(fetchUrl, { q: that.state.current.query }, function(data) {
            that.state.set({
                visible: true,
                hint: data.completion,
                suggestions: data.suggestion,
                navigationIndex: 0
            });
        });
    }
};
