define([], function(){
	var observer = function(EventEmitter){
		var obj = $({});
		$.each({
			on : 'subscribe',
			one : 'once',
			off : 'unsubscribe',
			trigger : 'publish'
		}, function (key, val) {
			EventEmitter[val] = function () {
				obj[key].apply(obj, arguments);
				return EventEmitter;
			};
		});
		return EventEmitter;
	};

	return observer;

});
