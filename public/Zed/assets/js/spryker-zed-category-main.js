webpackJsonp([1],{

/***/ 0:
/***/ function(module, exports, __webpack_require__) {

	/**
	 *
	 * Spryker alert message manager
	 * @copyright: Spryker Systems GmbH
	 *
	 */

	'use strict';

	__webpack_require__(33);


/***/ },

/***/ 33:
/***/ function(module, exports, __webpack_require__) {

	/**
	 *
	 * Spryker alert message manager
	 * @copyright: Spryker Systems GmbH
	 *
	 */

	'use strict';

	__webpack_require__(7);
	__webpack_require__(34);
	__webpack_require__(35);


/***/ },

/***/ 34:
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },

/***/ 35:
/***/ function(module, exports, __webpack_require__) {

	/* WEBPACK VAR INJECTION */(function($, SprykerAjax) {/**
	 *
	 * Spryker alert message manager
	 * @copyright: Spryker Systems GmbH
	 *
	 */

	'use strict';

	window.serializedList = {};

	// var $ = require('jquery');
	// window.$ = $;
	// window.jQuery = $;
	// var SprykerAjax = require('vendor/spryker/spryker/Bundles/Gui/assets/Zed/modules/legacy/SprykerAjax');

	var categoryHelper = __webpack_require__(36);

	$(document).ready(function() {
	    var triggeredFirstEvent = false;

	    $('#root-node-table').on('click', 'tbody.tr', function(){
	        categoryHelper.showLoaderBar();
	        var idCategoryNode = $(this).children('td:first').text();
	        SprykerAjax.getCategoryTreeByIdCategoryNode(idCategoryNode);
	    });

	    $('#category-node-tree').on('click', '.category-tree', function(event){
	        event.preventDefault();
	        categoryHelper.showLoaderBar();
	        var idCategoryNode = $(this).attr('id').replace('node-', '');
	        SprykerAjax.getCategoryTreeByIdCategoryNode(idCategoryNode);
	    });

	    $('.gui-table-data-category').dataTable({
	        "createdRow": function(row, data, index){
	            if (triggeredFirstEvent === false) {
	                categoryHelper.showLoaderBar();
	                var idCategoryNode = data[0];
	                SprykerAjax.getCategoryTreeByIdCategoryNode(idCategoryNode);
	                triggeredFirstEvent = true;
	            }
	        }
	    });

	    var updateOutput = function(e) {
	        var list = e.length ? e : $(e.target);
	        window.serializedList = window.JSON.stringify(list.nestable('serialize'));
	    };

	    $('#nestable').nestable({
	        group: 1,
	        maxDepth: 1
	    }).on('change', updateOutput);

	    $('.save-categories-order').click(function(){
	        SprykerAjax.updateCategoryNodesOrder(serializedList);
	    });
	});

	/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(4), __webpack_require__(5)))

/***/ },

/***/ 36:
/***/ function(module, exports, __webpack_require__) {

	/* WEBPACK VAR INJECTION */(function($, SprykerAjax, SprykerAjaxCallbacks) {/**
	 *
	 * Spryker alert message manager
	 * @copyright: Spryker Systems GmbH
	 *
	 */

	'use strict';

	// var SprykerAjax = require('vendor/spryker/spryker/Bundles/Gui/assets/Zed/modules/legacy/SprykerAjax');

	var showLoaderBar = function(){
	    $('#category-loader').removeClass('hidden');
	};

	var closeLoaderBar = function(){
	    $('#category-loader').addClass('hidden');
	};

	SprykerAjax.getCategoryTreeByIdCategoryNode = function(idCategoryNode) {
	    var options = {
	        'id-category-node': idCategoryNode
	    };
	    this
	        .setUrl('/category/index/node')
	        .setDataType('html')
	        .ajaxSubmit(options, 'displayCategoryNodesTree');
	};

	SprykerAjax.updateCategoryNodesOrder = function(serializedCategoryNodes){
	    showLoaderBar();
	    this.setUrl('/category/node/reorder').ajaxSubmit({
	        'nodes': serializedCategoryNodes
	    }, 'updateCategoryNodesOrder');
	};

	/*
	 * @param ajaxResponse
	 * @returns string
	 */
	SprykerAjaxCallbacks.displayCategoryNodesTree = function(ajaxResponse){
	    $('#category-node-tree').removeClass('hidden');
	    $('#categories-list').html(ajaxResponse);
	    closeLoaderBar();
	};

	SprykerAjaxCallbacks.updateCategoryNodesOrder = function(ajaxResponse){
	    closeLoaderBar();
	    if (ajaxResponse.code === this.codeSuccess) {
	        swal({
	            title: "Success",
	            text: ajaxResponse.message,
	            type: "success"
	        });
	        return true;
	    }

	    swal({
	        title: "Error",
	        text: ajaxResponse.message,
	        type: "error"
	    });
	};

	module.exports = {
	    showLoaderBar: showLoaderBar,
	    closeLoaderBar: closeLoaderBar
	};

	/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(4), __webpack_require__(5), __webpack_require__(6)))

/***/ }

});