zed.modules.forms = {
    init : function() {

        /* Reset button */

        $("input[data-original][type='text'], textarea[data-original]").each(function(){
            $(this).parent().prepend("<button class='reset'>Reset</button>");
        });

        $("button.reset").click(function(event) {
            event.preventDefault();
            var field=$(event.target).next();
            $(field).val($(field).attr("data-original"));
        });

        /* Prefill text input field with the data selected from a drop-down */

        $('select.preset-sender').change(function(){
            $('input:text.preset-receiver').val($('select.preset-sender option:selected').text());
        });

        var columns=zed.modules.forms.columns;
        zed.modules.forms.arrange(columns.productDescription.column1, columns.productDescription.column2);

    },

    /* Column configuration per form type:

     formType
     columnNumber
     columnFields (array)

     */

    columns : {
        productDescription : {
            column1 : [
                "driving_characteristics",
                "economical_characteristics"
            ],
            column2 : [
                "tread_characteristics",
                "characteristic_1",
                "characteristic_2",
                "characteristic_3",
                "characteristic_4",
                "characteristic_5"
            ]
        }
    },

    arrange : function() {

        /* Build required number of columns depending on number of arguments */

        for (var i=0; i<arguments.length; i++) {

            var col=arguments.length-i;
            $("#productDescription dl.zend_form").prepend('<div class="form-column-'+col+'"></div>');

        }

        /* Move the labels and inputs to the appropriate columns */

        for (var i=0; i<arguments.length; i++) {

            for (var y=0; y<arguments[i].length; y++) {
                $("#"+arguments[i][y]+"-label").appendTo(".form-column-"+(i+1));
                $("#"+arguments[i][y]+"-element").appendTo(".form-column-"+(i+1));
            }
        }
    }

}