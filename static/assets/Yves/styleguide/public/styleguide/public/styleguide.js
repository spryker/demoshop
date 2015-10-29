$(function(){
	hljs.initHighlightingOnLoad();

	var ref = $('.styleguide-menu').find('.styleguide-menu-list').data('kss-ref');
	$('.styleguide-menu').find('.section-' + ref).addClass('selected');

	if (!$('.styleguide-menu .selected').size()) {
		window.location = $('.styleguide-menu').find('a').eq(0).attr('href');
	}

	$(window).resize(function () {
		$('iframe').each(function () {
			resizeIframe(this);
		});
	});
});

function resizeIframe(obj) {
	obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
}

