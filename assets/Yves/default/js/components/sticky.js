define(['components/core'],
	function (core) {

		var StickyElement = core.extend({
			constructor: function (options) {
				this.config = {
					stickyClass: 'sticky-filter'
				};
				this.$ = {};
				this.$.el = jQuery(options.el);
				jQuery.extend(true, this.config, options || {});
				this.init();
			},

			init: function () {
				this.initialPosition = this.$.el.offset().top;
				this.attachEvents();
			},

			_checkPosition: function () {
				var pagePos = jQuery(window).scrollTop();

				return pagePos >= this.initialPosition;
			},

			attachEvents: function () {
				jQuery(window).on('scroll', jQuery.proxy(function () {
					if(this._checkPosition()){
						this.$.el.addClass(this.config.stickyClass);
					}else{
						this.$.el.removeClass(this.config.stickyClass);
					}
				},this));
			}
		});

		return StickyElement;
	});
