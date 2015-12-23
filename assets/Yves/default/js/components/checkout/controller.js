define([
	'components/core',
	'components/helpers/events'
], function (core, observer) {

	return core.extend({

		steps: [
			{name: 'login'/*, valid: false, completed: false*/}, // available options of step
			{name: 'address'},
			{name: 'delivery'},
			{name: 'payment'},
			{name: 'summary'}
		],

		constructor: function(){

			_.bindAll(this, 'checkHash');

			observer(this);

			window.onhashchange = this.checkHash;

		},

		checkHash: function(){

			var step = this.getStep();

			!!step && this.isAllowed(step) ? this.publish('apply:step', step) : window.location.hash = this.getLastAllowed().name;

		},

		isAllowed: function(step){

			var i = _.indexOf(this.steps, step);

			return i === 0 || (this.steps[i-1].completed && this.steps[i-1].valid);

		},

		getLastAllowed: function(){

			return this.steps[_.findLastIndex(this.steps, function(step){return this.isAllowed(step)}, this)];

		},

		getStep: function(name){

			return _.find(this.steps, function(step){return '#' + step.name === (name ? '#' + name : window.location.hash)});

		},

		setStep: function(step){

			if(!step) return;

			if(typeof step === 'string') step = this.getStep(step);

			if(step && this.isAllowed(step)) window.location.hash = step.name;

		},

		back: function(e){

			var i = _.indexOf(this.steps, this.getStep());

			if(i === 0) return;

			e.preventDefault();

			this.setStep(this.steps[i-1]);

		},

		next: function(){

			var i = _.indexOf(this.steps, this.getStep());

			if(i < this.steps.length - 1) this.setStep(this.steps[i+1]);

		}

	});

});
