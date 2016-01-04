define(['components/core',
		'components/category-templates/product-tile',
		'components/helpers/render-template',
		'components/mixins/ajax-request'],
	function (core, template, render, sendRequest) {

		var InfiniteScroll = core.extend({
			constructor: function (options) {
				this.config = {
					url: '../json/products.json',
					method: 'GET',
					isLoading: false
				};
				this.$ = {};
				this.$.el = jQuery(options.el);
				this.$.loader = jQuery(options.loader);
				jQuery.extend(true, this.config, options || {});
				this.init();
			},

			init: function () {

				if(this._checkPosition()){
					this.triggerLoader(true);
					this.sendRequest();
				}

				this.attachEvents();
			},

			sendRequest: function () {
				this.config.callback = jQuery.proxy(function (data) {
					this._addProducts(data);
					this.triggerLoader(false);
					this.config.page = data.currentPage >= data.maxPage ? false : data.currentPage + 1;
					this.config.isLoading = false;
				}, this);
				this.config['data'] = this.collectData();
				this.ajaxRequest(this.config);
			},

			collectData: function () {
				var data = this.config.filters.getActiveFacet();
				data['page'] = this.config.page;
				return data;
			},

			triggerLoader: function (flag) {
				flag ? this.$.loader.show() : this.$.loader.hide();
			},

			_getBottomPosition: function () {
				var windowH = jQuery(window).height(),
					blockTopPos = this.$.el.offset().top,
					blockH = this.$.el.height();
				return blockTopPos + blockH - windowH;
			},

			_checkPosition: function () {
				var pagePos = jQuery(window).scrollTop(),
					gep = 20,
					blockPos = this._getBottomPosition();
				return pagePos >= blockPos - gep;
			},

			_addProducts: function (json) {
				var html = render(template, json);
				html = this.prepareTile(html);
				this.$.el.append(html);
			},

			prepareTile: function (tiles) {
				tiles = jQuery(tiles);
				tiles.each(function (ind, tile) {
					var colors = jQuery(tile).find('.color-item'),
						rel = jQuery(colors[0]).attr('rel');
					colors.each(function(){
						if(jQuery(this).attr('rel') !== rel){
							jQuery(this).hide();
						}
					});
				});
				return tiles;
			},

			attachEvents: function () {
				jQuery(window).on('scroll', jQuery.proxy(function () {
					if(this._checkPosition() && this.config.page && !this.config.isLoading){
						this.config.isLoading = true;
						this.triggerLoader(true);
						this.sendRequest();
					}
				},this));

				this.config.filters.subscribe('products:loaded', jQuery.proxy(function (ev) {
					this.config.page = 2;
				}, this));
			}
		});
		InfiniteScroll.include(sendRequest);

		return InfiniteScroll;
});
