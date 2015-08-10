window.addEventListener('DOMContentLoaded', function onload(e) {
	window.removeEventListener('DOMContentLoaded', onload, false);


	function _buildMessage(type, data) {
		if (typeof type !== 'string' || type === "") throw new TypeError();

		var res = {
			type : type,
			data : null
		};

		if (data !== undefined) res.data = data;

		return res;
	}


	function _listen(e) {
		var type = e.data.type;
		var data = e.data.data;

		switch (type) {
			case 'openedConnection' :
				if (_state !== 0) {
					console.warn('connection state out of sync');

					return;
				}

				_state = 1;
				_zed.postMessage(_buildMessage('requestStrings', _data));

				return;

			case 'setStrings'       :
				if (_state !== 1) {
					console.warn('connection state out of sync');

					return;
				}

				_updateNodes(data);

				return;

			case 'updateString'     :
				if (_state !== 1) {
					console.warn('connection state out of sync');

					return;
				}

				_updateNode(data.name, data.value);

				return;

			case 'closeConnection'  :
				if (_state !== 1) {
					console.warn('conection state out of sync');

					return;
				}

				_state = 2;
				_zed.postMessage('closedConnection');

				return;

			default : console.warn('received unknown command');
		}
	}


	function _updateNode(id, fragment) {
		if (typeof id !== 'string' || typeof fragment !== 'string') throw new TypeError();

		var index = data.indexOf(id);

		if (index === -1) throw new Error();

		_nodes[index].innerHTML = fragment;
	}

	function _updateNodes(dict) {
		if (!(dict instanceof Object)) throw new TypeError();

		for (var id in dict) _updateNode(id, dict[id]);
	}


	var _state = 0;
	var _zed   = window.top;
	var _nodes = document.querySelector('data.spy-cms-editable');
	var _data  = nodes.map(function(item, index, source) {
		return item.getAttribute('value');
	});

	window.addEventListener('message', _listen(e), false);
	_zed.postMessage(_buildMessage('openConnection'), '*');
}, false);