/*global
  module: false,
  require: false
*/
module.exports = function( grunt ){
  'use strict';

  grunt.file.setBase('../../');

  var Config = {
    js : 'requirejs',

    requirejs : {
      paths : {
        plugins  : 'plugins',

        // jquery   : 'empty:',
        // jquery   : '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min',

        jquery   : 'vendor/jquery',
        jqueryui : 'vendor/jquery-ui',
        // jquery   : '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min',
        lodash   : 'vendor/lodash',
        backbone : 'vendor/backbone',
        vent     : 'plugins/backbone.vent',

        tracekit : 'vendor/tracekit',
        snitch   : 'plugins/snitch'
      },

      shim : {
        lodash : {
          exports : '_'
        },

        jqueryui : {
          exports : '$',
          deps    : [ 'jquery' ]
        },

        backbone : {
          exports : 'Backbone',
          deps : [
            'lodash',
            'jquery'
          ]
        },

        vent : {
          exports : 'Backbone.Vent',
          deps    : [ 'backbone' ]
        },

        tracekit : {
          exports : 'TraceKit'
        },

        snitch : {
          deps : [
            'jquery',
            'tracekit'
          ]
        }
      }
    }
  };

  grunt.initConfig({

    yvesDirectories : {
      'configJSON': 'config/Yves/assets.json',
      'configPHP': 'config/Yves/config_assets.php',
      'src': 'static/assets/Yves',
      'dist': 'static/public/Yves'
    },
    compass : {
      /* https://npmjs.org/package/grunt-contrib-compass */

      options : {
        httpPath  : '/',

        sassDir   : '<%= yvesDirectories.src %>/styles/compass',
        cssDir    : '<%= yvesDirectories.dist %>/styles',

        fontsDir  : '<%= yvesDirectories.dist %>/fonts',

        imagesDir          : '<%= yvesDirectories.src %>/images',
        generatedImagesDir : '<%= yvesDirectories.dist %>/images/sprites',

        httpStylesheetsPath     : '/styles',
        httpImagesPath          : '/images',
        httpGeneratedImagesPath : '/images/sprites'
      },

      clean : {
        options : {
          clean : true
        }
      },

      dev : {
        options : {
          outputStyle : 'expanded',
          raw         : 'sass_options = { :debug_info => true }\n'
        }
      },

      dist : {
        options : {
          force       : true,
          outputStyle : 'compressed',
          // assetCacheBuster : false
          raw         : 'asset_cache_buster :none\n'
        }
      }
    },

    clean : {
      /* https://npmjs.org/package/grunt-contrib-clean */

      scripts : [ '<%= yvesDirectories.dist %>/scripts/' ],
      styles : [ '<%= yvesDirectories.dist %>/styles/' ],
      images : [ '<%= yvesDirectories.dist %>/images/' ]
    },

    copy : {
      /* https://npmjs.org/package/grunt-contrib-copy */

      scripts : {
        files : [{
          expand : true,
          cwd    : '<%= yvesDirectories.src %>/scripts/' + Config.js + '/',
          src    : [ '**' ],
          dest   : '<%= yvesDirectories.dist %>/scripts/'
        }]
      },

      vendor : {
        files : [{
          expand : true,
          cwd    : '<%= yvesDirectories.src %>/scripts/vendor/',
          src    : [ '**' ],
          dest   : '<%= yvesDirectories.dist %>/scripts/vendor/'
        }]
      }
    },

    hashmap: {
      /* https://npmjs.org/package/grunt-hashmap */

      options : {
        output  : '<%= yvesDirectories.configJSON %>',
        rename  : '#{= dirname }/#{= basename }-#{= hash }#{= extname }',
        hashlen : 10,
        keep    : true
      },

      files : {
        cwd : '<%= yvesDirectories.dist %>',
        src : [
          'scripts/**/*.js',
          'styles/**/*.css',
          '!scripts/vendor/**/*.js'
        ],
        dest : '<%= yvesDirectories.dist %>'
      }
    },

    hashmapExt : {
      options : {
        variable : 'config[\'assets_hashmap\']',
        align    : true,
        keep     : false
      },

      files : {
        src  : '<%= yvesDirectories.configJSON %>',
        dest : '<%= yvesDirectories.configPHP %>'
      }
    },

    jshint : {
      /* https://npmjs.org/package/grunt-contrib-jshint */

      options: {

        // strict
        'bitwise'   : false,
        'camelcase' : true,
        'curly'     : true,
        'eqeqeq'    : true,
        'forin'     : true,
        'immed'     : true,
        'indent'    : 2,
        'latedef'   : true,
        'newcap'    : true,
        'noarg'     : true,
        'quotmark'  : 'single',
        'strict'    : true,
        'trailing'  : true,
        'undef'     : true,
        'unused'    : true,

        // relaxed
        'eqnull'    : true,
        'smarttabs' : true
      },

      dev : {
        options : {
          'undef'  : false,
          'unused' : false,
          'debug'  : true
        },
        files : {
          src : [
            '<%= yvesDirectories.src %>/scripts/**/*.js',
            '<%= yvesDirectories.src %>/specs/**/*.js',
            '!<%= yvesDirectories.src %>/scripts/**/vendor/*.js'
          ]
        }
      },

      dist : {
        files : {
          src : [
            'Gruntfile.js',
            '<%= yvesDirectories.src %>/scripts/**/*.js',
            '<%= yvesDirectories.src %>/specs/**/*.js',
            '!<%= yvesDirectories.src %>/scripts/**/vendor/*.js'
          ]
        }
      }
    },

    jasmine : {
      /* https://npmjs.org/package/grunt-contrib-jasmine */

      requirejs : {
        src  : '<%= yvesDirectories.src %>/scripts/requirejs/*.js',

        options : {
          specs   : '<%= yvesDirectories.src %>/specs/requirejs/*-spec.js',
          helpers : '<%= yvesDirectories.src %>/specs/requirejs/*-helper.js',

          template : require( 'grunt-template-jasmine-requirejs' ),

          templateOptions : {
            requireConfig : {

              baseUrl : '<%= yvesDirectories.src %>/scripts/requirejs/',

              shim  : Config.requirejs.shim,
              paths : Config.requirejs.paths
            }
          }
        }
      }
    },

    requirejs : {
      /* https://npmjs.org/package/grunt-contrib-requirejs */

      all : {
        options : {
          appDir  : '<%= yvesDirectories.src %>/scripts/requirejs/',
          baseUrl : './',

          dir          : '<%= yvesDirectories.dist %>/scripts/',
          keepBuildDir : true,

          optimize                : 'uglify2',
          // generateSourceMaps      : true,
          preserveLicenseComments : false,

          removeCombined : true,

          pragmas : {
            consoleLogExclude : true
          },

          shim  : Config.requirejs.shim,
          paths : Config.requirejs.paths,

          modules : [
          ]
        }
      }
    },

    watch : {
      /* https://npmjs.org/package/grunt-contrib-watch */

      styles : {
        files : '<%= yvesDirectories.src %>/styles/**/*.scss',
        tasks : 'compass:dev',
        options: {
          interrupt: true
        }
      },

      scripts: {
        files: [
          '<%= yvesDirectories.src %>/scripts/**/*.js',
          '<%= yvesDirectories.src %>/specs/**/*.js'
        ],
        tasks: [
          'jshint:dev',
          'clean:scripts',
          'copy:vendor',
          'copy:scripts'
        ],
        options: {
          interrupt: true
        }
      }
    }
  });

  // fs
  grunt.loadNpmTasks( 'grunt-contrib-clean' );
  grunt.loadNpmTasks( 'grunt-contrib-copy' );
  grunt.loadNpmTasks( 'grunt-contrib-watch' );
  grunt.loadNpmTasks( 'grunt-hashmap' );
  grunt.loadNpmTasks( 'grunt-hashmap-ext' );

  // css
  grunt.loadNpmTasks( 'grunt-contrib-compass' );

  // js
  grunt.loadNpmTasks( 'grunt-contrib-jshint' );
  grunt.loadNpmTasks( 'grunt-contrib-requirejs' );

  // spec
  grunt.loadNpmTasks( 'grunt-contrib-jasmine' );

  // grunt for distribution
  grunt.registerTask( 'dist', [
    'clean',

    'compass:clean',
    'compass:dist',

    'jshint:dist',
    'jasmine',
    'copy:vendor',
    'requirejs:all',

    'hashmap',
    'hashmapExt'
  ]);

  // grunt for development
  grunt.registerTask( 'dev', [
    'clean',

    'compass:clean',
    'compass:dev',

    'jshint:dev',
    'copy:vendor',
    'copy:scripts',

    'watch'
  ]);

  // grunt for development without watch at the end
  grunt.registerTask( 'devNoWatch', [
    'clean',
    'compass:clean',
    'compass:dev',
    'jshint:dev',
    'copy:vendor',
    'copy:scripts'
    ]);

  // grunt [default]
  grunt.registerTask( 'default', [
    'dist'
  ]);
};
