app.newsletter = {
    init : function() {
        var $subscriptionForm = $('form.subscription');
        $subscriptionForm.submit(function(e) {
            e.preventDefault();
            if (app.validation.resultIsValid(app.validation.apply($(this)))) {
                $.post($(this).attr('action'), $(this).serialize()).done(function(response) {
                    response = $.parseJSON(response);
                    if (response.level == 'success') {
                        $subscriptionForm.html('<div class="message ' + response.level + '">' + response.message + '</div>');
                    } else {
                        $subscriptionForm.prepend('<div class="message ' + response.level + '" style="margin-bottom:20px">' + response.message + '</div>');
                    }
                    $(window).resize();
                });
            }
        });
    }
};

app.additionals.push('newsletter');
