/*global
 module: false,
 require: false
 */
module.exports = function ( grunt ) {
  'use strict';

  grunt.file.setBase('../../');

  function packageDestRename( dest, src ) {
    return dest + src.replace( /([\\\/]?([\w-_]+[\\\/])*([\w-_]+)[\\\/]static[\\\/]public)/i, '$3' );
  }

  grunt.initConfig({
    dirs : {
      config   : 'config/Zed',
      packages : 'vendor/project-a',
      project  : 'src',
      srcY     : '**/{Shared,Yves}/*/Static/Public/**/*',
      srcZ     : '**/{Shared,Zed}/*/Static/Public/**/*',
      distY    : 'static/public/Yves/bundles',
      distZ    : 'static/public/Zed/bundles'
    },

    clean : {
      /* https://npmjs.org/package/grunt-contrib-clean */

      packagesYves : '<%= dirs.distY %>',
      packagesZed : '<%= dirs.distZ %>'
    },

    copy : {
      packagesYves : {
        expand : true,
        cwd    : '<%= dirs.packages %>/',
        src    : '<%= dirs.srcY %>',
        dest   : '<%= dirs.distY %>/',
        rename : packageDestRename
      },

      packagesZed : {
        expand : true,
        cwd    : '<%= dirs.packages %>/',
        src    : '<%= dirs.srcZ %>',
        dest   : '<%= dirs.distZ %>/',
        rename : packageDestRename
      },

      projectPackagesYves : {
        expand : true,
        cwd    : '<%= dirs.project %>/',
        src    : '<%= dirs.srcY %>',
        dest   : '<%= dirs.distY %>/',
        rename : packageDestRename
      },

      projectPackagesZed : {
        expand : true,
        cwd    : '<%= dirs.project %>/',
        src    : '<%= dirs.srcZ %>',
        dest   : '<%= dirs.distZ %>/',
        rename : packageDestRename
      }
    },

    watch : {
      /* https://npmjs.org/package/grunt-contrib-watch */

      packagesYves : {
        files : '<%= dirs.packages %>/<%= dirs.srcY %>',

        tasks : [
          'copy:packagesYves'
        ],

        options : {
          spawn : false
        }
      },

      packagesZed : {
        files : '<%= dirs.packages %>/<%= dirs.srcZ %>',

        tasks : [
          'copy:packagesZed'
        ],

        options : {
          spawn : false
        }
      },

      projectPackagesYves : {
        files : '<%= dirs.project %>/<%= dirs.srcY %>',

        tasks : [
          'copy:projectPackagesYves'
        ],

        options : {
          spawn : false
        }
      },

      projectPackagesZed : {
        files : '<%= dirs.project %>/<%= dirs.srcZ %>',

        tasks : [
          'copy:projectPackagesZed'
        ],

        options : {
          spawn : false
        }
      }
    }
  });

  require( 'matchdep' )
    .filterAll( 'grunt-*', require( '../../package.json' ) )
      .forEach( grunt.loadNpmTasks );

  grunt.registerTask( 'dev', [
    'clean',
    'copy'
  ]);

  grunt.registerTask( 'watcher', [
    'watcher'
  ]);

  grunt.registerTask( 'dist', [
    'dev'
  ]);

  // grunt [default]
  grunt.registerTask( 'default', [
    'dev'
  ]);
};
