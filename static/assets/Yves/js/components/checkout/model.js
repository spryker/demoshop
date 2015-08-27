define([
	'components/core',
	'components/validation',
	'components/helpers/events',
	'components/mixins/ajax-request'
], function (core, Validation, observer, sendRequest) {

	var CheckoutModel = core.extend({

		validation: new Validation,

		constructor: function(){

			observer(this);

			this.config = {
				url: window.location.origin,
				data: {},
				method: 'POST',
				callback: jQuery.proxy(function(resp){
					this.publish(resp ? 'next' : 'error');
				}, this)
			};

		},

		CTA: function(scope, action, step){

			step.completed = false;

			if(!this.validateStep(step, scope)) return;

			var json = this.serializeScope(scope);

			if(!action) return this.publish('next', json);

			if(!this[action]) throw 'action name is not correct';

			this[action](json, step);

		},

		validateStep: function(step, scope){

			var validationObj = this.validation.validateAll(scope);

			step.valid = validationObj.valid;

			if(step.valid) return step;

			this.publish('validation:failed', validationObj);

			return false;

		},

		serializeScope: function(scope){

			var json = {};

			scope.find('[name]').each(function(i, el){

				if(el.type === 'radio' || el.type === 'checkbox'){
					if(el.checked) json[el.name] = el.value;
				} else {
					json[el.name] = el.value;
				}

			});

			scope.find('[data-name]').each(function (i, el) {
				var value = jQuery(el).data('option'),
					name = jQuery(el).data('name');
				json[name] = value;
			});

			if(scope.data('step') === 'address'){
				return {shipping_address: json, billing_address: json};
			}

			return json;

		},

		fetchUser: function() {

			this.ajaxRequest(_.extend({}, this.config, {
				url: this.config.url + '/customer/status',
				callback: jQuery.proxy(function(resp){
					this.publish('user:fetched', resp);
				}, this)

			}));
		},

		login: function(json) {

			this.ajaxRequest(_.extend({}, this.config, {
				data: json,
				url: this.config.url + '/login',
				callback: jQuery.proxy(function(resp){
					resp ? this.fetchUser() : this.publish('error');
				}, this)
			}));

		},

		register: function(json) {

			this.ajaxRequest(_.extend({}, this.config, {
				data: json,
				url: this.config.url + '/register',
				callback: jQuery.proxy(function(resp){
					resp ? this.fetchUser() : this.publish('error');
				}, this)
			}));

		},

		guest: function(json) {

			json.success = true;

			this.publish('user:fetched', json);
		},

		sendRequest: function(json) {

			this.ajaxRequest(_.extend({}, this.config, {
				data: this.requestData,
				url: this.config.url + '/checkout/sendOrder',
				callback: jQuery.proxy(function(resp){
					if(resp.redirectUrl) window.location.href = resp.redirectUrl;
					else console.log(resp)
				}, this)
			}));

		}

	});

	CheckoutModel.include(sendRequest);

	return CheckoutModel;

});

