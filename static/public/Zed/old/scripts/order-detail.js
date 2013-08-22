function arrayIntersect(arr1, arr2) {
  var r = [], o = {}, l = arr2.length, i, v;
  for (i = 0; i < l; i++) {
    o[arr2[i]] = true;
  }
  l = arr1.length;
  for (i = 0; i < l; i++) {
    v = arr1[i];
    if (v in o) {
      r.push(v);
    }
  }
  return r;
}

function getEventIntersection(itemIds) {
  var intersectedEvents = [];
  $.each(itemIds, function (index, itemId) {
    var possibleItemEvents = getPossibleEventsForItem(itemId);
    if (index == 0) {
      intersectedEvents = possibleItemEvents;
    } else {
      intersectedEvents = arrayIntersect(intersectedEvents, possibleItemEvents);
    }
  });
  return intersectedEvents;
}

function toggleEventButtons(possibleEvents) {
  $(".group-submit").each(function (index, element) {
    var submitEventName = $(element).attr("value");
    if ($.inArray(submitEventName, possibleEvents) == -1) {
      $(element).hide();
    } else {
      $(element).show();
    }
  });
}

function onGroupSelectorClick() {
  var ids = getSelectedGroupSelectorIds();
  var intersectedEvents = getEventIntersection(ids);
  toggleEventButtons(intersectedEvents);
}

function getPossibleEventsForItem(itemId) {
  return eventsByItemStorage[itemId];
}

function getSelectedGroupSelectorIds() {
  var ids = [];
  $(".event-group-selector:checked").each(function (index, element) {
    ids[index] = $(element).attr('id');
  });
  return ids;
}
$(document).ready(function () {
  $(".event-group-selector").change(onGroupSelectorClick);

  $('.item-history-table').on('click', '.current-status', function (e) {
    $(this).closest('.item-history-table').find('.collapseable, .collapseable-inverse').toggle();
    e.preventDefault();
  });
  $('.item-info-table').on('click', '.show-artist-info', function (e) {
    $(this).parent().find('.collapseable').toggle();
    e.preventDefault();
  });

});
