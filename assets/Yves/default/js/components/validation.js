define(['components/core'], function (core) {

	var Validation = core.extend({

		rules: {
			required: function(val){
				return val !== '';
			},
			email: function(val){
				return val === '' || /^\S+@\S+\.\S+$/.test(val);
			},
			minLength: function(val, length){
				return val === '' || val.length >= length;
			},
			maxLength: function(val, length){
				return val === '' || val.length <= length;
			},
			repeat: function(val, originVal){
				return val === originVal;
			},
			checked: function (val) {
				return val;
			}
		},

		validateAll: function(scope){

			if(!scope) throw 'validation scope is not defined';

			var els = scope.find('[data-validate]').removeClass('invalid').filter(':visible'),
				summary = {valid : true},
				result = {};

			if(els.length === 0) return summary;

			_.each(els, function(el){

				el = jQuery(el);

				result = this.validateInput(el, els);

				if(!result.valid){

					summary.valid = false;

					summary.failed = (summary.failed || []).concat(result.failed);

				}

			}, this);

			return summary;

		},

		validateInput: function(el, els){

			var result = {valid: true},
				value = el.attr('type') !== 'checkbox' ? el.val() : el[0].checked;

			_.each(el.data('validate').split(' '), function(rule){

				if(!this.applyRule(rule, value, els)){

					result.valid = false;

					var fail = {}; fail[rule] = el;

					!result.failed ? result.failed = [fail] : result.failed.push(fail);

					el.addClass('invalid');

				}

			}, this);

			return result;

		},

		applyRule: function(rule, value, els){

			var opt;

			if(rule.indexOf('Length') !== -1){ // min+max length

				opt = +rule.split(':')[1];

				rule = rule.split(':')[0];

			} else if (rule.indexOf('repeat') !== -1) { // repeat field

				var origin = els && els.filter('[name="' + rule.split(':')[1] + '"]');

				opt = origin ? origin.eq(0).val() : '';

				rule = rule.split(':')[0];

			}

			if(!this.rules[rule]) throw 'validation rule name is not correct';

			return this.rules[rule](value, opt);

		}

	});

	return Validation;

});
