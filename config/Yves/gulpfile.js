var requireDir = require('require-dir');

// Require all tasks in gulp/tasks, including subfolders
requireDir('./gulp/tasks', { recurse: true });

// 'use strict';

// var gulp        = require('gulp'),
//     source      = require('vinyl-source-stream'),
//     sass        = require('gulp-sass'),
//     autoprefixer = require('gulp-autoprefixer'),
//     browserify  = require('browserify'),
//     uglify      = require('gulp-uglify'),
//     sourcemaps  = require('gulp-sourcemaps'),
//     jshint      = require('gulp-jshint'),
//     maps        = require('gulp-sourcemaps'),
//     hb          = require('gulp-hb'),
//     browserSync = require('browser-sync'),
//     reload      = browserSync.reload;

// var path = require('path'),
//     del  = require('del');

// var dirBase     = '.',
//     dirCss      = '/styles',
//     dirJs       = '/scripts',
//     dirImg      = '/images',
//     dirFont     = '/fonts',
//     dirPartials = '/partials';

// var dirTemplates = dirBase + '/templates',
//     dirAssets    = dirBase + '/assets',
//     dirPublic    = dirBase + '/public';

// var paths = {
//   source: {
//     templates : dirTemplates + '/**/*.html',
//     partials  : dirTemplates + dirPartials + '/**/*.hbs',
//     css       : dirAssets + dirCss + '/**/*.scss',
//     js        : dirAssets + dirJs + '/**/*.js',
//     img       : dirAssets + dirImg + '/**/*.{svg,png,jpeg,gif,ico}',
//     font      : dirAssets + dirFont + '/**/*.{svg,woff,otf,ttf,eot}'
//   },
//   dest: {
//     html      : dirPublic,
//     css       : dirPublic + dirCss,
//     js        : dirPublic + dirJs,
//     img       : dirPublic + dirImg,
//     font      : dirPublic + dirFont
//   }
// };

// function _copy(source, target) {
//   return gulp
//     .src(source)
//     .pipe(gulp.dest(target));
// }

// gulp.task('clean-html', function(done) {
//   del([paths.dest.html + '/**/*.html'], done);
// });

// gulp.task('clean-css', function(done) {
//   del([paths.dest.css], done);
// });

// gulp.task('clean-js', function(done) {
//   del([paths.dest.js], done);
// });

// gulp.task('clean-images', function(done) {
//   del([paths.dest.img], done);
// });

// gulp.task('clean-fonts', function(done) {
//   del([paths.dest.font], done);
// });

// gulp.task('dev-html', function(done) {
//   return gulp
//     .src(paths.source.templates)
//     .pipe(hb({
//       partials: [paths.source.partials]
//     }))
//     .pipe(gulp.dest(paths.dest.html))
//     .pipe(reload({stream: true}));
// });

// gulp.task('dev-lint-js', function() {
//   return gulp
//     .src(paths.source.js)
//     .pipe(jshint(path.join(dirBase, '.jshintrc')))
//     .pipe(jshint.reporter('default'))
// });

// gulp.task('dev-css', ['clean-css'], function() {
//   return gulp
//     .src(paths.source.css)
//     .pipe(maps.init())
//     .pipe(sass({
//       errLogToConsole: true,
//       'outputStyle' : 'nested',
//       'precision' : 3
//     }))
//     .pipe(autoprefixer({
//       browsers: ['last 2 versions'],
//       cascade: false
//     }))
//     .pipe(maps.write())
//     .pipe(gulp.dest(paths.dest.css))
//     .pipe(reload({stream: true}));
// });

// gulp.task('dev-images', ['clean-images'], function() {
//   return _copy(
//     paths.source.img,
//     paths.dest.img
//   );
// });

// gulp.task('dev-js', ['clean-js'], function() {
//   return browserify(dirAssets+dirJs+'/main.js')
//     .bundle()
//     .pipe(source('main.js'))
//     .pipe(gulp.dest(paths.dest.js));
// });

// gulp.task('dev-fonts', ['clean-fonts'], function() {
//   return _copy(
//     paths.source.font,
//     paths.dest.font
//   );
// });

// gulp.task('dist-lint-js', function() {
//   return gulp
//     .src(paths.source.js)
//     .pipe(jshint(path.join(dirBase, '.jshintrc')))
//     .pipe(jshint.reporter('default'))
// });

// gulp.task('dist-css', ['clean-css'], function() {
//   return gulp
//     .src(paths.source.css)
//     .pipe(sass({
//       errLogToConsole: false,
//       onError: function(err) {
//         return notify().write(err);
//       },
//       'outputStyle' : 'compressed',
//       'precision' : 3
//     }))
//     .pipe(gulp.dest(paths.dist.css));
// });

// gulp.task('dist-html', ['clean-html', 'dev-html']);

// gulp.task('dist-js', ['clean-js', 'dev-js']);

// gulp.task('dist-images', ['clean-images', 'dev-images']);

// gulp.task('dist-fonts', ['clean-fonts', 'dev-fonts']);

// gulp.task('watch', ['dev'], function() {
//   browserSync({
//     server: {
//       baseDir: paths.dest.html
//     }
//   });

//   gulp.watch(paths.source.templates, ['clean-html', 'dev-html']);
//   gulp.watch(paths.source.css,  ['clean-css', 'dev-css']);
//   gulp.watch(paths.source.js,   ['clean-js', 'dev-js']);
//   gulp.watch(paths.source.img,  ['clean-images', 'dev-images']);
//   gulp.watch(paths.source.font, ['clean-fonts', 'dev-fonts' ]);
// });


// // gulp.task('test', [
// //   'dev-lint-js'
// // ]);

// gulp.task('dev', [
//   'clean-html',
//   'clean-css',
//   'clean-js',
//   'clean-images',
//   'clean-fonts',
//   'dev-lint-js',
//   'dev-html',
//   'dev-css',
//   'dev-js',
//   'dev-images',
//   'dev-fonts'
// ]);

// gulp.task('dist', [
//   'clean-html',
//   'clean-css',
//   'clean-js',
//   'clean-images',
//   'clean-fonts',
//   'dist-html',
//   'dist-css',
//   'dist-js',
//   'dist-images',
//   'dist-fonts'
// ]);

// gulp.task('default', [
//   'dist'
// ]);