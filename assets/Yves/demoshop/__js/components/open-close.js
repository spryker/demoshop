define(['components/core'], function (core) {

    var OpenClose = core.extend({
        constructor: function () {
            this.config = {
                classOpen: 'active',
                opener: '.opener',
                slideContent: '.tip-content-wrap',
                activeTabClass: 'current',
                tab: '.tip-row',
                tabLink: '.tip-steps li a'
            };
        },

        accordion: function() {
            var self = this.config;
            $(self.opener).on('click', function(e){
                $(this).toggleClass(self.classOpen);
                $(this).parent().find(self.slideContent).stop().slideToggle();
                e.preventDefault();
            });
        },

        tabs: function() {
            var self = this.config;
            $(self.tabLink).on('click', function(e){
                var href = $(this).attr('href').substr(1);
                $(self.tabLink).parent().removeClass(self.activeTabClass);
                $(this).parent().addClass(self.activeTabClass);
                $(self.tab).each(function(){
                    var tabEl = $(this);
                    if($(this).attr('id') == href) {
                        $(self.tab).hide();
                        tabEl.show();
                    }
                });
                e.preventDefault();
            });
        },

        reInit: function() {
            var self = this.config;
            $(window).resize(function(){
                if($(window).width() > 768) {
                    $(self.tab).removeAttr('style');
                    $(self.tabLink).parent().removeClass(self.activeTabClass);
                    $('.tip-steps li:first').addClass(self.activeTabClass);
                } else {
                    $(self.slideContent).removeAttr('style');
                    $(self.opener).removeClass(self.classOpen);
                }
            })
        }

    });

    return OpenClose;
});
