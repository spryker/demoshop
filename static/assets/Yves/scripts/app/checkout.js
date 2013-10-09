app.checkout = {
    init : function() {
      this.smartAddress.init();
      $('.triggerAlternative').change(function() {
          if ($(this).is(':checked')) {
              $('.address.secondaryRow').show();
          } else {
              $('.address.secondaryRow').hide();
          }
      });
    },
    smartAddress : {
        vars : {
            required : ['gender', 'full_name', 'full_address'],
            addressField : 'full_address',
            nameField : 'full_name',
            genderField : 'gender',
            relevantGValues : ['street_number', 'route', 'locality', 'postal_code', 'country'],
            scopes : ['shipping', 'billing']
        },
        init : function() {
            $('.smartAddressTrigger').change(this.apply.bind(this));
            $('.addressResult button').click(function(e) {
                e.preventDefault();
                // todo: distuingish between OK and edit
                $(this).parent().hide();
            });
        },
        apply : function() {
            var fields = $('.smartAddressForm').serializeArray();
            var required = this.vars.required;

            $.each(fields, function(key, object) {
                required = required.filter(function(item) {
                    return item !== object.name || object.value === '';
                });
            });

            if (required.length) {
                return;
            }

            this.triggerSearch(fields);
        },
        triggerSearch : function(fields) {
            var address = this.getField(this.vars.addressField, fields);
            $.getJSON('http://maps.googleapis.com/maps/api/geocode/json', { address : address, sensor : false }, function(response) {
                if (!response || response.status !== 'OK' || !response.results || !response.results[0]) {
                    // fallback
                    return;
                }

                var relevantValues = {};
                $.each(response.results[0].address_components, function(key, addressComponent) {
                    $.each(addressComponent.types, function(key, type) {
                        if ($.inArray(type, this.vars.relevantGValues) !== -1) {
                            relevantValues[type] = addressComponent;
                        }
                    }.bind(this))
                }.bind(this));

                var fullName = this.getField(this.vars.nameField, fields);
                var nameParts = fullName.split(' ');
                relevantValues.last_name = nameParts.pop();
                if (!nameParts.length) {
                    // fallback
                    return;
                }

                relevantValues.first_name = nameParts.shift();
                relevantValues.middle_name = nameParts.join(' ');
                relevantValues.gender = this.getField(this.vars.genderField, fields);

                this.showResult(relevantValues);
            }.bind(this));
        },
        getField : function(fieldName, fields) {
            for (var i in fields) {
                if (fields[i].name === fieldName) {
                    return fields[i].value;
                }
            }
            return '';
        },
        showResult : function(relevantValues) {
            var $resultDiv = $('.addressResult');
            $resultDiv.find(':input').val('');
            $.each(relevantValues, function(key, value) {
                var $target = $('[data-src="' + key + '"]');

                if (value.long_name) {
                    value = $target.data('src-type') ? value[$target.data('src-type') + '_name'] : value.long_name;
                }

                if (!$target.length) { return; }

                if ($target.is(':input')) {
                    $target.val(value);
                } else {
                    $target.text(value);
                }
            });

            $resultDiv.find('input.name').each(function() {
                $(this).prev().html($(this).val());
            });

            $resultDiv.show();
        }
    }
}

app.additionals.push('checkout');