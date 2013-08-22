zed.modules.search = {
    init : function() {
        $(".datepicker").each(function(index, element) {
            $(element).datepicker({dateFormat: "yy-mm-dd"});
        });
        $(".operands").change(zed.modules.search.toggleV2Field);
        $("#search_description_button").click(zed.modules.search.toggleInfo);
    },
    toggleV2Field : function() {
        var id = $(this).attr('id');
        id = id.substring(15);
        var v2Insert = $('#search_input_v2_' + id);
        v2Insert.toggle();
        if($(this).val() == 'btw') {
            v2Insert.show();
        } else {
            v2Insert.val('');
            v2Insert.hide();
        }
    },
    toggleInfo : function() {
        $("#search_description").slideToggle(100);
    }
}