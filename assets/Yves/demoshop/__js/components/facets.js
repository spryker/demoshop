define([
	'components/core',
	'components/category-templates/product-tile',
	'components/helpers/render-template',
	'components/helpers/events',
	'components/mixins/ajax-request'], function (core, template, render, observer, sendRequest) {

		var Facets = core.extend({
			constructor: function (options) {
				this.config = {
					url: window.location.pathname,
					data: '',
					method: 'GET'
				};
				this.$ = {};
				this.$.el = jQuery(options.el);
				this.$.holder = jQuery(options.holder);
				//this.loadObjects(options.el);
				jQuery.extend(true, this.config, options || {});
				this.init();
			},

			init: function () {
				observer(this);
				this.facets = this.getFacet();
				this.attachEvents();
			},

			getFacet: function () {
				var facets = this.$.el.find('[data-facet]');
				return jQuery.map(facets, function (item) {
					return {
						item: item,
						type: jQuery(item).data('facet')
					}
				});
			},
			loadNewProducts: function (json) {
				this.$.holder.html(render(template, json));
			},
			getActiveFacet: function () {
				var data = {};
				jQuery.each(this.facets, function (ind, item) {
					data[item.type] = jQuery(item.item).find('.active').length ? jQuery(item.item).find('.active').data('facet-item').toString().toUpperCase() : '';
				});
				return data;
			},
			removeAll: function () {

			},

			attachEvents: function () {
				var self = this;
				$(document)
					.on('click', '[data-facet-item]', function (ev) {
						ev.preventDefault();
						var current = jQuery(this),
							facets = current.parents('[data-facet]').find('[data-facet-item]');

						facets.removeClass('active');
						current.addClass('active');
						self.config.data = self.getActiveFacet();
						self.config.callback = jQuery.proxy(function (data) {
							this.publish('products:loaded');
							this.loadNewProducts(data);
						}, self);
						self.ajaxRequest(self.config);

					})
					.on('click', '.advanced-filters', function (ev) {
						ev.preventDefault();

						jQuery('[data-facet-item]').removeClass('active');
						self.config.data = self.getActiveFacet();
						self.config.callback = jQuery.proxy(function (data) {
							this.publish('products:loaded');
							this.loadNewProducts(data);
						}, self);
						self.ajaxRequest(self.config);

					});
			}
		});
		Facets.include(sendRequest);

		return Facets;
	});

