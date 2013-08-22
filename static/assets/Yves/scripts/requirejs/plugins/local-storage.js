/*global
  define: false,
  window: false
*/
define( function(){
  'use strict';

  var supported = ( function(){
    try {
      return 'localStorage' in window && window.localStorage !== null;
    } catch (e) {
      return false;
    }
  })();

  var noop = function(){
    return false;
  };

  var ls = supported ? window.localStorage : {
    getItem    : noop,
    setTitem   : noop,
    removeItem : noop
  };

  return {
    set : function(){
      return ls.setItem.apply( ls, arguments );
    },
    get : function(){
      return ls.getItem.apply( ls, arguments );
    },
    del : function(){
      return ls.removeItem.apply( ls, arguments );
    }
  };
});
