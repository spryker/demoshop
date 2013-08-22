/*global
  define: false,
  console: false
*/
define([
  'jquery',
  'backbone',
  'lodash'
], function( $, Backbone, _ ){
  'use strict';

  return Backbone.View.extend({
    tagName   : 'li',
    className : 'checkout-step',

    defaultAction : '#step:review',

    getTemplate : function(){
      if ( !this.template ) {
        this.template = _.template( $( '#' + this.templateID ).html());
      }
      return this.template;
    },

    resetRouting : function(){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cCheckoutStepView%c➨%c resetBackLink : %c' + this.model.get( 'name' ),
        'background:#369;color:#fff;padding:0 2px;border-radius:3px',
        'color:#369',
        '',
        'color:plum'
      );
      //>>excludeEnd( 'consoleLogExclude' );

      this.model.set({
        backToReview : false
      });
    },

    adjustRouting : function(){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cCheckoutStepView%c➨%c adjustLinkBack : %c' + this.model.get( 'name' ),
        'background:#369;color:#fff;padding:0 2px;border-radius:3px',
        'color:#369',
        '',
        'color:plum'
      );
      //>>excludeEnd( 'consoleLogExclude' );

      var backToReview = this.model.get( 'backToReview' );

      this.$el.find( '[data-routing]' ).each( function(){
        var $this   = $( this );
        var routing = $this.data( 'routing' );

        // no data === no changes
        if ( ! routing ){
          return true;
        }

        // if we want it to get back to review
        if ( backToReview ){
          if ( routing.review.label ){
            $this.text( routing.review.label );
          }

          if ( routing.review.href ){
            $this.attr({
              'href' : routing.review.href
            });
          }

          if ( routing.review.action ){
            $this.attr({
              'action' : routing.review.action
            });
          }
        } else {
          if ( routing.initial.label ){
            $this.text( routing.initial.label );
          }

          if ( routing.initial.href ){
            $this.attr({
              'href' : routing.initial.href
            });
          }

          if ( routing.initial.action ){
            $this.attr({
              'action' : routing.initial.action
            });
          }
        }
      });
    },

    checkoutStepRender : function( opts ){

      // we skip this step
      if ( this.model.get( 'skip' )){
        //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
        console.log( '%cCheckoutStepView%c➨%c checkoutStepRender %cskipping%c : %c' + this.model.get( 'name' ),
          'background:#369;color:#fff;padding:0 2px;border-radius:3px',
          'color:#369',
          '',
          'background:red;color:#fff;padding:0 2px;border-radius:3px',
          '',
          'color:plum'
        );
        //>>excludeEnd( 'consoleLogExclude' );

        // this.model.set({
        //   skip : false
        // }).finish( this.defaultAction );

        this.model.finish( this.defaultAction );

        return this;
      }

      this.$el.toggleClass( 'active', this.model.active());

      // skip all the rendering if the model is not enabled
      if ( ! this.model.enabled() || ! this.model.active()){
        //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
        console.log( '%cCheckoutStepView%c➨%c checkoutStepRender %cdry run%c : %c' + this.model.get( 'name' ),
          'background:#369;color:#fff;padding:0 2px;border-radius:3px',
          'color:#369',
          '',
          'background:#ccc;color:#fff;padding:0 2px;border-radius:3px',
          '',
          'color:plum'
        );
        //>>excludeEnd( 'consoleLogExclude' );

        return this;
      }

      // render HTML if there's none OR if we force it
      if ( ! this.$el.children().length || ( opts && opts.force )){
        //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
        console.log( '%cCheckoutStepView%c➨%c checkoutStepRender %cHTML rendering%c : %c' + this.model.get( 'name' ),
          'background:#369;color:#fff;padding:0 2px;border-radius:3px',
          'color:#369',
          '',
          'background:#ccc;color:#fff;padding:0 2px;border-radius:3px',
          '',
          'color:plum'
        );

        console.log( this.model.attributes );
        //>>excludeEnd( 'consoleLogExclude' );

        // render HTML
        this.$el.html( this.getTemplate().call( this, this.model.attributes ));

        // adjust the link back - we re-rendered the whole thing...
        this.adjustRouting();
      } else {
        //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
        console.log( '%cCheckoutStepView%c➨%c checkoutStepRender %crepeated run%c : %c' + this.model.get( 'name' ),
          'background:#369;color:#fff;padding:0 2px;border-radius:3px',
          'color:#369',
          '',
          'background:#ccc;color:#fff;padding:0 2px;border-radius:3px',
          '',
          'color:plum'
        );
        //>>excludeEnd( 'consoleLogExclude' );
      }

      this.postRender();

      return this;
    },

    render : function( opts ){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cCheckoutStepView%c➨%c render : %c' + this.model.get( 'name' ),
        'background:#369;color:#fff;padding:0 2px;border-radius:3px',
        'color:#369',
        '',
        'color:plum'
      );
      //>>excludeEnd( 'consoleLogExclude' );

      return this.checkoutStepRender( opts );
    },

    postRender : function(){

    }
  });
});
