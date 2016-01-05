define([], function () {
	var CalcHeight = function (baseEl, elToFix) {
		return {
			el: document.querySelectorAll(baseEl),
			activeEl: document.querySelectorAll(elToFix),

			getBaseHeight: function () {
				return this.el[0].offsetHeight;
			},

			setHeight: function (el, height) {
				el.style.height = this.getBaseHeight() + 'px';
			},

			init: function(){
				if(this.activeEl.length > 0){
					for(i=0; i < this.activeEl.length; i++){
						this.setHeight(this.activeEl[i]);
					}
				}
			},

			attachEvents: function(){
				jQuery(window).on('resize', jQuery.proxy(function () {
					this.init();
				},this));
			}
		};
	};
	return CalcHeight;
});

