app.customer = {
    init : function() {
        var activeTab = app.settings.get('customerActiveAuthTab');
        if (activeTab) {
            $('.tab[data-target="content-' + activeTab + '"]').addClass('active')
                .parent().siblings().children('.tab').removeClass('active');
        }

        $('#' + $('.tab.active').data('target')).show();

        $('.tab').click(function() {
            app.settings.set('customerActiveAuthTab', $(this).data('target').replace('content-', ''));
            $(this).addClass('active').parent().siblings().children('.tab').removeClass('active');
            $('#' + $(this).data('target')).show().siblings('.content').hide();
            $('.requestPassword').hide();
        });

        this.bindFormEvents($('form'));

        $('form :input').change(function() {
            $(this).next('.tooltip').remove();
            app.validation.apply($(this).parent(), true);
        });

        $('input#subscription_status').change(function() {
            app.customer.toggleNewsletterSubscription();
        });

        this.address.adjustDefaultAddresses();
    },
    toggleNewsletterSubscription : function() {
        $('.subscription').find('button').toggle();
    },
    showPwReset : function() {
        var $forgotPasswordEmail = $('#customerForgotPassword_email');
        if (!$forgotPasswordEmail.val()) {
            $forgotPasswordEmail.val($('#customerLogin_email').val());
        }
        var $requestPassword = $('.requestPassword');
        $requestPassword.show();
        $('html').animate({scrollTop : parseInt($requestPassword.position().top)}, 500);
    },
    toggleActiveForm : function(targetId) {
        $('#' + targetId).animate({ height : 'toggle', opacity : 'toggle' }, 'slow');
    },
    bindFormEvents : function($el) {
        $el.submit(function(e) {
            var $form = $(this);
            if ($.inArray($form.attr('name'), ['changeMail', 'changePassword']) < 0) {
                if (!app.validation.resultIsValid(app.validation.apply($(this)))) {
                    e.preventDefault();
                }
            } else {
                e.preventDefault();
                if (app.validation.resultIsValid(app.validation.apply($form))) {
                    console.log('submit');
                    $.ajax({
                        url: $form.attr('action'),
                        type: 'POST',
                        data: $form.serialize() ,
                        success: function(response) {
                            var errors = $(response).find('.form-errors');
                            var alert = $(response).find('.alert-error');
                            var success = $(response).find('.alert-success');
                            if (errors.length) {
                                $form.before(errors);
                            } else if (alert.length) {
                                $form.before(alert);
                            } else if (success.length) {
                                $('#customer').html($(response).filter('#customer'));
                            } else {
                                location.reload();
                            }
                        }
                    });
                }
            }
        });
        return $el;
    },
    toggle : function($el) {
        var oldLabel = $el.html();
        $el.html($el.data('toggle'));
        $el.data('toggle', oldLabel);
        $el.closest('.actions').siblings('.details').animate({ height : 'toggle', opacity : 'toggle' }, 'slow');
    },
    printOrder : function(el) {
        $(el).closest('.order').removeClass('hideonprint').siblings('.order').addClass('hideonprint');
        window.print();
    },
    getOrderDetails : function(id) {
        var $details = $('#details-' + id);
        $details.find('#error-loading').hide();
        if ($details.hasClass('loaded')) {
            $details.animate({ height : 'toggle', opacity : 'toggle' }, 'slow');
        } else {
//        $.ajax({
//            url: '/redirection',
//            type: 'POST'
//        });
            $('#loading-' + id).show();
            $.ajax({
                url: '/customer/order-details',
                type: 'POST',
                data: { order: id },
                success: function(response) {
                    var $orderDetails = $(response);
                    if ($orderDetails.find('.customerLogin').length > 0) {
                        window.location.href = '/login';
                    } else {
                        $('#loading-' + id).hide();
                        app.customer.toggle($orderDetails.next('.actions').find('.load-details'));
                        $orderDetails.next('.actions').find('.print').toggle();
                        $details.replaceWith($orderDetails);
                        $orderDetails.addClass('loaded').animate({ height : 'toggle', opacity : 'toggle' }, 'slow');
                    }
                },
                error: function() {
                    $('#loading-' + id).hide();
                    $details.find('#error-loading').show();
                }
            })
        }
    },
    address : {
        items : {},
        $getTemplate : function() {
            return app.customer.bindFormEvents($('.address.editor.template form').clone());
        },
        add : function() {
            var $caption = $('.address.editor.target').show().children('h3');
            $caption.text($caption.data('add')).next('.content').html(this.$getTemplate());
            app.ensureVisibility($caption);
        },
        change : function(id, isDefault) {
            var $actions = $('#actions-' + id);
            var $editor = $('.address.editor.target');
            isDefault = typeof isDefault !== 'undefined' ? isDefault : false;
            var $defaultAddressCheckbox = $('.is-default-address');
            if (isDefault === true) {
                $defaultAddressCheckbox.hide();
            } else {
                $defaultAddressCheckbox.show();
            }
            $actions.hide();
            $actions.after($editor);
            $editor.show();
            var $caption = $editor.children('h3');
            $caption.text($caption.data('change')).next('.content').html(this.$fillForm(id));
            $caption.next('.content').find('.cancel-edit').data('id', id);
            app.ensureVisibility($caption);
        },
        cancelEdit : function() {
            var $editor = $('.address.editor.target');
            var id = $editor.children('.content').find('.cancel-edit').data('id');
            $editor.hide();
            $('#actions-' + id).show();
            app.ensureVisibility($('h2.caption'));
        },
        deleteConfirmation : function(id) {
            $('#actions-' + id).hide();
            $('#delete-confirmation-' + id).show();
        },
        cancelDelete : function (id) {
            $('#delete-confirmation-' + id).hide();
            $('#actions-' + id).show();
        },
        $fillForm : function(id) {
            var $form = this.$getTemplate();
            var items = this.items;
            var result = Object.keys(items).map(function(item) {
                return items[item];
            }).filter(function(item) {
                return item.id_customer_address && item.id_customer_address === id;
            });
            if (!result.length) { return $form; }
            $.each(result[0], function(name, value) {
                var $target = $form.find('[data-src="' + name + '"]');
                $target.val(value);
            });
            return $form;
        },
        adjustDefaultAddresses : function() {
            var $defaultShipping = $('.default-shipping');
            var $defaultBilling = $('.default-billing');
            $defaultBilling.add($defaultShipping).height(Math.max($defaultBilling.height(), $defaultShipping.height()));
        }
    }
};

app.additionals.push('customer');
