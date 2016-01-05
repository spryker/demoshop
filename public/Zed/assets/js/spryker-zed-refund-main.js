webpackJsonp([9],{

/***/ 0:
/***/ function(module, exports, __webpack_require__) {

	/**
	 * 
	 * Discount main entry point
	 * @copyright: Spryker Systems GmbH
	 *
	 */

	'use strict';

	__webpack_require__(50);


/***/ },

/***/ 50:
/***/ function(module, exports, __webpack_require__) {

	'use strict';

	__webpack_require__(51);

/***/ },

/***/ 51:
/***/ function(module, exports, __webpack_require__) {

	/* WEBPACK VAR INJECTION */(function($) {'use strict';

	__webpack_require__(52);

	$(document).ready(function() {
	    $('table.add-refund').on('change', 'input', function(e) {
	        var quantity = parseInt($(this).val(), 10);
	        if (quantity < 0) {
	            quantity = 0;
	            $(this).val(quantity);
	        }

	        var max = $(this).data('quantity');
	        if (quantity > max) {
	            quantity = max;
	            $(this).val(quantity);
	        }

	        calculateTotalRefundAmount();
	    });

	    $('#form_adjustment_fee').change(function(e) {
	        //TODO: Maybe add a warning when not all expenses are refunded but if all items will be refunded? CD-448

	        calculateTotalRefundAmount();
	    });

	    calculateTotalRefundAmount();
	});


	/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(4)))

/***/ },

/***/ 52:
/***/ function(module, exports, __webpack_require__) {

	/* WEBPACK VAR INJECTION */(function($) {'use strict';

	module.exports = {
	    calculateTotalRefundAmount: function() {
	        var sum = 0;
	        $('table.table input').each(function() {
	            var quantity = parseInt($(this).val(), 10);
	            if (!quantity) {
	                return;
	            }
	            var price = $(this).data('price');
	            sum = sum + quantity * price;
	        });

	        var adjustmentFee = parseInt($('#form_adjustment_fee').val(), 10) || 0;
	        sum = sum + adjustmentFee;

	        if (sum < 0) {
	            adjustmentFee = adjustmentFee + sum;
	            $('#form_adjustment_fee').val(adjustmentFee);
	            sum = 0;
	        }

	        var maxSum = parseInt($('div.refund-form').data('max'), 10);
	        if (sum > maxSum) {
	            adjustmentFee = adjustmentFee - (sum - maxSum);
	            $('#form_adjustment_fee').val(adjustmentFee);
	            sum = maxSum;
	        }

	        $('#form_amount').val(sum);
	    }
	};

	/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(4)))

/***/ }

});