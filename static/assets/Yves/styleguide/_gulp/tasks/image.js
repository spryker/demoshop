'use strict';

/**
* Minification of images
*/
var gulp = require('gulp'),
  paths = require('../config').paths;

gulp.task('images', function() {
  var imagemin     = require('gulp-imagemin'),
    jpegRecompress = require('imagemin-jpeg-recompress'),
    gutil          = require('gutil');

  return gulp.src(paths.source.images + '/**/*.{png,jpg}')
    .on('error', gutil.log)
    .pipe(imagemin({
      svgoPlugins : [
        // { cleanupAttrs : false },
        // { cleanupEnableBackground : false },
        // { cleanupIDs : false },
        // { cleanupNumericValues : false },
        { collapseGroups : false },
        // { convertColors : false },
        { convertPathData : false },
        { convertShapeToPath : false },
        // { convertStyleToAttrs : false },
        // { convertTransform : false },
        // { mergePaths : false },
        { moveElemsAttrsToGroup : false },
        { moveGroupAttrsToElems : false },
        // { removeComments : false },
        // { removeDesc : false },
        // { removeDoctype : false },
        // { removeEditorsNSData : false },
        // { removeEmptyAttrs : false },
        // { removeEmptyContainers : false },
        // { removeEmptyText : false },
        { removeHiddenElems : false },
        // { removeMetadata : false },
        // { removeNonInheritableGroupAttrs : false },
        // { removeRasterImages : false },
        // { removeTitle : false },
        { removeUnknownsAndDefaults : false },
        // { removeUnusedNS : false },
        // { removeUselessStrokeAndFill : false },
        { removeViewBox : false }
        // { removeXMLProcInst : false },
        // { sortAttrs : false },
        // { transformsWithOnePath : false }
      ],
      use : [
        jpegRecompress({ loops : 1})
      ]
    }))
    .pipe(gulp.dest(paths.dest.images));
});