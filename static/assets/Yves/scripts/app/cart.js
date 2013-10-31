app.cart = {
    init : function() {
        $('input[name=quantity]').change(function() {
            if (isNaN(parseInt($(this).val()))) { return; }
            $(this).val(parseInt($(this).val())).closest('form').submit();
        }).bind('input paste', function() {
            $(this).val($(this).val().replace(/[^\d]/g, ''));
        });
    }
};

app.additionals.push('cart');