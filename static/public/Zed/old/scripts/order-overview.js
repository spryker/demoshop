var triggerFlagChange = function (element, orderId, newState) {

  var data = {
    id: orderId
  };

  if (newState) {
    data['state'] = newState;
  }

  element.addClass('flag_loading');

  $.ajax("/sales/order/set-flag", {
    data    : data,
    dataType: 'json',
    type    : 'POST'
  })
    .done(function (data) {
      element.removeClass();
      element.addClass('flagicon');

      var newState = 'flag_grey';
      switch (data.newState) {
        case 1:
          newState = 'flag_green';
          break;
        case 0:
          newState = 'flag_red';
          break;
      }
      element.addClass(newState);
      changeRowColor(element)
    })
    .fail(function () {
      element.removeClass('flag_loading');
      alert("error");
    });

};

var changeRowColor = function (element) {
  var newRowColor = false;
  var tr = element.closest('tr');
  tr.removeClass();
  if (element.hasClass('flag_green')) {
    newRowColor = 'row_green';
  } else if (element.hasClass('flag_red')) {
    newRowColor = 'row_red';
  }

  if (newRowColor) {
    tr.addClass(newRowColor);
  }

};

$(document).ready(function () {
  $('table.grid .flagicon')
    .each(function () {
      changeRowColor($(this));
    })
    .on('click', function (ev) {
      var element = $(ev.target);
      var orderId = element.closest('tr').find('.id_sales_order a').text();
      triggerFlagChange(element, orderId);
      ev.preventDefault();
    });
});
