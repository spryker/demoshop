require(['config'], function () {

	require([
		'components/endless-scroll',
		'components/facets',
		'components/calculate-height',
		'components/on-product-hover',
		'components/sticky',
		'3p/facebook-like',
		'3p/html5'
	], function (endlessScroll, facets, calcHeight, prodHover, stickyFilter) {

		// align tiles
		var setHeight = calcHeight('.category-item', '.add-info-block');
		setHeight.init();
		setHeight.attachEvents();

		// facet functionality
		var facetSection = new facets({
			el: '.filter',
			url: window.location.pathname,
			holder: '.categories-list'
		});

		new prodHover({
			el: '.category-item'
		});

		// initialized endless scroll
		new endlessScroll({
			el: '.categories-list',
			loader: '.infinity-scroll',
			filters: facetSection,
			url: window.location.pathname,
			page: 2,
			method: 'GET'
		});

		new stickyFilter({
			el: '.filter'
		});

	});

});






