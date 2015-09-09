define([], function () {
	var renderTemplate = function (str, data) {
		if (!renderTemplate.cache) {
			renderTemplate.cache = {};
		}
		var cache = renderTemplate.cache;
		if (typeof cache[str] !== 'undefined') {
			return data ? cache[str](data) : cache[str];
		}

		var fn = new Function("obj",
			"var p=[],print=function(){p.push.apply(p,arguments);};" +
			"with(obj){p.push('" +
			str
				.replace(/[\r\t\n]/g, " ")
				.split("{{").join("\t")
				.replace(/((^|}})[^\t]*)'/g, "$1\r")
				.replace(/\t=(.*?)}}/g, "',$1,'")
				.split("\t").join("');")
				.split("}}").join("p.push('")
				.split("\r").join("\\'") + "');}return p.join('');");

		renderTemplate.cache[str] = fn;
		return data ? fn( data ) : fn;
	};
	return renderTemplate;
});