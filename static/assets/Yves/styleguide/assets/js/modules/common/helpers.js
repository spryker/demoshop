import $ from 'jquery';

'use strict';


// get current viewport dimensions (width, height)
function getViewport () {

  var viewPortWidth, viewPortHeight;

  // the more standards compliant browsers (mozilla/netscape/opera/IE7) use window.innerWidth and window.innerHeight
  if (typeof window.innerWidth !== 'undefined') {
    viewPortWidth = window.innerWidth;
    viewPortHeight = window.innerHeight;
  }

  // IE6 in standards compliant mode (i.e. with a valid doctype as the first line in the document)
  else if (typeof document.documentElement !== 'undefined' && typeof document.documentElement.clientWidth !==
    'undefined' && document.documentElement.clientWidth !== 0) {
    viewPortWidth = document.documentElement.clientWidth;
    viewPortHeight = document.documentElement.clientHeight;
  }

  // older versions of IE
  else {
    viewPortWidth = document.getElementsByTagName('body')[0].clientWidth;
    viewPortHeight = document.getElementsByTagName('body')[0].clientHeight;
  }

  // return dimension
  return [viewPortWidth, viewPortHeight];
}


// limit invocation rate of the given function to once per given interval
function debounce (interval, callback) {
  var debounceTimer;

  return function () {
    // check lock
    if (!debounceTimer) {

      // invoke at beginning of interval
      callback();

      debounceTimer = setTimeout(function () {

        // invoke at end of interval
        callback();

        // remove lock
        debounceTimer = null;
      }, interval);
    }
  };
}


// check user agent for iPod/iPhone device
function isIphone () {
  return (/iPhone|iPod/.test(navigator.userAgent) && !window.MSStream);
}


// check user agent for iPad
function isIpad () {
  return (/iPad/.test(navigator.userAgent) && !window.MSStream);
}


// convert formdata into object
function getFormData ($form) {
    var o = {};
    var a = $form.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
}


// scroll to target jQuery object
function scrollTo ($target, velocity, callback) {
    if (typeof velocity === 'undefined') {
        velocity = 1;
    }

    if (typeof callback !== 'function') {
        callback = function () {};
    }

    var $window, $navbarTop, $navbarBottom, $scrollable, current, target;

    $window = $(window);
    $scrollable = $('html, body');
    current = $window.scrollTop();
    target = $target.offset().top;

    $navbarTop = $('.navbar .navbar__top');
    $navbarBottom = $('.navbar .navbar__bottom');

    // TODO: header epsilon into shared variable
    $scrollable.animate({
        scrollTop: target - $navbarBottom.outerHeight() - (target > 50 ? $navbarTop.outerHeight() : 0)
    }, Math.abs(current - target) * velocity, callback);
}


// prefix provided rules (object)
function prefixCss (rules) {
    for (let key of Object.keys(rules)) {
        var value = rules[key];

        rules['-webkit-' + key] = value;
        rules['-moz-' + key] = value;
        rules['-ms-' + key] = value;
    }

    return rules;
}


// publications
export {getViewport, debounce, isIphone, isIpad, getFormData, scrollTo, prefixCss};
