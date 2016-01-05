webpackJsonp([7],{

/***/ 0:
/***/ function(module, exports, __webpack_require__) {

	/**
	 * 
	 * ProductCategory bundle edit entry point
	 * @copyright: Spryker Systems GmbH
	 *
	 */

	'use strict';

	__webpack_require__(49);


/***/ },

/***/ 48:
/***/ function(module, exports, __webpack_require__) {

	/* WEBPACK VAR INJECTION */(function($) {/**
	 * 
	 * ProductCategory bundle add module
	 * @copyright: Spryker Systems GmbH
	 *
	 */

	'use strict';

	__webpack_require__(7);

	$(document).ready(function() {
	    $('.spryker-form-select2combobox').select2();
	});

	/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(4)))

/***/ },

/***/ 49:
/***/ function(module, exports, __webpack_require__) {

	/* WEBPACK VAR INJECTION */(function($) {/**
	 * 
	 * ProductCategory bundle edit module
	 * @copyright: Spryker Systems GmbH
	 *
	 */

	'use strict';

	__webpack_require__(48);

	var productOrder;
	var allProductsTable;
	var productCategoryTable;

	//TODO fix later, see here: https://spryker.atlassian.net/browse/CD-446
	function ProductSelector() {
	    var productSelector = {};
	    var selectedProducts = {};
	    var idKey = 'id';

	    productSelector.addProductToSelection = function(idProduct) {
	        selectedProducts[idProduct] = idProduct;
	    };

	    productSelector.removeProductFromSelection = function(idProduct) {
	        delete selectedProducts[idProduct];
	    };

	    productSelector.isProductSelected = function(idProduct) {
	        return selectedProducts.hasOwnProperty(idProduct);
	    };

	    productSelector.clearAllSelections = function() {
	        selectedProducts = {};
	    };

	    productSelector.addAllToSelection = function(data) {
	        for (var i = 0; i < data.length; i++) {
	            var id = data[i][idKey];
	            selectedProducts[id] = id;
	        }
	    };

	    productSelector.getSelected = function() {
	        return selectedProducts;
	    };

	    return productSelector;
	}


	function TableHandler(sourceTable, destinationTable, checkBoxNamePrefix, labelCaption, labelId, removeHandlerName, formFieldId) {
	    var tableHandler = {
	        checkBoxNamePrefix: checkBoxNamePrefix,
	        labelId: labelId,
	        labelCaption: labelCaption,
	        removeHandlerName: removeHandlerName,
	        formFieldId: formFieldId,
	        sourceTable: sourceTable,
	        destinationTable: destinationTable
	    };

	    var destinationTableProductSelector = new ProductSelector();

	    tableHandler.selectAll = function() {
	        var nodes = sourceTable.dataTable().fnGetNodes();
	        $('input[type="checkbox"]', nodes).prop('checked', true);

	        var sourceTableData = sourceTable.DataTable().rows().data();
	        sourceTableData.each(function(cellData, index) {
	            tableHandler.addSelectedProduct(cellData[0], cellData[1], cellData[2]);
	        });
	    };

	    tableHandler.deSelectAll = function() {
	        var nodes = sourceTable.dataTable().fnGetNodes();
	        $('input[type="checkbox"]', nodes).prop('checked', false);

	        var sourceTableData = sourceTable.DataTable().rows().data();
	        sourceTableData.each(function(cellData, index) {
	            tableHandler.removeSelectedProduct(cellData[0]);
	        });
	    };

	    tableHandler.addSelectedProduct = function(idProduct, sku, name) {
	        if (destinationTableProductSelector.isProductSelected(idProduct)) {
	            return;
	        }
	        destinationTableProductSelector.addProductToSelection(idProduct);

	        destinationTable.dataTable().fnAddData([
	            idProduct,
	            decodeURIComponent((sku + '').replace(/\+/g, '%20')),
	            decodeURIComponent((name + '').replace(/\+/g, '%20')),
	            '<div class=""><a onclick="' + tableHandler.getRemoveHandlerName() + '(this, ' + idProduct + '); return false" href="javascript:void(0);" class="btn btn-xs ">Remove</a></div>'
	        ]);

	        tableHandler.updateSelectedProductsLabelCount();
	    };

	    tableHandler.removeSelectedProduct = function(idProduct) {
	        var selectedProductsData = destinationTable.DataTable().rows().data();
	        selectedProductsData.each(function(cellData, index) {
	            var currentId = cellData[0];

	            if (parseInt(currentId) === parseInt(idProduct)) {
	                destinationTableProductSelector.removeProductFromSelection(idProduct);
	                destinationTable.dataTable().fnDeleteRow(index);
	                var checkbox = $('#' + tableHandler.getCheckBoxNamePrefix() + idProduct);
	                checkbox.prop('checked', false);
	            }
	        });

	        tableHandler.updateSelectedProductsLabelCount();
	    };

	    tableHandler.getSelector = function() {
	        return destinationTableProductSelector;
	    };

	    tableHandler.updateSelectedProductsLabelCount = function() {
	        $('#' + tableHandler.getLabelId()).text(labelCaption + ' (' + Object.keys(this.getSelector().getSelected()).length + ')');
	        var productIds = Object.keys(this.getSelector().getSelected());
	        var s = productIds.join(',');
	        var field = $('#' + tableHandler.getFormFieldId());
	        field.attr('value', s);
	    };

	    tableHandler.getCheckBoxNamePrefix = function() {
	        return tableHandler.checkBoxNamePrefix;
	    };

	    tableHandler.getLabelId = function() {
	        return tableHandler.labelId;
	    };

	    tableHandler.getRemoveHandlerName = function() {
	        return tableHandler.removeHandlerName;
	    };

	    tableHandler.getLabelCaption = function() {
	        return tableHandler.labelCaption;
	    };

	    tableHandler.getFormFieldId = function() {
	        return tableHandler.formFieldId;
	    };

	    tableHandler.getSourceTable = function() {
	        return tableHandler.sourceTable;
	    };

	    tableHandler.getDestinationTable = function() {
	        return tableHandler.destinationTable;
	    };

	    return tableHandler;
	}

	// //all products table
	// function allProductsClickSelectAll() {
	//     allProductsTable.selectAll();

	// }

	function allProductsClickMarkAsSelected(checked, idProduct, sku, name) {
	    if (checked) {
	        allProductsTable.addSelectedProduct(idProduct, sku, name);
	    } else {
	        allProductsTable.removeSelectedProduct(idProduct);
	    }
	}

	function selectedProductClickRemoveSelected(btn, idProduct) {
	    var table = $('#selectedProductsTable').DataTable();
	    table.row($(btn).parents('tr'))
	        .remove()
	        .draw();

	    allProductsTable.getSelector().removeProductFromSelection(idProduct);
	    allProductsTable.updateSelectedProductsLabelCount();
	    $('#' + allProductsTable.getCheckBoxNamePrefix() + idProduct).prop('checked', false);
	}


	// //prodcut category table
	// function categoryProductClickDeSelectAll() {
	//     productCategoryTable.deSelectAll();
	// }

	function categoryTableClickMarkAsSelected(checked, idProduct, sku, name) {
	    if (checked) {
	        productCategoryTable.removeSelectedProduct(idProduct);
	        allProductsTable.removeSelectedProduct(idProduct);
	    } else {
	        productCategoryTable.addSelectedProduct(idProduct, sku, name);
	    }
	}

	function categoryTableClickRemoveSelected(btn, idProduct) {
	    var table = $('#deselectedProductsTable').DataTable();
	    table.row($(btn).parents('tr'))
	        .remove()
	        .draw();

	    productCategoryTable.getSelector().removeProductFromSelection(idProduct);
	    productCategoryTable.updateSelectedProductsLabelCount();
	    $('#' + productCategoryTable.getCheckBoxNamePrefix() + idProduct).prop('checked', true);
	}

	function updateProductOrder(input, idProduct) {
	    var input = $(input);
	    productOrder[idProduct] = input.val();
	    var hiddenField = $('#form_product_order');
	    hiddenField.attr('value', JSON.stringify(productOrder));
	}

	/*        function updateProductCategoryPreconfig(select, idProduct) {
	 var select = $(select);
	 productCategoryPreconfig[idProduct] = select.val();
	 var hiddenField = $('#form_product_category_preconfig');
	 hiddenField.attr('value', JSON.stringify(productCategoryPreconfig));
	 }*/

	$(document).ready(function() {
	    productOrder = {};
	    //productCategoryPreconfig = {};
	    allProductsTable = new TableHandler($('#product-table'), $('#selectedProductsTable'), 'all_products_checkbox_', 'Products to be assigned', 'assigned-tab-label', 'selectedProductClickRemoveSelected', 'form_products_to_be_assigned');
	    productCategoryTable = new TableHandler($('#product-category-table'), $('#deselectedProductsTable'), 'product_category_checkbox_', 'Products to be deassigned', 'deassigned-tab-label', 'categoryTableClickRemoveSelected', 'form_products_to_be_de_assigned');

	    $('#product-table').dataTable({
	        destroy: true,
	        fnDrawCallback: function(settings) {
	            for (var i = 0; i < settings.json.data.length; i++) {
	                var product = settings.json.data[i];
	                var idProduct = parseInt(product[0]);

	                var selector = allProductsTable.getSelector();
	                if (selector.isProductSelected(idProduct)) {
	                    var checkbox = $('#' + allProductsTable.getCheckBoxNamePrefix() + idProduct);
	                    checkbox.prop('checked', true);
	                }
	            }

	        }
	    });

	    productCategoryTable.deSelectAll = function() {
	        var sourceTableData = productCategoryTable.getSourceTable().DataTable().rows().data();
	        var nodes = productCategoryTable.getSourceTable().dataTable().fnGetNodes();
	        $('input[type="checkbox"]', nodes).prop('checked', false);

	        sourceTableData.each(function(cellData, index) {
	            productCategoryTable.addSelectedProduct(cellData[0], cellData[1], cellData[2]);
	        });
	    };

	    productCategoryTable.removeSelectedProduct = function(idProduct) {
	        var destinationTable = productCategoryTable.destinationTable;
	        var selectedProductsData = destinationTable.DataTable().rows().data();
	        selectedProductsData.each(function(cellData, index) {
	            var currentId = cellData[0];

	            if (parseInt(currentId) === parseInt(idProduct)) {
	                productCategoryTable.getSelector().removeProductFromSelection(idProduct);
	                destinationTable.dataTable().fnDeleteRow(index);
	                var checkbox = $('#' + productCategoryTable.getCheckBoxNamePrefix() + idProduct);
	                checkbox.prop('checked', true);
	            }
	        });

	        productCategoryTable.updateSelectedProductsLabelCount();
	    };

	    $('#product-category-table').dataTable({
	        destroy: true,
	        fnDrawCallback: function(settings) {
	            //this.fnDraw(false);
	            for (var i = 0; i < settings.json.data.length; i++) {
	                var product = settings.json.data[i];
	                var idProduct = parseInt(product[0]);

	                var selector = productCategoryTable.getSelector();
	                if (selector.isProductSelected(idProduct)) {
	                    $('#' + productCategoryTable.getCheckBoxNamePrefix() + idProduct).prop('checked', false);
	                }

	                if (productOrder.hasOwnProperty(idProduct)) {
	                    $('#product_category_order_' + idProduct).val(parseInt(productOrder[idProduct]) || 0);
	                }

	                /*                        if (productCategoryPreconfig.hasOwnProperty(idProduct)) {
	                 $('#product_category_preconfig_' + idProduct).val(parseInt(productCategoryPreconfig[idProduct]) || 0);
	                 }*/
	            }
	        }
	    });

	    $('.prcat-select-all a').on('click', function() {
	        allProductsTable.selectAll();
	        return false;
	    });

	    $('.prcat-deselect-all a').on('click', function() {
	        productCategoryTable.deSelectAll();
	        return false;
	    });
	});

	/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(4)))

/***/ }

});