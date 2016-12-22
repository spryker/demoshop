'use strict';

var $ = require('jquery');

var threshold = 2;
var fetchUrl = '/search/suggest';

module.exports = {
    init: function(view) {
        this.view = view;
    },

    dispatch: function(hasChanged) {
        console.log(this.state)

        if (hasChanged.query) {
            if (this.state.query.length >= threshold) {
                if (this.isQueryInlineWithHint()) {
                    this.view.updateHint();
                } else {
                    this.fetch();
                }
            } else {
                this.reset();
            }
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

        $.get(fetchUrl, { q: that.state.query }, function(data) {
            that.setState({
                visible: true,
                hint: data.completion,
                suggestions: data.suggestion,
                navigationIndex: 0
            });
        });
    },

    reset: function() {
        this.setState({
            visible: false,
            hint: '',
            suggestions: '',
            navigationIndex: 0
        });
    },

    isQueryInlineWithHint: function() {
        var state = this.state;
        var length = state.query.length;
        var index = length - 1;

        return length >= threshold
            && state.hint
            && state.hint.length >= index
            && state.hint[index] === state.query[index];
    }
};
