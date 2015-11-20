define([], function () {

	return {
		ajaxRequest: function(options){
			return $.ajax({
				url : options.url,
				data : options.data,
				type : options.method,
				success : function(data) {
					if(typeof options.callback === 'function'){
						options.callback(data);
					}
				},
				error: function(error) {
					console.error('Cannot receive data: ', error);
				}
			});
		}
	};

});
