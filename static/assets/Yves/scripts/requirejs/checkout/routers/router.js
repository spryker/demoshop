/*global
  define: false,
  console: false
*/
define([
  'backbone',
  'vent'
],
function( Backbone, Vent ){
  'use strict';

  return Backbone.Router.extend({

    initialize : function( options ){
      if ( options && options.app ) {
        this.app   = options.app;
        this.model = options.app.model;
      }

      Vent.on( 'step.back', Backbone.history.history.back );
    },

    routes: {
      '(step:step)': 'step'
    },

    step: function( step ){
      // if there's no step defined - define one :D
      if ( ! step ){
        this.navigate( 'step:' + ( this.model.get( 'state' ) || 'shipping-address' ), {
          trigger : true,
          replace : true
        });
        return true;
      }

      // get current step
      step = ( step || this.model.get( 'state' ) || 'shipping-address' ).replace( /^:/, '' );

      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cRouter%c➨%c step : %c' + step,
        'background:#c00;color:#fff;padding:0 2px;border-radius:3px',
        'color:#c00',
        '',
        'color:plum'
      );
      //>>excludeEnd( 'consoleLogExclude' );

      // set the step
      if ( ! this.model.setState( step )) {

        // if there's no step - fall back to the default one
        this.navigate( 'step:' + this.model.get( 'state' ), {
          trigger : true,
          replace : true
        });
      }
    }
  });
});
