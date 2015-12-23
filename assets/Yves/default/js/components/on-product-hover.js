define(['components/core'], function (core) {

		var ChangeUrl = core.extend({
			constructor: function (options) {
				this.config = {
					active: 'selected',
					selectors: {
						img: '.product-picture',
						options: '[data-option]'
					}
				};
				this.$ = {};
				this.$.el = jQuery(options.el);
				this.loadObjects(options.el);
				jQuery.extend(true, this.config, options || {});
				this.init();
			},

			init: function () {
				this.attachEvents();
			},

			addElements: function (elements) {
				this.$.options.add(elements);
			},

			getUrl: function (img, param, type) {
				var src = img.attr('src').split('-'),
					format = type === 'format' ? param : src[src.length-1].substr(0, 3),
					color = type === 'color' ? param : src[src.length-1].substr(3, 2),
					lacquer = type === 'lacquer' ? param : src[src.length-1].substr(5, 2),
					diecut = type === 'diecut' ? param : src[src.length-1].substr(7, 2);

				src[src.length-1] = format + color + lacquer + diecut + src[src.length-1].substr(9);

				return src.join('-');
			},

			changeUrl: function (img, param, type) {
				var src = this.getUrl(img, param, type);

				img.attr('src', src);
			},

			attachEvents: function () {
				var self = this;
				jQuery(document).on('mouseenter', this.config.selectors.options, function () {
					var opt = jQuery(this),
						tile = opt.parents(self.config.el),
						img = tile.find(self.config.selectors.img),
						param = opt.data('item-property'),
						type = opt.data('option');

					self.changeUrl(img, param, type);

					if(type === 'format'){
						tile.find('.color-item').hide();
						tile.find('.color-item[rel=F'+param+']').css({display: 'inline-block'});
					}
				});
			}
		});

		return ChangeUrl;
});
