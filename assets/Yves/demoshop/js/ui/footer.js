'use strict';

var $html = $('html');
var $window = $(window);
var $footer = $('.main-footer');


function setFooterPosition(){
    setTimeout(function(){
        var height = $html.height();
        var windowHeight = $window.height();
        $footer.toggleClass('fixed', height < windowHeight);
    }, 0);
}

module.exports = {
    init: function(){
        $(document).ready(setFooterPosition);
        $window.on('resize', setFooterPosition);

        // this is a performance killer
        $('html *').on('click', setFooterPosition);
    }
};
