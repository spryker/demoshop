webpackJsonp([4],{

/***/ 0:
/***/ function(module, exports, __webpack_require__) {

	/**
	 * 
	 * Discount main entry point
	 * @copyright: Spryker Systems GmbH
	 *
	 */

	'use strict';

	__webpack_require__(45);


/***/ },

/***/ 45:
/***/ function(module, exports, __webpack_require__) {

	/**
	 *
	 * Discount dependencies
	 * @copyright: Spryker Systems GmbH
	 *
	 */

	'use strict';

	__webpack_require__(7);
	__webpack_require__(46);


/***/ },

/***/ 46:
/***/ function(module, exports, __webpack_require__) {

	/* WEBPACK VAR INJECTION */(function($, SprykerAjax) {/**
	 *
	 * Discount helpers
	 * @copyright: Spryker Systems GmbH
	 *
	 */

	'use strict';

	// require('vendor/spryker/spryker/Bundles/Gui/assets/Zed/modules/main');

	// var SprykerAjax = require('vendor/spryker/spryker/Bundles/Gui/assets/Zed/modules/legacy/SprykerAjax');

	SprykerAjax.glossaryKeyUniqueCheck = function(){
	    var obj = $('#form_glossary_key').val();
	    this.setUrl('/glossary/key/ajax')
	        .ajaxSubmit({term: obj}, function(ajaxResponse){
	            var changed = false;
	            $.each(ajaxResponse, function(i, item) {
	                var key = '#form_locale_' + i;
	                var value = $(key).val();

	                if (!value.length) {
	                    $(key).val(item);
	                    changed = true;
	                }
	            });

	            //if (changed) {
	            //    $('#form_submit').text('Save');
	            //}
	        });
	};

	$(document).ready(function () {

	    $('#form_glossary_key').blur(function () {
	        SprykerAjax.glossaryKeyUniqueCheck();
	    });

	});

	/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(4), __webpack_require__(5)))

/***/ }

});