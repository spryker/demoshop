webpackJsonp([0],{

/***/ 0:
/***/ function(module, exports, __webpack_require__) {

	/**
	 *
	 * Spryker alert message manager
	 * @copyright: Spryker Systems GmbH
	 *
	 */

	'use strict';

	__webpack_require__(1);


/***/ },

/***/ 1:
/***/ function(module, exports, __webpack_require__) {

	/**
	 *
	 * Spryker alert message manager
	 * @copyright: Spryker Systems GmbH
	 *
	 */

	'use strict';

	__webpack_require__(2);
	__webpack_require__(3);


/***/ },

/***/ 2:
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },

/***/ 3:
/***/ function(module, exports, __webpack_require__) {

	/* WEBPACK VAR INJECTION */(function($, SprykerAjax) {/**
	 *
	 * Spryker alert message manager
	 * @copyright: Spryker Systems GmbH
	 *
	 */

	'use strict';

	__webpack_require__(7);
	__webpack_require__(31);

	// var SprykerAjax = require('vendor/spryker/spryker/Bundles/Gui/assets/Zed/modules/legacy/SprykerAjax');

	$(document).ready(function() {
	    $('#group-table').on('click', 'a.display-roles', function(event){
	        event.preventDefault();
	        var idGroup = $(this).attr('id').replace('group-', '');
	        SprykerAjax.getRolesForGroup(idGroup);
	    });

	    $('#users-in-group').on('click', 'a.remove-user-from-group', function(event){
	        event.preventDefault();
	        var options = $(this).data('options');
	        SprykerAjax.removeUserFromGroup(options);
	    });
	});

	/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(4), __webpack_require__(5)))

/***/ },

/***/ 31:
/***/ function(module, exports, __webpack_require__) {

	/* WEBPACK VAR INJECTION */(function($, SprykerAlert, SprykerAjaxCallbacks, SprykerAjax) {/**
	 *
	 * Spryker alert message manager
	 * @copyright: Spryker Systems GmbH
	 *
	 */

	'use strict';

	// var SprykerAlert = require('Gui/assets/Zed/modules/legacy/SprykerAlert');
	// var SprykerAjaxCallbacks = require('Gui/assets/Zed/modules/legacy/SprykerAjaxCallbacks');

	function spinnerCreate(elementId){
	    var container = $('<div/>', {
	        class: 'sk-spinner sk-spinner-circle'
	    });
	    for (var I = 1; I<=12; I++) {
	        var circle = $('<div>', {
	            class: 'sk-circle sk-circle' + I
	        }).appendTo(container);
	    }
	    $(elementId).html(container);
	}

	function spinnerClear(){
	    $('.group-spinner-container').html('');
	}

	function GroupModalMemoization(){
	    var self = this;

	    var cached = {};

	    self.hasMember = function(memberId){
	        return !!cached[memberId];
	    };

	    self.saveMember = function(memberId, data){
	        cached[memberId] = data;
	    };

	    self.getMember = function(memberId){
	        return cached[memberId];
	    };
	}

	function GroupModal(elementId) {
	    var self = this;
	    self.content = null;

	    self.init = function(){
	        self.content = $('<ul/>', {
	            id: 'group-body-list'
	        });
	    };

	    self.addGroupRoleElement = function(role){
	        $('<li/>', {
	            class: 'role-item',
	            text: role.Name
	        }).appendTo(self.content);
	    };

	    self.showModal = function(){
	        SprykerAlert.custom(self.content, 'Roles in Group');
	    };

	    self.init();
	}

	var memoize = new GroupModalMemoization();

	SprykerAjax.getRolesForGroup = function(idGroup) {
	    var options = {
	        'id-group': idGroup
	    };
	    if (memoize.hasMember(idGroup)) {
	        SprykerAjaxCallbacks.displayGroupRoles(memoize.getMember(idGroup));
	    } else {
	        spinnerCreate('#group-spinner-' + idGroup);
	        this
	            .setUrl('/acl/group/roles')
	            .ajaxSubmit(options, 'displayGroupRoles');
	    }
	};

	SprykerAjax.removeUserFromGroup = function(options){
	    var ajaxOptions = {
	        "id-group": parseInt(options.idGroup),
	        "id-user": parseInt(options.idUser)
	    };
	    if (!confirm('Are you sure you want to detele this user from this group ?')) {
	        return false;
	    }
	    if (ajaxOptions.idGroup < 1 || ajaxOptions.idUser < 1) {
	        SprykerAlert.error('User Id and Group Id cannot be null');
	        return false;
	    }
	    this.setUrl('/acl/group/remove-user-from-group').ajaxSubmit(ajaxOptions, 'removeUserRowFromGroupTable');
	};

	SprykerAjaxCallbacks.displayGroupRoles = function(ajaxResponse){
	    if (ajaxResponse.code == this.codeSuccess) {
	        if (ajaxResponse.data.length > 0) {
	            var groupModal = new GroupModal('#modal-body');
	            if (!memoize.hasMember(ajaxResponse.idGroup)) {
	                memoize.saveMember(ajaxResponse.idGroup, ajaxResponse);
	            }
	            ajaxResponse.data.forEach(function(role){
	                groupModal.addGroupRoleElement(role);
	            });
	            groupModal.showModal();
	        }
	    }
	    spinnerClear();
	};

	SprykerAjaxCallbacks.removeUserRowFromGroupTable = function(ajaxResponse){
	    if (ajaxResponse.code == this.codeSuccess) {
	        var tableRow = $('#row-' + ajaxResponse['id-user'] + '-' + ajaxResponse['id-group']).closest('tr');
	        tableRow.addClass('removed-group-user');
	        tableRow.fadeOut('slow', function(){
	            tableRow.remove();
	        });
	        return false;
	    }

	    SprykerAlert.error(ajaxResponse.message);
	};

	/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(4), __webpack_require__(32), __webpack_require__(6), __webpack_require__(5)))

/***/ },

/***/ 32:
/***/ function(module, exports, __webpack_require__) {

	/* WEBPACK VAR INJECTION */(function($) {/**
	 * 
	 * Spryker alert message manager
	 * @copyright: Spryker Systems GmbH
	 *
	 */

	'use strict';

	module.exports = new function() {
	    var self = this;
	    self.init = function(){
	        self.clean();
	    };
	    self.success = function(message){
	        var data = {
	            "message": message,
	            "title": "Success"
	        };
	        self.clangeClass('alert-success');
	        self.displayAlert(data);
	    };
	    self.error = function(message) {
	        var data = {
	            "message": message,
	            "title": "Error"
	        };
	        self.clangeClass('alert-danger');
	        self.displayAlert(data);
	    };
	    self.info = function(message){
	        return self.custom(message);
	    };
	    self.custom = function(message, title){
	        var data = {
	            "message": message,
	            "title": title || "Info"
	        };
	        self.clangeClass('alert-info');
	        self.displayAlert(data);
	    };
	    self.clean = function() {
	        $('#modal-content').removeClass([
	            'alert-success',
	            'alert-danger',
	            'alert-info',
	            'alert-warning'
	        ]);
	        $('#modal-title').html('');
	        $('#modal-body').html('');
	    };
	    self.clangeClass = function(className){
	        self.clean();
	        $('#modal-content').addClass(className);
	    };
	    self.displayAlert = function(options){
	        $('#modal-title').html(options.title);
	        $('#modal-body').html(options.message);
	        self.show();
	    };
	    self.show = function(){
	        $('#modal-alert').modal('show');
	    };
	    self.init();
	};

	/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(4)))

/***/ }

});