define([], function () {
	var galleryItem = '{{for (i=0; i < crossProducts.length; i++) { }}\
		<li>\
			<a href="#">\
				<img src="http://assets.kartenmacherei.de/produktbilder/{{=crossProducts[i].sku}}-SmallDetailImage/empty-{{=crossProducts[i].format.substr(1,3)}}{{=color}}00001de_DE.jpg" alt="" />\
			</a>\
		</li>\
	{{ } }}';
	return galleryItem;
});
