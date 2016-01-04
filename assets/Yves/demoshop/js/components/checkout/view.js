define([
	'components/core',
	'components/helpers/events',
	'components/checkout/model',
	'components/checkout/controller',
	'components/custom-select'
], function (core, observer, CheckoutModel, CheckoutController, CustomSelect) {

	return core.extend({

		constructor: function(){

			observer(this);

			_.bindAll(this, 'applyStep');

			this.attachEvents();

			this.model = new CheckoutModel();

			this.controller = new CheckoutController();

			this.controller.subscribe('apply:step', this.applyStep);

			this.model.requestData = {};

			this.bindModel();

			this.model.fetchUser();

			this.selects = new CustomSelect({

				el: '.customized'

			});

		},

		publishForm: function(data){
			this.unsubscribe('step:applied');

			this.subscribe('step:applied', jQuery.proxy(function (e, step) {

				var scope = jQuery('[data-step="'+step.name+'"]');

				scope.find('[name]').each(function (i, el) {
					var name = jQuery(el).attr('name');

					if(!!data[name]) jQuery(el).val(data[name]);
				});

				this.model.requestData = _.extend({}, this.model.requestData, data);

			}, this));

		},

		attachEvents: function(){

			this.attachControls();

			this.attachTogglers();

		},

		attachControls: function(){

			jQuery('a.navigator').on('click', jQuery.proxy(function(e){

				e.preventDefault();

				this.controller.setStep(jQuery(e.currentTarget).data('navigate'));

			}, this));

			jQuery('a.back').on('click', jQuery.proxy(function(e){

				this.controller.back();

			}, this));

			jQuery('.CTA').on('click', jQuery.proxy(function(e){

				e.preventDefault();

				var target = jQuery(e.currentTarget);

				this.bindModel();

				this.model.CTA(target.parents('.form-scope'), target.data('action'), this.controller.getStep());

			}, this));

		},

		attachTogglers: function(){

			_.each(jQuery('.toggler-section').filter(function() {return $(this).css('display') !== 'none'}), function(inst){

				var openers = jQuery(inst).find('[data-target]');

				openers.on('click', jQuery.proxy(function(e){

					var current = jQuery(e.currentTarget);

					if(current.prop('tagName') !== 'INPUT') e.preventDefault();

					if(openers.length === 1){ // single , i.e. toggler

						current.toggleClass('active');

					} else { // multi, i.e. tabs

						openers.removeClass('active');

						current.addClass('active');

					}

					this.toggleContent(openers);

				}, this));

				this.toggleContent(openers);

			}, this);

		},

		toggleContent: function(openers){

			_.each(openers, function(opener){

				var opener = jQuery(opener),
					dest = jQuery('[data-content="' + opener.data('target') + '"]');

				opener.hasClass('active') ? dest.removeClass('hide') : dest.addClass('hide');

			});

		},

		applyStep: function(e, step){

			jQuery('.wizard-step').addClass('hide').filter('[data-step="'+step.name+'"]').removeClass('hide');

			var nav = jQuery('ul.checkout-steps').addClass('hide');

			if(step.name === 'login') return;

			nav.removeClass('hide').find('li').removeClass('current');

			nav.find('a[data-navigate="' + step.name + '"]').parents('li').addClass('current');

			this.publish('step:applied', step);

		},

		bindModel: function(){

			this.model.unsubscribe();

			this.model.subscribe('validation:failed', jQuery.proxy(this.onValidationFailed, this));

			this.model.subscribe('error', jQuery.proxy(this.onError, this));

			this.model.subscribe('next', jQuery.proxy(this.onNext, this));

			this.model.subscribe('user:fetched', jQuery.proxy(this.onUserFetched, this));

		},

		// event handlers

		onValidationFailed: function(e, data){
			console.log(data);
		},

		onError: function(e, data){
			console.log(data);
		},

		onNext: function(e, json){

			this.controller.getStep().completed = true;

			this.controller.next();

			this.publishForm(json);

		},

		onUserFetched: function(e, data){

			if(data && data.success){

				this.controller.steps = this.controller.steps.splice(1, this.controller.steps.length - 1);

				this.publishForm(data);

			}

			this.controller.checkHash();

		}

	});

});
