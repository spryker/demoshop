app.configproduct = {

    init : function (productStorage, maxAddToCartQty) {
        this.productStorage = productStorage;
        this.maxAddToCartQty = maxAddToCartQty;
        this.selectedSku = null;
        this.productSelectInit();
        $('#form-product-add-to-cart').submit(function(e) {
            var actionUrl = '/cart/add/' + this.selectedSku;
            $('#form-product-add-to-cart').get(0).setAttribute('action', actionUrl);
        }.bind(this));
    },

    productSelectInit : function () {
        $( "#sub-product-select" ).change(function(event) {
            var sku = $(event.target).val();
            if(sku == "") {
                this.setSelectedSku(null);
                this.disableSubmitButton();
                this.updatePriceView(null);
            } else {
                this.setSelectedSku(sku);
                this.updatePriceView(sku);
                this.updateStockInput(sku);
                this.enableSubmitButton();
            }
        }.bind(this));
    },

    setSelectedSku : function (sku) {
        this.selectedSku = sku;
    },

    getSelectedSku : function () {
        return this.selectedSku;
    },

    updatePriceView : function (sku) {
        if(sku == null) {
            $('#selected-price').text('-,--');
        } else {
            var newPrice = this.productStorage[sku]['price'];
            $('#selected-price').text(newPrice);
        }
    },

    updateStockInput : function (sku) {
        var currentStock = this.productStorage[sku]['stock'];
        var newMax = currentStock > this.maxAddToCartQty ? this.maxAddToCartQty : currentStock;
        $('#selected-stock').attr('max', newMax).val(1);
    },

    disableSubmitButton : function () {
        $('#product-add-to-card-submit').attr('disabled','disabled');
    },

    enableSubmitButton : function () {
        $('#product-add-to-card-submit').removeAttr("disabled");
    }

};
