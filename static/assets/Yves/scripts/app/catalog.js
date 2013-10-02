app.catalog = {
    init : function() {
      this.rangeSlider.init();
    },
    rangeSlider : {
        init : function() {
            var $targets = $('input[type=range][data-connectors][data-most-expensive]');
            $targets.mousedown(function() {
                $(this).mousemove(function() {
                    app.catalog.rangeSlider.updateValues($(this), $(this).val());
                });
            }).mouseup(function() {
                $(this).unbind('mousemove');
            }).change(this.apply);
        },
        updateValues : function($el, value) {
            var $targets = $($el.data('connectors')).removeAttr('disabled');
            var mostExpensive = $el.data('mostExpensive');
            $targets.filter('.min').val(Math.round(value * (mostExpensive / 100) / 2.2));
            $targets.filter('.max').val(Math.round(value * (mostExpensive / 100)));
        },
        apply : function() {}
    }
}

app.additionals.push('catalog');