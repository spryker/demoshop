/* global
 app: true,
 jQuery: false,
 google: false
 */
(function (app, $) {
    'use strict';

    /* var smartAddressVars = {
     required : [
     // 'gender',
     'salesOrder[full_name]',
     'salesOrder[full_address]'
     ],
     addressField : 'salesOrder[full_address]',
     nameField : 'salesOrder[full_name]',
     // genderField : 'gender',
     relevantGValues : [
     'street_number',
     'route',
     'locality',
     'postal_code',
     'country'
     ],
     scopes : [
     'shipping', 'billing'
     ],
     resultDiv : '.addressResult',
     triggers : '.smartAddressTrigger',
     geocodeUrl : 'http://maps.googleapis.com/maps/api/geocode/json'
     }; */

    var stepsVars = {
        current : 1,
        count : 2,
        el : '#checkout .step',
        form : '#checkout .smartAddressForm'
    };

    /* var smartAddress = {
     // expose
     vars : smartAddressVars,

     init : function () {
     $.getScript('//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=app.checkout.smartAddress.test');
     //alert('Was fehlt noch: Ein ensureVisibility helper muss rein & die validation noch ausgeklügelter');
     },

     test : function () {
     smartAddressVars.geocoder = new google.maps.Geocoder();

     $( smartAddressVars.triggers )
     .on({
     change : smartAddress.apply,
     click : function ( ev ) {
     var shouldApply =
     $( smartAddressVars.triggers ).length &&
     ev.target.value &&
     ! smartAddress.resultIsVisible();

     if ( shouldApply ) {
     smartAddress.apply();
     }
     }
     });

     $( smartAddressVars.resultDiv )
     .children( 'button' )
     .on({
     click : function ( ev ) {
     ev.preventDefault();
     smartAddress.hideResult();
     }
     });
     },

     apply : function ( ev, withoutStorePrependix ) {
     var fields   = $( stepsVars.form ).serializeArray();
     var required = smartAddressVars.required;

     $.each( fields, function ( key, object ) {
     required = required.filter( function ( item ) {
     return item !== object.name || object.value === '';
     });
     });

     if ( required.length ) {
     return false;
     }

     smartAddress.triggerSearch( fields, withoutStorePrependix );
     },

     triggerSearch : function ( fields, withoutStorePrependix ) {
     if ( ! smartAddressVars.geocoder ) {
     return false;
     }

     var address = smartAddress.getField( smartAddressVars.addressField, fields );

     var addressSuffix = '';

     if ( ! withoutStorePrependix ) {
     addressSuffix = ' ' + app.vars.storeLocale;
     }

     smartAddressVars.geocoder.geocode({
     address : address + addressSuffix
     }, function ( results, status, response ) {
     var relevantValues = {};

     var fullName  = smartAddress.getField( smartAddressVars.nameField, fields );
     var nameParts = fullName.split(' ');

     relevantValues.last_name = nameParts.pop();

     if ( ! nameParts.length ) {
     return false;
     }

     relevantValues.first_name  = nameParts.shift();
     relevantValues.middle_name = nameParts.join( ' ' );

     var failedResponse =
     ! status ||
     status !== google.maps.GeocoderStatus.OK ||
     ! results ||
     ! results[ 0 ];

     if ( failedResponse ) {
     if ( withoutStorePrependix ) {
     return smartAddress.showResult( relevantValues );
     }

     return smartAddress.apply( null, true );
     }

     var addressComponents = results[0].address_components;

     $.each( addressComponents, function ( key, addressComponent ) {
     $.each( addressComponent.types, function ( key, type ) {
     if ( $.inArray( type, smartAddressVars.relevantGValues ) >= 0 ) {
     relevantValues[ type ] = addressComponent;
     }
     });
     });

     // relevantValues.gender = smartAddress.getField(smartAddressVars.genderField, fields);

     smartAddress.showResult( relevantValues );
     });
     },

     getField : function ( fieldName, fields ) {
     var value = '';

     $.each( fields, function ( index, field ) {
     if ( field.name === fieldName ) {
     value = field.value;
     }
     });

     return value;
     },

     showResult : function ( relevantValues ) {
     var $resultDiv = $( smartAddressVars.resultDiv );

     if ( ! relevantValues ) {
     return $resultDiv.show();
     }

     $resultDiv
     .find( ':input' )
     .val( '' );

     $.each( relevantValues, function ( key, value ) {
     var $target = $( '[data-src="' + key + '"]' );

     if ( value.long_name ) {
     value =
     $target.data( 'src-type' ) ?
     value[ $target.data( 'src-type' ) + '_name' ] :
     value.long_name;
     }

     if ( ! $target.length ) {
     return false;
     }

     if ( $target.is( ':input' ) ) {
     $target.val( value );
     } else {
     $target.text( value );
     }
     });

     $resultDiv.find('input.name').each(function() {
     $(this).prev().html($(this).val());
     });

     $resultDiv.show();
     },

     hideResult : function() {
     $( smartAddressVars.resultDiv ).hide();
     },

     resultIsVisible : function() {
     return $( smartAddressVars.resultDiv ).is( ':visible' );
     },

     containsErrors : function() {
     return !! $( smartAddressVars.resultDiv ).find( '.validationError' ).length;
     }
     }; */

    var steps = {
        // expose
        vars : stepsVars,
        init : function () {
            $(stepsVars.form).on({
                submit : function (ev) {
                    if (stepsVars.current < stepsVars.count) {
                        ev.preventDefault();
                    }

                    var $container =
                        $(stepsVars.el)
                            .filter('[data-step=' + stepsVars.current + ']');

                    steps.copyAddress();

                    if (validation.resultIsValid(validation.apply($container))) {
                        steps.next();
                    } else {
                        /* if ( smartAddress.containsErrors() ) {
                         smartAddress.showResult();
                         } else {
                         smartAddress.hideResult();
                         } */
                        // @todo ensureVisibility helper, error descriptions
                    }
                }
            });
        },
        change : function () {
            var $newLayer =
                $(stepsVars.el)
                    .filter('[data-step=' + this.vars.current + ']');

            var data = $(stepsVars.form).serializeArray();

            $.each(data, function (index, data) {
                var $target = $newLayer.find('[data-formsrc="' + data.name + '"]');

                if (!$target.length) {
                    // continue
                    return;
                }

                if ($target.is(':input')) {
                    $target.val(data.value);
                } else {
                    $target.text(data.value);
                }
            });

            $newLayer
                .find('[data-elsrc]')
                .each(function (index, el) {
                    var $el = $(el);
                    var $elTarget = $($el.data('elsrc'));

                    var value;

                    if ($elTarget.is('select')) {
                        value = $elTarget.children('option:selected').text();
                    } else if ($elTarget.is(':input')) {
                        value = $elTarget.val();
                    } else {
                        value = $elTarget.html();
                    }

                    $el.html(value);
                });

            $newLayer
                .show()
                .siblings()
                .hide();
        },
        previous : function () {
            if (stepsVars.current < 2) {
                return false;
            }

            stepsVars.current--;
            steps.change();
        },
        next : function () {
            if (stepsVars.current >= stepsVars.count) {
                return false;
            }

            stepsVars.current++;
            steps.change();
        },
        copyAddress : function () {
            // this is just for the 2nd step.. the backend should evaluate the checkbox anyway
            // todo: make it less hard coded
            if ($('#salesOrder_chooseDifferentBilling').is(':checked')) {
                return false;
            }

            $(':input[name^="salesOrder[shippingAddress]["]')
                .each(function (index, el) {
                    var $el = $(el);

                    var currentPart =
                        $el.attr('name')
                            .split('[')[ 2 ]
                            .split(']')[ 0 ];

                    $(':input[name="salesOrder[billingAddress][' + currentPart + ']"]')
                        .val($el.val());
                });
        }
    };

    var validation = {
        apply : function ($container) {
            var result = validation.check($container);

            $container
                .find(':input[name]')
                .removeClass('validationError');

            validation.getInvalidItems(result)
                .addClass('validationError');

            return result;
        },

        resultIsValid : function (result) {
            var valid = true;

            $.each(result, function (index, el) {
                if (!el.valid) {
                    valid = false;
                }
            });

            return valid;
        },

        getInvalidItems : function (result) {
            var names = [];

            $.each(result, function (index, el) {
                if (!el.valid) {
                    names.push(index);
                }
            });

            var selector =
                names
                    .map(function (item) {
                        return '[name="' + item + '"]';
                    })
                    .join(', ');

            return $(selector);
        },

        check : function ($container) {
            var result = {};
            var formValues = {};

            var serializedForm =
                $container
                    .closest('form')
                    .serializeArray();

            $.each(serializedForm, function (index, el) {
                formValues[ el.name ] = el.value;
            });

            $.each($container.find('[data-validator-precondition]'), function (index, el) {
                var $el = $(el);

                var preconditionFunction = new Function($el.data('validatorPrecondition'));

                if (!preconditionFunction()) {
                    $el.attr('data-validator-prevent', true);
                } else {
                    $el.removeAttr('data-validator-prevent');
                }
            });

            var $notPreventedInputs =
                $container
                    .find(':input[name]')
                    .not('[data-validator-prevent] :input');

            $notPreventedInputs.each(function (index, el) {
                var $el = $(el);
                var currentName = $el.attr('name');

                result[ currentName ] = {
                    valid : true,
                    check : 'none'
                };

                if ($el.is(':required')) {
                    result[ currentName ] = {
                        valid : !!formValues[currentName],
                        check : 'required'
                    };
                }

                if (!result[currentName].valid) {
                    // continue
                    return;
                }

                if ($el.is('[type=email]')) {
                    result[currentName] = {
                        valid : /[A-Z0-9._%a-z\-\+]+?@(?:[A-Z0-9a-z\-]+\.)+?[A-Za-z]{2,4}/.test(formValues[currentName]),
                        check : 'email'
                    };
                }

                // implement more checks here if necessary
            });

            return result;
        }
    };

    app.checkout = {
        init : function () {
            app.settings.set('visitedBefore', true);

            // smartAddress.init();
            steps.init();

            $('.triggerAlternative').on({
                change : function (ev) {
                    $('.address.secondaryRow').toggle(ev.target.checked);
                    // alert('Was fehlt noch: Ein ensureVisibility helper muss rein & die validation noch ausgeklügelter');
                }
            }).change();
        },

        // smartAddress : smartAddress,
        steps : steps,
        validation : validation
    };

    app.additionals.push('checkout');

})(app, jQuery);


// app.checkout = {
//     init : function() {
//         app.settings.set('visitedBefore', true);
//         this.smartAddress.init();
//         this.steps.init();
//         $('.triggerAlternative').change(function() {
//             if ($(this).is(':checked')) {
//                 $('.address.secondaryRow').show();
//             } else {
//                 $('.address.secondaryRow').hide();
//             }
//         });
//         //alert('Was fehlt noch: Ein ensureVisibility helper muss rein & die validation noch ausgeklügelter');
//     },
//     smartAddress : {
//         vars : {
//             required : [/*'gender',*/ 'salesOrder[full_name]', 'salesOrder[full_address]'],
//             addressField : 'salesOrder[full_address]',
//             nameField : 'salesOrder[full_name]',
//             // genderField : 'gender',
//             relevantGValues : ['street_number', 'route', 'locality', 'postal_code', 'country'],
//             scopes : ['shipping', 'billing'],
//             resultDiv : '.addressResult',
//             triggers : '.smartAddressTrigger',
//             geocodeUrl : 'http://maps.googleapis.com/maps/api/geocode/json'
//         },
//         init : function() {
//             $(this.vars.triggers).change(this.apply.bind(this))
//                 .click(this.click.bind(this));
//             $(this.vars.resultDiv).children('button').click(function(e) {
//                 e.preventDefault();
//                 this.hideResult();
//             }.bind(this));
//         },
//         click : function(e) {
//             if ($(this.vars.triggers).length && $(e.target).val() && !this.resultIsVisible()) {
//                 this.apply();
//             }
//         },
//         apply : function(e, withoutStorePrependix) {
//             var fields = $(app.checkout.stepsVars.form).serializeArray();
//             var required = this.vars.required;

//             $.each(fields, function(key, object) {
//                 required = required.filter(function(item) {
//                     return item !== object.name || object.value === '';
//                 });
//             });

//             if (required.length) {
//                 return;
//             }

//             this.triggerSearch(fields, withoutStorePrependix);
//         },
//         triggerSearch : function(fields, withoutStorePrependix) {
//             var address = this.getField(this.vars.addressField, fields);
//             $.getJSON(this.vars.geocodeUrl, { address : address + (withoutStorePrependix ? '' : (' ' + app.vars.storeLocale)) , sensor : false }, function(response) {
//                 var relevantValues = {};

//                 var fullName = this.getField(this.vars.nameField, fields);
//                 var nameParts = fullName.split(' ');
//                 relevantValues.last_name = nameParts.pop();
//                 if (!nameParts.length) {
//                     return;
//                 }
//                 relevantValues.first_name = nameParts.shift();
//                 relevantValues.middle_name = nameParts.join(' ');

//                 if (!response || response.status !== 'OK' || !response.results || !response.results[0]) {
//                     if (withoutStorePrependix) {
//                         return this.showResult(relevantValues);
//                     }
//                     return app.checkout.smartAddress.apply(null, true);
//                 }

//                 $.each(response.results[0].address_components, function(key, addressComponent) {
//                     $.each(addressComponent.types, function(key, type) {
//                         if ($.inArray(type, this.vars.relevantGValues) !== -1) {
//                             relevantValues[type] = addressComponent;
//                         }
//                     }.bind(this));
//                 }.bind(this));

//                 // relevantValues.gender = this.getField(this.vars.genderField, fields);

//                 this.showResult(relevantValues);
//             }.bind(this));
//         },
//         getField : function(fieldName, fields) {
//             for (var i in fields) {
//                 if (fields[i].name === fieldName) {
//                     return fields[i].value;
//                 }
//             }
//             return '';
//         },
//         showResult : function(relevantValues) {
//             var $resultDiv = $(this.vars.resultDiv);

//             if (!relevantValues) {
//                 return $resultDiv.show();
//             }
//             $resultDiv.find(':input').val('');
//             $.each(relevantValues, function(key, value) {
//                 var $target = $('[data-src="' + key + '"]');

//                 if (value.long_name) {
//                     value = $target.data('src-type') ? value[$target.data('src-type') + '_name'] : value.long_name;
//                 }

//                 if (!$target.length) { return; }

//                 if ($target.is(':input')) {
//                     $target.val(value);
//                 } else {
//                     $target.text(value);
//                 }
//             });

//             $resultDiv.find('input.name').each(function() {
//                 $(this).prev().html($(this).val());
//             });

//             $resultDiv.show();
//         },
//         hideResult : function() {
//             $(this.vars.resultDiv).hide();
//         },
//         resultIsVisible : function() {
//             return $(this.vars.resultDiv).is(':visible');
//         },
//         containsErrors : function() {
//             return !!$(this.vars.resultDiv).find('.validationError').length;
//         }
//     },
//     steps : {
//         vars : {
//             current : 1,
//             count : 2,
//             el : '#checkout .step',
//             form : '#checkout .smartAddressForm'
//         },
//         init : function() {
//             $(this.vars.form).submit(function(e) {
//                 if (this.vars.current < this.vars.count) {
//                     e.preventDefault();
//                 }
//                 var validation = app.checkout.validation;
//                 var $container = $(this.vars.el).filter('[data-step=' + this.vars.current + ']');
//                 this.copyAddress();

//                 if (validation.resultIsValid(validation.apply($container))) {
//                     this.next();
//                 } else {
//                     var smartAddress = app.checkout.smartAddress;
//                     if (smartAddress.containsErrors()) {
//                         smartAddress.showResult();
//                     } else {
//                         smartAddress.hideResult();
//                     }
//                     // @todo ensureVisibility helper, error descriptions
//                 }
//             }.bind(this));
//         },
//         change : function() {
//             var $newLayer = $(this.vars.el).filter('[data-step=' + this.vars.current + ']');
//             var data = $(this.vars.form).serializeArray();
//             $.each(data, function() {
//                 var $target = $newLayer.find('[data-formsrc="' + this.name + '"]');
//                 if (!$target.length) { return; }
//                 $target[$target.is(':input') ? $target.val(this.value) : $target.text(this.value)];
//             });
//             $newLayer.find('[data-elsrc]').each(function() {
//                 var $elTarget = $($(this).data('elsrc'));
//                 var value = $elTarget.is('select') ? $elTarget.find('option:selected').text() : ($elTarget.is(':input') ? $elTarget.val() : $elTarget.html());
//                 $(this).html(value);
//             });
//             $newLayer.show().siblings().hide();
//         },
//         previous : function() {
//             if (this.vars.current < 2) {
//                 return;
//             }
//             this.vars.current--;
//             this.change();
//         },
//         next : function() {
//             if (this.vars.current >= this.vars.count) {
//                 return;
//             }
//             this.vars.current++;
//             this.change();
//         },
//         copyAddress : function() {
//             // this is just for the 2nd step.. the backend should evaluate the checkbox anyway
//             // todo: make it less hard coded
//             if ($('#chooseDifferentBilling').is(':checked')) {
//                 return;
//             }

//             $(':input[name^="salesOrder[shippingAddress]["]').each(function() {
//                 var currentPart = $(this).attr('name').split('[')[2].split(']')[0];
//                 $(':input[name="salesOrder[billingAddress][' + currentPart + ']"]').val($(this).val());
//             });
//         }
//     },
//     validation : {
//         apply : function($container) {
//             var result = this.check($container);
//             $container.find(':input[name]').removeClass('validationError');
//             this.getInvalidItems(result).addClass('validationError');
//             return result;
//         },
//         resultIsValid : function(result) {
//             var valid = true;
//             for (var i in result) {
//                 if (result[i].valid === false) {
//                     valid = false;
//                 }
//             }
//             return valid;
//         },
//         getInvalidItems : function(result) {
//             var names = [];
//             for (var i in result) {
//                 if (result[i].valid === false) {
//                     names.push(i);
//                 }
//             }
//             return $(names.map(function(item) { return '[name="' + item + '"]'; }).join(', '));
//         },
//         check : function($container) {
//             var result = {};
//             var formValues = {};
//             $.each($container.closest('form').serializeArray(), function() {
//                 formValues[this.name] = this.value;
//             });

//             $.each($container.find('[data-validator-precondition]'), function() {
//                 if(!new Function($(this).data('validatorPrecondition'))()) {
//                     $(this).attr('data-validator-prevent', true);
//                 } else {
//                     $(this).removeAttr('data-validator-prevent');
//                 }
//             });

//             $.each($container.find(':input[name]').not('[data-validator-prevent] :input'), function() {
//                 var currentName = $(this).attr('name');
//                 result[currentName] = { valid : true, check : 'none' }
//                 if ($(this).is(':required')) {
//                     result[currentName] = { valid : !!formValues[currentName], check : 'required' };
//                 }

//                 if (!result[currentName].valid) { return; }

//                 if ($(this).is('[type=email]')) {
//                     result[currentName] = { valid : /[A-Z0-9._%a-z\-\+]+?@(?:[A-Z0-9a-z\-]+\.)+?[A-Za-z]{2,4}/.test(formValues[currentName]), check : 'email' };
//                 }

//                 // implement more checks here if necessary
//             });

//             return result;
//         }
//     }
// };

// app.additionals.push('checkout');
