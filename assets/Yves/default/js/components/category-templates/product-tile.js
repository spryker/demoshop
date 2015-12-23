define([], function () {
	var productTile = '{{for (var key in products) { }}\
			<div class="category-item">\
				<a href="{{=products[key].url}}">\
					<img class="product-picture" src="http://assets.kartenmacherei.de/produktbilder/{{=products[key].abstract_sku}}-SmallDetailImage/empty-{{=products[key].concrete_products[0].attributes.format.substring(1)}}{{=products[key].concrete_products[0].options.COLOR.values[0].optionKey.substring(1)}}00001de_DE.jpg" alt="{{=products[key].abstract_name}}" />\
				</a>\
				<div class="item-title">\
					<span class="category-group">{{=category.name}}</span>\
					<h2>\
						<a href="{{=products[key].url}}">{{=products[key].abstract_name}}</a>\
					</h2>\
				</div>\
				<a href="#" class="favorite">Favorite</a>\
				<div class="options cfx">\
					{{if (products[key].concrete_products[0].options.COLOR.values.length) { }}\
						<div class="filter-drop-parent filter-colors">\
							{{var concreteProducts = products[key].concrete_products;}}\
							{{var defaultFormat = concreteProducts[0].attributes.format;}}\
							{{for (var k = 0; k < concreteProducts.length; k++) { }}\
								{{var colors = concreteProducts[k].options.COLOR.values;}}\
								{{var style = defaultFormat == concreteProducts[k].attributes.format ? "inline-block":"none";}}\
								{{for (var i = 0; i < colors.length; i++) { }}\
									<a href="#" class="color-item {{=colors[i].optionKey.toLowerCase()}}" rel="{{=concreteProducts[k].attributes.format}}" data-item-property="{{=colors[i].optionKey.substr(1)}}" data-option="color"  style="display: {{=style}}"></a>\
								{{ } }}\
							{{ } }}\
							<a href="{{=products[key].url}}" class="more"></a>\
						</div>\
					{{ } }}\
					<div class="filter-drop-parent filter-format">\
						{{var formats = products[key].concrete_products;}}\
						{{for (var i = 0; i < formats.length; i++) { }}\
							<a href="#"  data-item-property="{{=formats[i].attributes.format.substr(1)}}" data-option="format">\
								<img src="../../images/images/{{=formats[i].attributes.format}}_small.png" alt="{{=formats[i].attributes.format}}" />\
							</a>\
						{{ } }}\
						<a href="{{=products[key].url}}" class="more"></a>\
					</div>\
				</div>\
			</div>\
		{{ } }}';
	return productTile;
});






