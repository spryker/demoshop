/*global require:false */
require.config({
  // development cache buster
  // urlArgs: 'nocache=' + ( new Date() ).getTime(),

  // setting up the dependencies
  shim   : {
    lodash: {
      exports: '_'
    },

    backbone: {
      exports: 'Backbone',
      deps   : [
        'lodash',
        'jquery'
      ]
    },

    vent: {
      exports: 'Backbone.Vent',
      deps   : [ 'backbone' ]
    },

    tracekit: {
      exports: 'TraceKit'
    },

    snitch: {
      deps: [
        'jquery',
        'tracekit'
      ]
    }
  },

  // setting the paths
  paths  : {
    plugins : 'plugins',

    jquery  : [
      // '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min',
      'vendor/jquery'
    ],
    lodash  : 'vendor/lodash',
    backbone: 'vendor/backbone',
    vent    : 'plugins/backbone.vent',

    tracekit: 'vendor/tracekit',
    snitch  : 'plugins/snitch'
  }
});

require([
  'jquery',
  'lodash',
  'backbone',

  'snitch',

  'checkout/routers/router',
  'checkout/models/checkout-model',
  'checkout/views/checkout-view'
], function( $, _, Backbone, Snitch, Router, CheckoutModel, CheckoutView ){
  'use strict';

  try {
    // app
    var app = new CheckoutView({
      model: new CheckoutModel()
    });

    app.router = new Router({
      app: app
    });

    // history
    Backbone.history.start();

  } catch (er) {
    Snitch.report(er);
  }
});
