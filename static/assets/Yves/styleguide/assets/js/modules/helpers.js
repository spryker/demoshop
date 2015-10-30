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



export {getViewport, debounce, isIphone, isIpad};