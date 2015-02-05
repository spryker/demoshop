/*global
  module: false,
  require: false
*/
module.exports = function( grunt ){
  'use strict';

  grunt.file.setBase('../../');

  /*
      'configJSON': 'config/Yves/assets.json',
      'configPHP': 'config/Yves/config_assets.php',
   */

  grunt.initConfig({
    cache_bust_file: 'config/Yves/cache_bust.php',
    dirs : {
      config : 'config/Yves',
      src    : 'static/assets/Yves',
      dist   : 'static/public/Yves',
      http   : ''
    },

    clean : {
      /* https://npmjs.org/package/grunt-contrib-clean */

      scripts : '<%= dirs.dist %>/scripts/',
      styles  : '<%= dirs.dist %>/styles/',
      images  : '<%= dirs.dist %>/images/',
      fonts   : '<%= dirs.dist %>/fonts/'
    },

    copy : {
      /* https://npmjs.org/package/grunt-contrib-copy */

      fonts : {
        expand : true,
        cwd    : '<%= dirs.src %>/fonts',
        src    : '**/*.{woff,ttf,otf,eot,svg}',
        dest   : '<%= dirs.dist %>/fonts'
      },

      images : {
        expand : true,
        cwd    : '<%= dirs.src %>/images',
        src    : '**/*.{jpg,jpeg,svg,png,gif,webp,ico}',
        dest   : '<%= dirs.dist %>/images'
      },

      scripts : {
        expand : true,
        cwd    : '<%= dirs.src %>/scripts/',
        src    : '**/*.{js,map}',
        dest   : '<%= dirs.dist %>/scripts/'
      }
    },

    compass : {
      /* https://npmjs.org/package/grunt-contrib-compass */

      options : {
        sassDir   : '<%= dirs.src %>/styles',
        imagesDir : '<%= dirs.src %>/images',
        fontsDir  : '<%= dirs.src %>/fonts',

        generatedImagesDir : '<%= dirs.dist %>/images',
        cssDir             : '<%= dirs.dist %>/styles',

        httpPath                : '/',
        httpStylesheetsPath     : '<%= dirs.http %>/styles',
        httpGeneratedImagesPath : '<%= dirs.http %>/images',
        httpFontsPath           : '<%= dirs.http %>/fonts'
      },

      clean : {
        options : {
          clean : true
        }
      },

      dev : {
        options : {
          outputStyle : 'expanded',
          // raw         : 'sass_options = { :debug_info => true }\n',
          debugInfo   : true
        }
      },

      watch : {
        options : {
          outputStyle : 'expanded',
          // raw         : 'sass_options = { :debug_info => true }\n',
          watch       : true,
          debugInfo   : true
        }
      },

      dist : {
        options : {
          force       : true,
          outputStyle : 'compressed',
          raw         : 'asset_cache_buster :none\n'
        }
      }
    },

    jshint : {
      dev : {
        options : {
          jshintrc : '<%= dirs.src %>/.jshintrc-dev'
        },

        files : {
          src : [
            '<%= dirs.src %>/scripts/**/*.js',
            '!<%= dirs.src %>/scripts/vendor/*.js'
          ]
        }
      },

      dist : {
        options : {
          jshintrc : '<%= dirs.src %>/.jshintrc'
        },
        files : {
          src : [
            '<%= dirs.config %>/Gruntfile.js',
            '<%= dirs.src %>/scripts/**/*.js',
            '!<%= dirs.src %>/scripts/vendor/*.js'
          ]
        }
      }
    },

    watch : {
      /* https://npmjs.org/package/grunt-contrib-watch */

      fonts : {
        files : '<%= dirs.src %>/fonts/**/*.{woff,ttf,otf,eot,svg}',

        tasks : [
          'copy:fonts'
        ],

        options : {
          spawn : false
        }
      },

      scripts: {
        files : [
          '<%= dirs.src %>/scripts/**/*.js',
          'Gruntfile.js'
        ],

        tasks : [
          'jshint:dev',
          'copy:scripts'
        ],

        options : {
          spawn : false
        }
      }
    },

    concurrent : {
      options : {
        logConcurrentOutput: true
      },

      watch : [
        'watch',
        'compass:watch'
      ]
    }
  });

  require( 'matchdep' )
    .filterAll( 'grunt-*', require( '../../package.json' ) )
      .forEach( grunt.loadNpmTasks );

  grunt.registerTask( 'addCacheBustHash', function() {
    grunt.file.write(grunt.config.get('cache_bust_file'), Date.now());
  });

  // grunt for distribution
  grunt.registerTask( 'dist', [
    'clean',
    'copy',

    'compass:clean',
    'compass:dist',
    'addCacheBustHash'
  ]);

  // grunt for development
  grunt.registerTask( 'dev', [
    'clean',
    'copy',

    'compass:clean',
    'compass:dev',
    'addCacheBustHash'
  ]);

  grunt.registerTask( 'test', [
    'jshint:dist'
  ]);

  // grunt for development without watch at the end
  grunt.registerTask( 'watcher', [
    'concurrent:watch'
  ]);

  // grunt [default]
  grunt.registerTask( 'default', [
    'dist'
  ]);
};
