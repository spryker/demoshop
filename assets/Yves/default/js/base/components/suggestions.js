'use strict';

var $ = require('jquery');

var threshold = 3;
var fetchUrl = '/search/suggest';

var Suggestions = {
    name: 'suggestions',

    elements: {
        $input: $('.js-input', this.$el),
        $inputShadow: $('.js-input-shadow', this.$el),
        $panel: $('.js-panel', this.$el)
    },

    init: function() {
        this.elements.$input.on('change keyup', this.onTyping.bind(this));
    },

    onTyping: function() {
        var query = this.elements.$input.val();

        if (query && query.length >= threshold) {
            this.fetch(query);
        } else {
            this.complete('');
            this.suggest('');
        }
    },

    fetch: function(query) {
        var that = this;

        $.get(fetchUrl, { q: query }, function(data) {
            that.complete(query, data.completion[0]);
            that.suggest(data.suggestion);
        });
    },

    complete: function(query, completion) {
        var value = query;

        if (completion) {
            value = query + completion.slice(query.length);
        }

        this.elements.$inputShadow.val(value);
    },

    suggest: function(suggestion) {
        this.elements.$panel.html(suggestion);
    }
};

module.exports = Suggestions;
