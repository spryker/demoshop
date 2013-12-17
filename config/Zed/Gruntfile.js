/*global
 module: false,
 require: false
 */
module.exports = function ( grunt ) {
  'use strict';

  grunt.file.setBase('../../');

  function packageDestRename( dest, src ) {
    return dest + src.replace( /([\\\/]?([\w-_]+[\\\/])*([\w-_]+)[\\\/]static)/i, '$3' );
  }

  grunt.initConfig({
    dirs : {
      config : 'config/Zed',
      pkg   : 'vendor/project-a',
      srcY  : '**/{Shared,Yves}/*/Static/**/*',
      srcZ  : '**/{Shared,Zed}/*/Static/**/*',
      distY : 'static/public/Yves/bundles',
      distZ : 'static/public/Zed/bundles'
    },

    clean : {
      /* https://npmjs.org/package/grunt-contrib-clean */

      packagesYves : '<%= dirs.distY %>',
      packagesZed : '<%= dirs.distZ %>'
    },

    copy : {
      packagesYves : {
        expand : true,
        cwd    : '<%= dirs.pkg %>/',
        src    : '<%= dirs.srcY %>',
        dest   : '<%= dirs.distY %>/',
        rename : packageDestRename
      },

      packagesZed : {
        expand : true,
        cwd    : '<%= dirs.pkg %>/',
        src    : '<%= dirs.srcZ %>',
        dest   : '<%= dirs.distZ %>/',
        rename : packageDestRename
      }
    },

    watch : {
      /* https://npmjs.org/package/grunt-contrib-watch */

      packagesYves : {
        files : '<%= dirs.pkg %>/<%= dirs.srcY %>',

        tasks : [
          'copy:packagesYves'
        ],

        options : {
          spawn : false
        }
      },

      packagesZed : {
        files : '<%= dirs.pkg %>/<%= dirs.srcZ %>',

        tasks : [
          'copy:packagesZed'
        ],

        options : {
          spawn : false
        }
      },
    }

    /* keeping just in case for now - soon to be removed, i guess :) */

    // yvesDirectories : {
    //     'configJSON': 'config/Zed/assets.json',
    //     'configPHP': 'config/Zed/config_assets.php',
    //     'config': 'config/Zed/',
    //     'src': 'vendor/project-a/infrastructure-package/src/ProjectA/Zed/Application/Static/',
    //     'dist': 'static/public/Zed/new',
    //     'yvesDist': 'static/public/Yves/bundles'
    // },

    // zedDirectories : {
    //     'pkg' : 'vendor/project-a',
    //     'dist' : 'static/public/Zed/bundles'
    // },
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
