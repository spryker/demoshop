/*global require:false */
require.config({
  /** development cache buster */
  urlArgs : 'nocache=' + ( new Date() ).getTime(),

  /** setting up the dependencies */
  shim : {
    lodash: {
      exports: '_'
    },

    jqueryui : {
      exports : '$',
      deps : [
        'jquery'
      ]
    },

    tracekit : {
      exports : 'TraceKit'
    },

    snitch : {
      deps : [
        'jquery',
        'tracekit'
      ]
    }
  },

  /** setting the paths */
  paths: {
    jquery   : 'vendor/jquery',
    jqueryui : 'vendor/jquery-ui',
    lodash   : 'vendor/lodash',

    tracekit : 'vendor/tracekit',
    snitch   : 'plugins/snitch'
  }
});

require([
  'jquery',
  'lodash',

  'snitch',

  'saatchi/modules/common',
  'saatchi/modules/cart',
  'saatchi/modules/login',
  'saatchi/modules/availability'
], function( $, _, Snitch, Common, Cart, Login, Availability ){
  'use strict';

  try {
    var $script = $( 'script[data-main][data-controller]' );

    Common.init();

    var Controller = {
      availability : Availability,
      cart         : Cart,
      login        : Login
    };

    if ( $script.length ){
      _.each( $script.data( 'controller' ).split( ',' ), function ( controller ) {
        Controller[ controller ].init();
      });
    }


  } catch ( er ){
    // debugger;
    Snitch.report( er );
  }
});
