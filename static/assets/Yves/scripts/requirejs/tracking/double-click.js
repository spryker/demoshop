/*global
  define: false,
  window: false
*/
define( function(){
  'use strict';

  var w = window;
  w._gaq = w._gaq || [];

  return {
    event : function ( category, action, optLabel, optValue, optNonineraction ) {
      var ar = [ '_trackEvent', category, action ];

      if ( optLabel !== undefined ) {
        ar.push( optLabel );

        if ( optValue !== undefined ) {
          ar.push( optValue );

          if ( optNonineraction !== undefined ) {
            ar.push( optNonineraction );
          }
        }
      }

      w._gaq.push( ar );
    }
  };
});
