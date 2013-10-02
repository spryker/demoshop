var app = {
    init : function() {
        this.slider.init();
        this.viewport.init();
        for (var i in this.additionals) {
            this[this.additionals[i]].init();
        }
    },
    additionals : [],
    viewport : {
        init : function() {
            var $window = $(window);
            $window.resize(this.adapt.bind(this));
            $window.resize(this.footer.bind(this));
            $window.trigger('resize');
        },
        sizeRange : [605, 1150],
        currentSize : 1150,
        adapt : function() {
            var currentWidth = $(window).width();
            if (currentWidth >= this.sizeRange[1] && this.currentSize === this.sizeRange[1]) {
                return;
            }
            this.currentSize = (currentWidth > this.sizeRange[1]
                ? this.sizeRange[1]
                : (currentWidth < this.sizeRange[0]
                    ? this.sizeRange[0]
                    : currentWidth));
            $('section').css({ width: this.currentSize - 40 });
            $('section.fullWidth').css({ width: this.currentSize });
            this.plugins.bind(app)(this.currentSize);
        },
        footer : function() {
            var $main = $('.consumeHeight');
            if (!$main.length) { return; }

            var paddingHeight = $main.outerHeight(false) - $main.height();

            var consumedHeight = 0;
            $main.siblings(':visible').each(function() {
                consumedHeight += $(this).outerHeight(true);
            });

            $main.css({ minHeight : ($(window).height() - consumedHeight) - paddingHeight});
        },
        plugins : function(newSize) {
            this.slider.adaptWidth(newSize - 40);
        }
    },
    slider : {
        init : function() {
            this.$slider = $('#teaser ul');
            if (!this.$slider.length) { return; }
            this.max = this.$slider.children('li').length - 1;
            this.index = 0;
            this.adaptWidth(app.viewport.currentSize);
            setTimeout(this.slide.bind(this), 6000);
        },
        adaptWidth : function(newSize) {
            this.slideWidth = newSize;
            this.$slider.css({ width : (this.max + 1) * newSize, marginLeft : this.index * newSize * (-1) })
                .children('li').css({ width : newSize });
        },
        slide : function() {
            this.index = this.index < this.max ? this.index + 1 : 0;
            this.$slider.animate({ marginLeft : this.index * this.slideWidth * (-1) }, 1000);
            setTimeout(this.slide.bind(this), 6000);
        }
    }
}

$(app.init.bind(app));