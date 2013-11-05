app.customer = {
    init : function() {
        if(app.settings.get('visitedBefore')) {
            $('.tab.active').removeClass('active').parent().siblings().children('.tab').addClass('active');
        }

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
