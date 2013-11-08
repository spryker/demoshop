app.ui = {
    init : function() {

    },
    autocomplete : {
        render : function($targetInput) {
            var $el = $('<div />').addClass('ui-autocomplete').html('muha!');
            $el.fn.addItem = function() {
                console.log('addItem on', this);
            }
        }
    }
};

app.additionals.push('ui');