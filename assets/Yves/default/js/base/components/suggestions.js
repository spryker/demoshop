'use strict';

var $ = require('jquery');

var threshold = 1;
var fetchUrl = '/search/suggest';

var Suggestions = {
    name: 'suggestions',

    state: {
        query: '',
        hint: '',
        suggestions: ''
    },

    init: function() {
        this.elements = {
            $input: $('.js-input', this.$root),
            $inputShadow: $('.js-input-shadow', this.$root),
            $panel: $('.js-panel', this.$root)
        };

        this.elements.$input.on('change keyup', this.onTyped.bind(this));
    },

    onTyped: function() {
        var query = this.elements.$input.val() || '';

        this.changeState({
            query: query
        });
    },

    onChangeState: function(changes) {
        var isAllowed = this.state.query.length >= threshold;

        if (changes.query) {
            if (isAllowed) {
                this.fetch();
            } else {
                this.hideHint();
                this.hideSuggestions();
            }
        }

        if (changes.hint) {
            this.showHint();
        }

        if (changes.suggestions) {
            this.showSuggestions();
        }
    },

    fetch: function() {
        var that = this;

        $.get(fetchUrl, { q: that.state.query }, function(data) {
            that.changeState({
                hint: data.completion[0],
                suggestions: data.suggestion
            });
        });
    },

    getHint: function() {
        var query = this.state.query;
        var hint = this.state.hint;
        var value = query;

        if (hint) {
            value += hint.slice(query.length);
        }

        return value;
    },

    hideHint: function() {
        this.elements.$inputShadow.val('');
    },

    showHint: function() {
        this.elements.$inputShadow.val(this.getHint());
    },

    hideSuggestions: function() {
        this.elements.$panel.html('');
    },

    showSuggestions: function() {
        this.elements.$panel.html(this.state.suggestions);
    }
};

module.exports = Suggestions;
