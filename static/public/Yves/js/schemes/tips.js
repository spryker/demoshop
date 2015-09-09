require(['config'], function () {

	require([
		'components/open-close'
	], function (OpenClose) {
		var openClose = new OpenClose();
		openClose.accordion();
		openClose.tabs();
		openClose.reInit();
	});

});

