/*global
  define: false,
  console: false,
  window: false,
  document: false
*/
define([
  'jquery',
  'backbone',
  'lodash',
  'vent',

  'checkout/views/address-shipping-view',
  'checkout/views/address-billing-view',
  'checkout/views/payment-view',
  'checkout/views/review-view',

  'plugins/jquery.form-validate',
  'plugins/jquery.form-object'
], function(
  $,
  Backbone,
  _,
  Vent,

  AddressShippingView,
  AddressBillingView,
  PaymentView,
  ReviewView
){
  'use strict';

  var viewFactories = {
    'shipping-address' : AddressShippingView,
    'billing-address'  : AddressBillingView,
    'payment'          : PaymentView,
    'review'           : ReviewView
  };

  return Backbone.View.extend({
    el : '#checkout-app',

    initialize : function(){
      var appView  = this;
      var appModel = this.model;
      var steps    = appModel.get( 'steps' );

      // views generator
      var view;
      var ViewFactory;

      // event listeners
      appModel.on( 'change:state', this.render, this );

      // navigate to another step, when vent catches "step.finished" event
      Vent.on({
        'step.finished' : function( step, action, stepWasSkipped ){
          //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
          console.log( '%cVent%c➨%c step.finished %c' + step.get( 'name' ) + ',' + action,
            'background:#963;color:#fff;padding:0 2px;border-radius:3px',
            'color:#963',
            '',
            'color:plum'
          );
          //>>excludeEnd( 'consoleLogExclude' );

          switch ( step.get( 'name' )){
          case 'shipping-address':
          case 'billing-address':
          case 'payment':
            step.set({
              active : false
            });
            appView._gotoStep( action, stepWasSkipped );
            break;
          case 'review':
            appView._submitFinalForm( step );
            break;
          default:
            //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
            console.warn( 'something went wrong when trying to proceed from "' + step.get( 'name' ) + '"' );
            //>>excludeEnd( 'consoleLogExclude' );
          }
        },

        'step.routeAdjust' : function( step ){
          //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
          console.log( '%cVent%c➨%c step.routeAdjust %c' + step,
            'background:#963;color:#fff;padding:0 2px;border-radius:3px',
            'color:#963',
            '',
            'color:plum'
          );
          //>>excludeEnd( 'consoleLogExclude' );

          var steps = appModel.get( 'steps' );

          if ( steps && steps.hasOwnProperty( step )){
            steps[ step ].set({
              backToReview : true
            });
          }
        },

        'cartTotalsUpdate' : function (totalsObj) {
          //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
          console.log('%cVent%c➨%c cartTotalsUpdate %c' + JSON.stringify(totalsObj),
            'background:#963;color:#fff;padding:0 2px;border-radius:3px',
            'color:#963',
            '',
            'color:plum'
          );
          //>>excludeEnd( 'consoleLogExclude' );

          appModel.setCartTotals(totalsObj);
        },

        'manualCheckout' : function( isManual ){
          //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
          console.log( '%cVent%c➨%c manualCheckout %c' + isManual,
            'background:#963;color:#fff;padding:0 2px;border-radius:3px',
            'color:#963',
            '',
            'color:plum'
          );
          //>>excludeEnd( 'consoleLogExclude' );

          steps.payment
            .set({
              skip : !! isManual
            });

          steps.review
            // .blockIfNeeded( steps.payment.blockIfNeeded())
            .set({
              manual : !! isManual
            });
        }
      });

      // progressBar
      var $progressBar = $( '#checkout-progressbar' );
      this.$progressBarList = $progressBar.find( 'ol' ).first();

      // replace the noscript
      var $newEl = $( $.trim( _.template( $( '#checkout-app-template' ).html()).call()));

      // render the initial list for checkout
      this.$el.replaceWith( $newEl );
      this.setElement( $newEl );

      // render steps
      _.each( steps, function( stepModel, step ){
        ViewFactory = viewFactories[ step ];
        view = new ViewFactory({
          model : stepModel
        });

        $newEl.append( view.render().el );
      });

      this.render();

      this.$el.on({
        'click' : function( ev ){
          Vent.trigger( 'step.routeAdjust', $( ev.target ).data( 'route-back-to-review' ));
        }
      }, '[data-route-back-to-review]' ).on({
        'click' : function(  ){
          // removed because it fucks up the redirect if the user logs in during in the step from cart to checkout
          // ev.preventDefault();
          // window.history.back();
        }
      }, 'a.link-back' );
    },

    // render
    render : function(){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cCheckoutView%c➨%c render',
        'background:#69c;color:#fff;padding:0 2px;border-radius:3px',
        'color:#69c',
        ''
      );
      //>>excludeEnd( 'consoleLogExclude' );

      this._setProgressBarClasses();
    },

    // enable and show step
    _gotoStep : function( step, replace ){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cCheckoutView%c➨%c _gotoStep : %c' + step + ', ' + replace,
        'background:#69c;color:#fff;padding:0 2px;border-radius:3px',
        'color:#69c',
        '',
        'color:plum'
      );
      //>>excludeEnd( 'consoleLogExclude' );

      var isEnabled = this.model.isEnabledStep( step );

      if ( ! isEnabled ){
        // enable the step
        this.model.enableStep( step );

        var $trackForm = $( '#checkout-track-form' );
        var formData   = $trackForm.formObject()[ $trackForm.attr( 'id' )];

        $.ajax({
          url    : $trackForm.attr( 'action' ),
          method : $trackForm.attr( 'method' ) || 'post',
          data   : _.extend( formData, {
            'step' : step
          })
        });
      }

      // navigate to that step via URL-change
      this.router.navigate( 'step:' + step, {
        trigger : true,
        replace : replace
      });
    },

    // fill the final form and submit it
    _submitFinalForm : function( step ){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cCheckoutView%c➨%c _submitFinalForm :',
        'background:#69c;color:#fff;padding:0 2px;border-radius:3px',
        'color:#69c',
        '',
        step
      );
      //>>excludeEnd( 'consoleLogExclude' );

      var $form = $( '#checkout-form' );

      var data = {
        shippingAddress : step.get( 'shippingAddress' ),
        billingAddress  : step.get( 'billingAddress' ),
        payment         : step.get( 'payment' )
      };

      // get all the fields that have mapping assigned
      // and get the data from user input
      $form.find( 'input[name][data-mapping]' ).each( function(){

        var $this   = $( this );
        var mapping = $this.data( 'mapping' ).split( '.' );

        // if mapping was foo.bar
        // the value will be data[ foo ][ bar ]
        $this.val( data[ mapping[ 0 ] ][ mapping[ 1 ]]);
      });

      var appView = this;
      var timeout = 30 * 1000;

      var cookieTimeout = document.cookie.match( /timeout=(\d+)/ );

      if ( cookieTimeout && cookieTimeout[ 1 ] ) {
        timeout = cookieTimeout[ 1 ];
      }

      $.ajax({
        url     : $form.attr( 'action' ),
        data    : $form.serialize(),
        method  : 'POST',
        timeout : timeout
      }).done( function ( dataObject ) {
        if ( ! $.isPlainObject( dataObject ) ){
          //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
          console.warn( 'invalid response' );
          //>>excludeEnd( 'consoleLogExclude' );
          return false;
        }

        if ( dataObject.result !== 'success' ){
          //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
          console.warn( 'got non-success', dataObject );
          //>>excludeEnd( 'consoleLogExclude' );
        }

        if ( !dataObject.data ){
          //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
          console.warn( 'dataObject.data not an object...', dataObject );
          //>>excludeEnd( 'consoleLogExclude' );

          Vent.trigger( 'submitOrderAjax.done' );
          return false;
        }

        appView
          .renderValidationErrors( dataObject.data.validationErrors )
          .renderMessages( dataObject.data.messages );

        if ( dataObject.data.url ){
          window.location = dataObject.data.url;

          if ( /^#/.test( dataObject.data.url ) ){
            Vent.trigger( 'submitOrderAjax.done' );
            appView.$el
              .off( 'change.custom' )
              .one( 'change.custom', ':input', function(){
                appView.$messages.remove();
                appView.$messages = null;
              });
          }
        } else {
          Vent.trigger( 'submitOrderAjax.done' );
        }
      }).fail( function ( xhr, status, error ) {
        //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
        console.warn( xhr, status, error );
        //>>excludeEnd( 'consoleLogExclude' );

        if ( /timeout/i.test( status )){
          appView.renderMessages({
            error : [ $form.data( 'timeout-error-message' )]
          });

          throw {
            name    : 'Timeout Error',
            message : 'Checkout timeout reached'
          };
        }

        Vent.trigger( 'submitOrderAjax.done' );
      });
    },

    renderMessages : function( messages ){
      if ( this.$messages ){
        this.$messages.remove();
        this.$messages = null;
      }

      if ( ! messages ){
        return this;
      }

      var messagesHTML = $.trim( _.template( $( '#messages-template' ).html()).call( this, {
        messages : messages
      }));

      this.$messages = $( messagesHTML );
      this.$el.before( this.$messages );

      return this;
    },

    renderValidationErrors : function( errors ){
      if ( this.$errors ){
        this.$errors.remove();
        this.$errors = null;
      }

      if ( ! errors ){
        return this;
      }

      var errorsArray = [];

      _.each( errors, function( fields, form ){
        _.each( fields, function( message, field ){
          errorsArray.push({
            label : message,
            href  : '#' + form + '[' + field + ']'
          });
        });
      });

      var errorsHTML = $.trim( _.template( $( '#messages-template' ).html()).call( this, {
        messages : {
          error : errorsArray
        }
      }));

      this.$errors = $( errorsHTML );

      var appView = this;

      this.$errors.on({
        click : function( ev ){
          ev.preventDefault();

          var $form       = $( '#checkout-form' );
          var $target     = $( ev.target );
          var inputName   = $target.attr( 'href' ).replace( /.*#/, '' );
          var $input      = $form.find( '[name="' + inputName + '"]' );
          var mappedInput = $input.data( 'mapping' );

          var relatedFormPointers = mappedInput.split( '.' );

          appView._gotoStep( relatedFormPointers[ 0 ].replace( /([A-Z])/g, '-$1' ).toLowerCase() );

          var $relatedInput = appView.$el.find( '[name="' + relatedFormPointers[ 1 ] + '"]' );
          var $relatedForm  = $relatedInput.closest( 'form' );

          $relatedInput.addErrorLabel( $relatedForm, null, '', true );

          $target.parent().remove();

          if ( !appView.$errors.children().length ){
            appView.$errors.remove();
            appView.$errors = null;
          }
        }
      },'a[data-link-to-step]' );

      this.$el.before( this.$errors );

      return this;
    },

    // set classes for the "progressbar" AKA "breadcrumbs"
    _setProgressBarClasses : function(){
      //>>excludeStart( 'consoleLogExclude', pragmas.consoleLogExclude );
      console.log( '%cCheckoutView%c➨%c _setProgressBarClasses',
        'background:#69c;color:#fff;padding:0 2px;border-radius:3px',
        'color:#69c',
        ''
      );
      //>>excludeEnd( 'consoleLogExclude' );

      var model = this.model;
      var steps = model.get( 'steps' );
      var state = model.get( 'state' );

      var $list      = this.$progressBarList;
      var $listSteps = $list.children( '.visible' ).removeClass( 'active enabled' );

      var $first = $listSteps.first();
      var $last  = $listSteps.last();

      var $headerSegment;

      // classes for list items
      _.each( steps, function( stepModel, stepName ){

        $headerSegment = $list.find( '.step-' + stepName );

        // if it active, skip it
        if ( $headerSegment.hasClass( 'active' )){
          // null
          return true;
        }

        // get the main checkout step indicator, the step is not yet active
        // ... it will be, but right after this
        if ( stepModel.get( 'name' ) === state ){
          $headerSegment
            .removeClass( 'disabled enabled' )
            .addClass( 'active' );
        } else if ( stepModel.enabled()){
          $headerSegment
            .removeClass( 'disabled' )
            .addClass( 'enabled' );
        }
      });

      // classes for list
      $list
        .toggleClass( 'has-first-active',  $first.hasClass( 'active' ))
        .toggleClass( 'has-first-enabled', $first.hasClass( 'enabled' ))
        .toggleClass( 'has-last-active',  $last.hasClass( 'active' ))
        .toggleClass( 'has-last-enabled', $last.hasClass( 'enabled' ));
    }
  });
});
