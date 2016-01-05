define(['components/core'], function (core) {

	var CustomSelect = core.extend({
		constructor: function (options) {
			this.config = {
				classOpen: 'open'
			};
			this.$ = {};
			this.$.el = jQuery(options.el);
			jQuery.extend(true, this.config, options || {});
			this.init();
		},

		init: function () {
			this.attachEvents();
		},

		getSelectedVal: function (el) {
			return el.hasClass('option') ? el.html() : el.find('.option').html();
		},

		setSelectedVal: function (select, val) {
			select.find('.selected-option').html(val);
		},

		attachEvents: function () {
			var self = this;

			// close select on click outside it
			jQuery(document).on('click', jQuery.proxy(function (ev) {
				var curTarget = ev.target || ev.srcElement,
					select = jQuery(curTarget).parents(this.config.el);

				// check if click not on the select then remove open class
				if(typeof select[0] === 'undefined' && !jQuery(curTarget).hasClass(this.config.el.substr(1))){
					self.$.el.removeClass(this.config.classOpen);
				}
			}, this))
				.on('click', '.select-options li', function () {
					var el = jQuery(this),
						select = el.parents('.customized'),
						selectedOpt = self.getSelectedVal(el);

					self.setSelectedVal(select, selectedOpt);
				})
				.on('click', self.config.el, function (ev) {
					ev.preventDefault();
					jQuery(this).hasClass(self.config.classOpen) ? jQuery(this).removeClass(self.config.classOpen) : jQuery(this).addClass(self.config.classOpen);
					self.$.el.not(this).removeClass(self.config.classOpen);
				});
		}
	});

	return CustomSelect;

});
