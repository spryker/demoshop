
/*

 EXAMPLE REQUEST CONFIG AND CREDIT CARD DATA

<script>
var payoneConfig = {
    request        : '{{ payoneCreditcardCheckData.request }}',
    mode           : '{{ payoneCreditcardCheckData.mode }}',
    mid            : '{{ payoneCreditcardCheckData.mid }}',
    aid            : '{{ payoneCreditcardCheckData.aid }}',
    portalid       : '{{ payoneCreditcardCheckData.portalid }}',
    hash           : '{{ payoneCreditcardCheckData.hash }}',
    encoding       : '{{ payoneCreditcardCheckData.encoding }}',
    language       : '{{ payoneCreditcardCheckData.language }}',
    storecarddata  : '{{ payoneCreditcardCheckData.storecarddata }}'
};

var creditCardData = {
    ccCardHolder        : $("#salesOrder_payment_ccCardholder").val(),
    ccNumber            : $("#salesOrder_payment_ccNumber").val(),
    ccType              : $("#salesOrder_payment_ccType").val(),
    ccExpirationMonth   : $("#salesOrder_payment_ccExpirationMonth").val(),
    ccExpirationYear    : $("#salesOrder_payment_ccExpirationYear").val(),
    ccVerification      : $("#salesOrder_payment_ccVerification").val()
};

PayoneCC.doRequest(payoneConfig, creditCardData, 'payoneResponseCallback');

</script>


EXAMPLE RESPONSE CALLBACK FUNCTION

<script>
function payoneResponseCallback(response) {
    if (response.get('status') === 'VALID') {
        // get pseudo card pan and truncated pan from payone response
        var pseudoCardPan = response.get('pseudocardpan');
        var truncatedCardPan = response.get('truncatedcardpan');
        // add pseudo card pan to hidden form field
        $("#salesOrder_payment_pseudoCcNumber").val(pseudoCardPan);
        // ...
    } else {
        var message = response.get('errormessage') + "\n" + response.get('customermessage');
        // ...
    }
}
</script>

*/

var PayoneCreditCardCheck = {
    doRequest : function(payoneConfig, creditCardData, responseCallbackFunctionName) {

        var requestor = (function() {

            var requestData = getRequestData(payoneConfig, creditCardData);
            var options = getOptions(responseCallbackFunctionName);
            request(requestData, options);

            function request(requestData, options) {
                $.getScript("https://secure.pay1.de/client-api/js/ajax.js", function(){
                    var request = new PayoneRequest(requestData, options);
                    request.checkAndStore();
                });
            }
            function getOptions (responseCallbackFunctionName) {
                var options = {
                    return_type : "object",
                    callback_function_name : responseCallbackFunctionName
                };
                return options;
            }
            function getRequestData (payoneConfig, creditCardData) {
                var data = {
                    request        : payoneConfig.request,
                    storecarddata  : payoneConfig.storecarddata,
                    mode           : payoneConfig.mode,
                    mid            : payoneConfig.mid,
                    aid            : payoneConfig.aid,
                    portalid       : payoneConfig.portalid,
                    encoding       : payoneConfig.encoding,
                    language       : payoneConfig.language,
                    hash           : payoneConfig.hash,
                    cardholder     : creditCardData.ccCardHolder,
                    cardpan        : creditCardData.ccNumber,
                    cardtype       : creditCardData.ccType,
                    cardexpiremonth: creditCardData.ccExpirationMonth,
                    cardexpireyear : creditCardData.ccExpirationYear,
                    cardcvc2       : creditCardData.ccVerification
                };
                return data;
            }
        })();
    }
};