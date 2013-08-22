$(document).ready(function(){

    /*Pal_Ui_Tabs*/
    if ($('.pal-ui-tabs').length) {
        $('.pal-ui-tabs .tabs li').click(function(){
            if ($(this).data('tab')) {
                $('.pal-ui-tabs .tabs li').removeClass('active');
                $('.pal-ui-tabs .tabContent').removeClass('active');

                $(this).addClass('active');
                $('.pal-ui-tabs .tab-'+$(this).data('tab')).addClass('active');

                $(window).trigger('resize');
            }
        });
    }

    /*Pal_Ui_Expander*/
    if ($('.pal-ui-expander').length) {
        $('.pal-ui-expander .label').click(function(){
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
            } else {
                $(this).addClass('active');
            }
            $(this).parent().children('.content').slideToggle();
        });
    }

    if ($('.pal-ui-row').length) {
        $('.pal-ui-row input').click(function(){
            if ($(this).parent().hasClass('active')) {
                $(this).parent().removeClass('active');
            } else {
                $(this).parent().addClass('active');
            }
        });
    }
});