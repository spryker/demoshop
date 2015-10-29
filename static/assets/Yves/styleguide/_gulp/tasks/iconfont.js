'use strict';

/**
* Creates iconfont out of all SVG files in /assets/images/icons
*/
var gulp = require('gulp'),
  paths = require('../config').paths;

var fontName = 'Petsdeli-Icons';


gulp.task('iconfont', function () {

  var svgmin = require('gulp-svgmin'),
    iconfont = require('gulp-iconfont'),
    consolidate = require('gulp-consolidate'),
    rename = require('gulp-rename');

  return gulp.src([paths.source.iconfont.icons])
    .pipe(svgmin({
      plugins: [{
        transformsWithOnePath: true
      }]
    }))

    .pipe(iconfont({
      fontName: fontName,
      fontHeight: 500,
      normalize: true,
      appendCodepoints: true
    }))
    .on('codepoints', function(codepoints, options) {

      options = {
        glyphs: codepoints,
        fontName: fontName,
        fontPath: fontName + '/',
        className: 'pdif'
      };

      // create scss with easy to use mixin
      gulp.src(paths.source.iconfont.templates.style)
        .pipe(consolidate('lodash', options))
        .pipe(rename({
          basename: fontName,
          extname: '.css'
        }))
        .pipe(gulp.dest(paths.dest.fonts + '/' + fontName))
        .pipe(rename({
          basename: '_iconfont',
          extname: '.scss'
        }))
        .pipe(gulp.dest(paths.source.styles.folder + '/base'));

      // create overview page
      gulp.src(paths.source.iconfont.templates.preview)
        .pipe(consolidate('lodash', options))
        .pipe(rename({
          basename: fontName
        }))
        .pipe(gulp.dest(paths.dest.fonts + '/' + fontName));

    })
    .pipe(gulp.dest(paths.dest.fonts + '/' + fontName));
});