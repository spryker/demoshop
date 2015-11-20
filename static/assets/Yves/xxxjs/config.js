require.config({
	baseUrl: "/js/",
	shim: { // 3p-deps of components
		'components/core'  : {deps: ['3p/jquery', '3p/underscore']}
	}
});
