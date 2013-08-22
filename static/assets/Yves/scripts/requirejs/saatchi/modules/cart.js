/*global define: false */
define([
  'jquery',

  'plugins/jquery.form-validate',
  'plugins/jquery.form-object'
], function ( $ ) {
  'use strict';

  return {
    init : function () {
      $( 'body' ).on({
        change : function ( ev ) {
          ev.currentTarget.submit();
        }
      }, '.qty-form' );
    }
  };
});
