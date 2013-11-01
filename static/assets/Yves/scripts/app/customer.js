app.customer = {
    init : function() {
        $('#' + $('.tab.active').data('target')).show();

        $('.tab').click(function() {
            $(this).addClass('active').parent().siblings().children('.tab').removeClass('active');
            $('#' + $(this).data('target')).show().siblings('.content').hide();
        });
    },
    showPwReset : function() {
        alert('not implemented');
    }
};

app.additionals.push('customer');
