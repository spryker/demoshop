app.customer = {
    init : function() {
        var activeTab = app.settings.get('customerActiveAuthTab');
        if(activeTab) {
            $('.tab[data-target="content-' + activeTab + '"]').addClass('active')
                .parent().siblings().children('.tab').removeClass('active');
        }

        $('#' + $('.tab.active').data('target')).show();

        $('.tab').click(function() {
            app.settings.set('customerActiveAuthTab', $(this).data('target').replace('content-', ''));
            $(this).addClass('active').parent().siblings().children('.tab').removeClass('active');
            $('#' + $(this).data('target')).show().siblings('.content').hide();
        });
    },
    showPwReset : function() {
        alert('not implemented');
    }
};

app.additionals.push('customer');
