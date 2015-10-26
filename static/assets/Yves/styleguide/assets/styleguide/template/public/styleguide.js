$(function(){
	hljs.initHighlightingOnLoad();

	var ref = $('.styleguide-menu').find('.styleguide-menu-list').data('kss-ref');
	$('.styleguide-menu').find('.section-' + ref).addClass('selected');

	if (!$('.styleguide-menu .selected').size()) {
		window.location = $('.styleguide-menu').find('a').eq(0).attr('href');
	}

	$('iframe').each(function () {
		$(this).load(function () {
			var $this = $(this);
			console.info($this.contents().find("body").height());
			$($this.contents()[0]).ready(function () {
				setTimeout(function () {
					$this.css('height', $this.contents().find("body").height() );
				}, 0);
			});
		});
	});

});