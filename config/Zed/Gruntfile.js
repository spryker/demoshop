/*global
 module: false,
 require: false
 */
module.exports = function ( grunt ) {
    'use strict';

    grunt.file.setBase('../../');

    require( 'matchdep' )
        .filterDev( 'grunt-contrib*' )
        .forEach( grunt.loadNpmTasks );

    grunt.initConfig({

        yvesDirectories : {
            'configJSON': 'config/Zed/assets.json',
            'configPHP': 'config/Zed/config_assets.php',
            'config': 'config/Zed/',
            'src': 'vendor/project-a/infrastructure-package/src/ProjectA/Zed/Application/Static/',
            'dist': 'static/public/Zed/new'
        },

        zedDirectories : {
            'pkg' : 'vendor/project-a',
            'dist' : 'static/public/Zed/bundles'
        },

        pkg : grunt.file.readJSON( 'package.json' ),

        connect: {
            /* https://npmjs.org/package/grunt-contrib-connect */
            server: {
                options: {
                    base      : '<%= yvesDirectories.dist %>',
                    port      : '?',
                    keepalive : true
                }
            }
        },

        clean : {
            /* https://npmjs.org/package/grunt-contrib-clean */
            scripts : '<%= yvesDirectories.dist %>/scripts/',
            styles : '<%= yvesDirectories.dist %>/styles/',
            images : '<%= yvesDirectories.dist %>/images/',
            fonts : '<%= yvesDirectories.dist %>/fonts/'
        },

        copy : {
            /* https://npmjs.org/package/grunt-contrib-copy */

            vendorStyles : {
                files : [
                    {
                        expand : true,
                        cwd    : '<%= yvesDirectories.src %>/styles/vendor/',
                        src    : [ '**' ],
                        dest   : '<%= yvesDirectories.dist %>/styles/vendor/'
                    }
                ]
            },

            scripts : {
                files : [
                    {
                        expand : true,
                        cwd    : '<%= yvesDirectories.src %>/scripts/',
                        src    : [ '**' ],
                        dest   : '<%= yvesDirectories.dist %>/scripts/'
                    }
                ]
            },

            vendorScripts : {
                files : [
                    {
                        expand : true,
                        cwd    : '<%= yvesDirectories.src %>/scripts/vendor/',
                        src    : [ '**' ],
                        dest   : '<%= yvesDirectories.dist %>/scripts/vendor/'
                    }
                ]
            },

            fonts : {
                files : [
                    {
                        expand : true,
                        cwd    : '<%= yvesDirectories.src %>/fonts/',
                        src    : [ '**' ],
                        dest   : '<%= yvesDirectories.dist %>/fonts/'
                    }
                ]
            },

            images : {
                files : [
                    {
                        expand : true,
                        cwd    : '<%= yvesDirectories.src %>/images/',
                        src    : [
                            '**',
                            '!flag/'
                        ],
                        dest   : '<%= yvesDirectories.dist %>/images/'
                    }
                ]
            },
            packages : {
                files : [
                    {
                        expand : true,
                        cwd    : '<%= zedDirectories.pkg %>/',
                        src    : [
                            '**/Static/**/*'
                        ],
                        dest   : '<%= zedDirectories.dist %>/',

                        rename : function ( dest, src ) {
                            return  dest + src.replace( /([\\\/]?([\w-_]+[\\\/])*([\w-_]+)[\\\/]static)/i, '$3' );
                        }

                    }
                ]
            }
        },

        compass : {
            options : {

                httpPath  : '/',

                sassDir   : '<%= yvesDirectories.src %>/styles',
                cssDir    : '<%= yvesDirectories.dist %>/styles',

                fontsDir           : '<%= yvesDirectories.dist %>/fonts',
                imagesDir          : '<%= yvesDirectories.src %>/images',
                generatedImagesDir : '<%= yvesDirectories.dist %>/images/sprites',

                httpStylesheetsPath     : '/new/styles',
                httpImagesPath          : '/new/images',
                httpGeneratedImagesPath : '/new/images/sprites',
                httpFontsPath           : '/new/fonts'
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
                    raw         : 'asset_cache_buster :none\n'
                }
            }
        },

        jshint : {
            dev : {
                options : {
                    jshintrc : '<%= yvesDirectories.config %>/.jshintrc'
                },
                files : {
                    src : [
                        '<%= yvesDirectories.src %>/scripts/**/*.js',
                        '!<%= yvesDirectories.src %>/scripts/vendor/**/*.js'
                    ]
                }
            },

            dist : {
                options : {
                    jshintrc : '<%= yvesDirectories.config %>/.jshintrc-dist'
                },
                files : {
                    src : [
                        'Gruntfile.js',
                        '<%= yvesDirectories.src %>/scripts/**/*.js',
                        '!<%= yvesDirectories.src %>/scripts/vendor/**/*.js'
                    ]
                }
            }
        },

        watch : {
            options: {
                interrupt: true
            },

            styles : {
                files : '<%= yvesDirectories.src %>/**/*.scss',
                tasks : 'compass:dev'
            },
            scripts : {
                files : '<%= yvesDirectories.src %>/**/*.js',
                tasks : [
                    //'jshint:dev',
                    'copy:scripts'
                ]
            }
        }
    });

    // grunt distribution
    grunt.registerTask( 'dist', [
        'compass:clean',
        'compass:dist',
        'copy:vendorStyles',

        //'jshint:dist',
        'clean:scripts',
        'copy:scripts',
        'copy:vendorScripts',
        'copy:fonts',
        'copy:images',
        'copy:packages'
    ]);

    // grunt for development
    grunt.registerTask( 'dev', [
        'compass:clean',
        'compass:dev',
        'copy:vendorStyles',

        //'jshint:dev',
        'clean:scripts',
        'copy:scripts',
        'copy:vendorScripts',
        'copy:fonts',
        'copy:images',
        'copy:packages',
        'watch'
    ]);

    // grunt for development without watch at the end
    grunt.registerTask( 'devNoWatch', [
        'compass:clean',
        'compass:dev',
        'copy:vendorStyles',
        //'jshint:dev',
        'clean:scripts',
        'copy:scripts',
        'copy:vendorScripts',
        'copy:fonts',
        'copy:images',
        'copy:packages'
    ]);

    // grunt [default]
    grunt.registerTask( 'default', [
        'dev'
    ]);
};
