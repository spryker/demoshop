webpackJsonp([3],{

/***/ 0:
/***/ function(module, exports, __webpack_require__) {

	/**
	 * 
	 * Discount main entry point
	 * @copyright: Spryker Systems GmbH
	 *
	 */

	'use strict';

	__webpack_require__(41);


/***/ },

/***/ 41:
/***/ function(module, exports, __webpack_require__) {

	/**
	 * 
	 * Discount dependencies
	 * @copyright: Spryker Systems GmbH
	 *
	 */

	'use strict';

	__webpack_require__(7);
	__webpack_require__(42);
	__webpack_require__(43);


/***/ },

/***/ 42:
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },

/***/ 43:
/***/ function(module, exports, __webpack_require__) {

	/* WEBPACK VAR INJECTION */(function($) {/**
	 * 
	 * Discount logic
	 * @copyright: Spryker Systems GmbH
	 *
	 */

	'use strict';

	// require('vendor/spryker/spryker/Bundles/Gui/assets/Zed/modules/main');
	var discount = __webpack_require__(44);

	$(function(){

	    $('#add-collector-container').click(function(e){
	        e.preventDefault();
	        discount.loadCollectorPluginForm($(this), 'cart_rule');
	    });

	    $('#add-collector-pool-container').click(function(e){
	        e.preventDefault();
	        discount.loadCollectorPluginForm($(this), 'voucher_codes');
	    });

	    $('#add-rules-container').click(function(e){
	        e.preventDefault();
	        discount.loadCartRulesForm($(this), 'cart_rule');
	    });

	    $('#add-rules-pool-container').click(function(e){
	        e.preventDefault();
	        discount.loadCartRulesForm($(this), 'voucher_codes');
	    });

	    $('.table-data-codes').DataTable({
	        bRegex: false,
	        bSmart: false,
	        initComplete: function () {
	            this.api().columns().every( function () {
	                var column = this;
	                var select = $('<select><option value=""></option></select>')
	                    .appendTo($(column.footer()).empty())
	                    .on( 'change', function () {
	                        var val = $.fn.dataTable.util.escapeRegex(
	                            $(this).val()
	                        );

	                        column
	                            .search(val ? val : '', false, false)
	                            .draw();
	                    } );

	                column.data().unique().sort().each( function ( value, index ) {
	                    select.append('<option value="' + value + '">' + value + '</option>' )
	                } );
	            } );
	        }
	    });

	    $('.ibox-content').on('click', '.remove-form-collection', function(){
	        $(this).closest('.col-md-6').remove();
	    });

	});

	/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(4)))

/***/ },

/***/ 44:
/***/ function(module, exports, __webpack_require__) {

	/* WEBPACK VAR INJECTION */(function($, SprykerAjax) {/**
	 * 
	 * Discount helpers
	 * @copyright: Spryker Systems GmbH
	 *
	 */

	'use strict';

	// require('vendor/spryker/spryker/Bundles/Gui/assets/Zed/modules/main');
	// var SprykerAlert = require('vendor/spryker/spryker/Bundles/Gui/assets/Zed/modules/legacy/SprykerAlert');
	// var SprykerAjax = require('vendor/spryker/spryker/Bundles/Gui/assets/Zed/modules/legacy/SprykerAjax');

	SprykerAjax.loadDecisionRulesOptions = function(element, mainFormName){
	    var elementsCount = $('#rules-container > .col-md-6').length;
	    var nextElementIndex = elementsCount + 1;
	    var options = {
	        elements: nextElementIndex
	    };
	    this.setUrl('/discount/cart-rule/decision-rule/')
	        .setDataType('html')
	        .ajaxSubmit(options, function(ajaxHtmlResponse, options){
	            var html = ajaxHtmlResponse.replace(/decision_rule\[/g, mainFormName + '[decision_rules][rule_' + nextElementIndex + '][');
	            $('#rules-container').append(html);
	            element.children('i').addClass('hidden');
	        }
	    );
	};

	SprykerAjax.loadCollectorPlugins = function(element, mainFormName){
	    var elementsCount = $('#collector-container > .col-md-6').length;
	    var nextElementIndex = elementsCount + 1;
	    var options = {
	        elements: nextElementIndex
	    };
	    this.setUrl('/discount/cart-rule/collector-plugins/')
	        .setDataType('html')
	        .ajaxSubmit(options, function(ajaxHtmlResponse){
	            var html = ajaxHtmlResponse.replace(/decision_rule\[/g, mainFormName + '[collector_plugins][plugin_' + nextElementIndex + '][');
	            $('#collector-container').append(html);
	            element.children('i').addClass('hidden');
	        }
	    );
	};

	module.exports = {
	    loadCartRulesForm: function(element, mainFormName){
	        element.children('i').removeClass('hidden');
	        SprykerAjax.loadDecisionRulesOptions(element, mainFormName);
	    },
	    loadCollectorPluginForm: function(element, mainFormName){
	        element.children('i').removeClass('hidden');
	        SprykerAjax.loadCollectorPlugins(element, mainFormName);
	    }
	};

	/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(4), __webpack_require__(5)))

/***/ }

});