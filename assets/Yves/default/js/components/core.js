define([], function(){

	var Class = function (options) {
		this.config = {};
		$.extend(true, this.config, options || {});
	};

	var classMethods = {

		extend : function(protoProps, staticProps) {
			var parent = this,
				child;

			if (protoProps && protoProps.hasOwnProperty('constructor')) {
				child = protoProps.constructor;
			} else {
				child = function() {
					return parent.apply(this, arguments);
				};
			}

			$.extend(true, child, parent, staticProps);

			var Surrogate = function() {
				this.constructor = child;
			};
			Surrogate.prototype = parent.prototype;
			child.prototype = new Surrogate();

			if (protoProps) {
				$.extend(true, child.prototype, protoProps);
			}

			child.__super__ = parent.prototype;

			return child;
		},
		include : function (mixin) {
			var args = arguments.length > 0 ? $.makeArray(arguments) : [];
			args.unshift(this.prototype);
			$.extend.apply(null, args);
			return this;
		}
	};

	var instanceMethods = {

		loadObjects : function (parent, selectors, target) {
			selectors = selectors || this.config.selectors;
			target = target || this.$;
			var key = null;
			for (key in selectors) {
				target[key] = typeof parent === 'string' ?
					$(parent + ' ' + selectors[key]) :
					$(selectors[key], parent);
			}
			return this;
		}

	};

	$.extend(true, Class, classMethods);
	Class.include(instanceMethods);

	return Class;

});
