/*global
  jQuery: false
*/
( function ( $, undefined ) {
  'use strict';

  $( 'body' ).on({
    click : function ( ev ) {
      ev.preventDefault();
      $( this ).tab( 'show' );
    }
  }, '.nav-tabs a' );

} )( jQuery );
