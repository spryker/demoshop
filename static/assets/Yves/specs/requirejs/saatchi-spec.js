/*global
  require: false,
  describe: false,
  it: false,
  expect: false,
  jasmine: false
*/
require([
  'saatchi/modules/common',
  'saatchi/modules/login'
], function( Common, Login ){
  'use strict';

  describe( 'Saatchi Common', function(){
    it( 'Should be an object', function(){
      expect( Common ).toEqual( jasmine.any( Object ));
    });

    describe( 'init', function(){
      it( 'Should contain init method', function(){
        expect( Login.init ).toEqual( jasmine.any( Function ));
      });
    });
  });

  describe( 'Saatchi Login', function(){
    it( 'Should be an object', function(){
      expect( Login ).toEqual( jasmine.any( Object ));
    });

    describe( 'init', function(){
      it( 'Should contain init method', function(){
        expect( Login.init ).toEqual( jasmine.any( Function ));
      });
    });
  });
});
