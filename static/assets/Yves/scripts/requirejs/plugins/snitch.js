/*global
  define: false,
  window: false
*/
define([
  'jquery',
  'tracekit'
], function( $, TraceKit ){
  'use strict';

  var que = [];
  var timeout;

  TraceKit.report.subscribe( function logger( report ){

    que.push( report );

    if ( timeout ){
      window.clearTimeout( timeout );
    }

    timeout = window.setTimeout( function(){
      $.ajax({
        url         : '/monitoring/logging',
        method      : 'post',
        contentType : 'application/json',
        data        : JSON.stringify( que )
      });

      que = [];
    }, 150 );
  });

  // TraceKit - by defaul - will attempt to fetch an analyze source files
  TraceKit.remoteFetching = false;

  return {
    report   : function( er ){
      return TraceKit.report( er );
    },
    TraceKit : TraceKit.noConflict()
  };
});
