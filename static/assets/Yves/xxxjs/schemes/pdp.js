require(['config'], function () {

	require([
		'components/custom-select',
		'components/change-format-pdp',
		'3p/facebook-like',
		'3p/html5'
	], function (customSelect, changeFormat) {
		new customSelect({
			el: '.custom-select'
		});

		new changeFormat({
			el: '.filter-format > a'
		});
	});

});
