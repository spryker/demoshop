/*global
  define: false,
  console: false
*/
define([
  'backbone',
  'vent'
], function( Backbone, Vent ){
  'use strict';

  return Backbone.Model.extend({
    defaults : function(){
      return this.generateDefaults();
    },

    generateDefaults : function(){
      return {
        enabled : false,
        active  : false,
        // visible : false,

        done : false,
        skip : false,

        // if true, clicking the link "back" will go to review, not the normal route
        backToReview : false
      };
    },

    finish : function( action ){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cCheckoutStepModel%c➨%c finish : %c' + this.get( 'name' ),
        'background:#bada55;color:#fff;padding:0 2px;border-radius:3px',
        'color:#bada55',
        '',
        'color:plum'
      );
      //>>excludeEnd( 'consoleLogExclude' );

      this.set({
        // back_to_review : true,
        done           : true
      });

      if ( action ){
        action = action.replace( /.*#step\:/, '' ).replace( /^\s+|\s+$/g, '' );
      }

      this.trigger( 'done' );

      var skip = this.get( 'skip' );

      this.set({
        skip : false
      });

      Vent.trigger( 'step.finished', this, action, skip );

      return this;
    },

    enabled : function(){
      return this.get( 'enabled' );
    },

    active : function(){
      return this.get( 'active' );
    }
  });
});
