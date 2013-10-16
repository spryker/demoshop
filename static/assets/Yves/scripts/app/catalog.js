app.catalog = {
    init : function() {
      this.rangeSlider.init();
      this.zoom.init();
    },
    zoom : {
        vars : {
            elClass : 'zoom',
            currentClass : '#product .pictures .current'
        },
        init : function() {
            var vars = this.vars;
            $(vars.currentClass).mouseenter(function() {
                $('.' + vars.elClass).remove();
                var bgCss = 'url(' + $(this).children('img').attr('src') + ') no-repeat';
                vars.$zoom = $('<div class="' + vars.elClass + '"></div>').css({ background : bgCss });
                $(this).append(vars.$zoom);
            });

            $(vars.currentClass).mousemove(function(e) {
                var coords = this.getBoundingClientRect();
                if (coords.left > e.clientX || coords.right < e.clientX || coords.top > e.clientY || coords.bottom < e.clientY) {
                    vars.$zoom.remove();
                    return;
                }
                var bgpos = (((coords.left - e.clientX) * 2) + 100) + 'px ' + (((coords.top - e.clientY) * 2) + 100) + 'px';
                vars.$zoom.css({ left : e.clientX - 100, top : e.clientY - 100, backgroundPosition : bgpos });
            });
        }
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