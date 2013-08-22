/*global
  define: false,
  window: false
*/
define( function(){
  'use strict';

  return {
    // event : function(){
    event : function( ev, id, data ){
      // debugger;
      var tcEvent = window[ ev ];

      if ( tcEvent && typeof tcEvent === 'function' ){
        return tcEvent.call( tcEvent, window, id, data );
      }

      return false;
    }
  };
});
