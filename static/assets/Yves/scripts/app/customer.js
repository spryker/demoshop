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
            $('.requestPassword').hide();
        });

        $('form').submit(function(e) {
            if (!app.validation.resultIsValid(app.validation.apply($(this)))) {
                e.preventDefault();
            }
        });
        $('form :input').change(function() {
            $(this).next('.tooltip').remove();
            app.validation.apply($(this).parent(), true);
        });
    },
    showPwReset : function() {
        $('.requestPassword').show();
        $('html').animate({scrollTop : parseInt($('.requestPassword').position().top)}, 500);
    }
};

app.additionals.push('customer');
