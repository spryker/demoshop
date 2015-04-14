'use strict';

var _gulp   = require('gulp');
var _sass   = require('gulp-sass');
var _jshint = require('gulp-jshint');
var _maps   = require('gulp-sourcemaps');

var _fs   = require('fs');
var _path = require('path');
var _del  = require('del');
var _q    = require('q');


var _dirBase = 'static';

var _dirCss = '/styles';
var _dirJs  = '/scripts';
var _dirImg = '/images';
var _dirFnt = '/fonts';

var _directories = {
	'source' : '/assets/Yves',
	'target' : '/public/Yves'
};

var _fileTS = 'config/Yves/cache_bust.php';



function _copy(source, target) {
	return _gulp
		.src(source)
		.pipe(_gulp.dest(target));
}



_gulp.task('clean-css', function(done) {
	_del([
		_path.join(_dirBase, _directories['target'], _dirCss)
	], done);
});

_gulp.task('clean-js', function(done) {
	_del([
		_path.join(_dirBase, _directories['target'], _dirJs)
	], done);
});

_gulp.task('clean-images', function(done) {
	_del([
		_path.join(_dirBase, _directories['target'], _dirImg)
	], done);
});

_gulp.task('clean-fonts', function(done) {
	_del([
		_path.join(_dirBase, _directories['target'], _dirFnt)
	], done);
});


_gulp.task('dev-lint-js', function() {
	return _gulp
		.src(_path.join(_dirBase, _directories['source'], _dirJs, '**/*.{js,json}'))
		.pipe(_jshint(_path.join(_dirBase, _directories['source'], '.jshintrc')))
		.pipe(_jshint.reporter('default'))
		/*.pipe(_jshint.reporter('fail'))*/;
});


_gulp.task('dev-css', ['clean-css'], function() {
	var source = _path.join(_dirBase, _directories['source'], _dirCss, '**/*.{scss,css}');
	var target = _path.join(_dirBase, _directories['target'], _dirCss);

	return _gulp
		.src(source)
		.pipe(_maps.init())
		.pipe(_sass({
			'errorLogToConsole' : true,
			'outputStyle' : 'nested',
			'precision' : 3
		}))
		.pipe(_maps.write())
		.pipe(_gulp.dest(target));
});

_gulp.task('dev-js', ['clean-js'], function() {
	return _copy(
		_path.join(_dirBase, _directories['source'], _dirJs, '**/*.js'),
		_path.join(_dirBase, _directories['target'], _dirJs)
	);
});

_gulp.task('dev-images', ['clean-images'], function() {
	return _copy(
		_path.join(_dirBase, _directories['source'], _dirImg, '**/*.{svg,png,jpeg,gif,ico}'),
		_path.join(_dirBase, _directories['target'], _dirImg)
	);
});

_gulp.task('dev-fonts', ['clean-fonts'], function() {
	return _copy(
		_path.join(_dirBase, _directories['source'], _dirFnt, '**/*.{svg,woff,otf,ttf,eot}'),
		_path.join(_dirBase, _directories['target'], _dirFnt)
	);
});

_gulp.task('dev-ts', function(done) {
	_q
		.nfcall(_fs.open, _fileTS, 'w')
		.then(function(fd) {
			var buffer = new Buffer(Date.now().toString(), 'utf8');

			return _q.nfcall(_fs.write, fd, buffer, 0, buffer.length);
		})
		.then(done.bind(null, undefined));
});


_gulp.task('dist-lint-js', function() {
	return _gulp
		.src(_path.join(_dirBase, _directories['source'], _dirJs, '**/*.{js,json}'))
		.pipe(_jshint(_path.join(_dirBase, _directories['source'], '.jshintrc-dist')))
		.pipe(_jshint.reporter('default'))
});


_gulp.task('dist-css', ['clean-css'], function() {
	var source = _path.join(_dirBase, _directories['source'], _dirCss, '**/*.{scss,css}');
	var target = _path.join(_dirBase, _directories['target'], _dirCss);

	return _gulp
		.src(source)
		.pipe(_sass({
			'errorLogToConsole' : true,
			'outputStyle' : 'compressed',
			'precision' : 3
		}))
		.pipe(_gulp.dest(target));
});

_gulp.task('dist-js', ['clean-js', 'dev-js']);

_gulp.task('dist-images', ['clean-images', 'dev-images']);

_gulp.task('dist-fonts', ['clean-fonts', 'dev-fonts']);

_gulp.task('dist-ts', ['dev-ts']);


_gulp.task('watcher', function() {
	_gulp.watch(_path.join(_dirBase, _directories['source'], _dirCss, '**/*.{scss,css}'            ), ['clean-css'   , 'dev-css'   ]);
	_gulp.watch(_path.join(_dirBase, _directories['source'], _dirJs , '**/*.{js,json}'             ), ['clean-js'    , 'dev-js'    ]);
	_gulp.watch(_path.join(_dirBase, _directories['source'], _dirImg, '**/*.{svg,png,jpeg,gif,ico}'), ['clean-images', 'dev-images']);
	_gulp.watch(_path.join(_dirBase, _directories['source'], _dirFnt, '**/*.{svg,woff,otf,ttf,eot}'), ['clean-fonts' , 'dev-fonts' ]);
});


_gulp.task('test', [
	'dev-lint-js'
]);


_gulp.task('dev', [
	'clean-css',
	'clean-js',
	'clean-images',
	'clean-fonts',
	'dev-lint-js',
	'dev-css',
	'dev-js',
	'dev-images',
	'dev-fonts',
	'dev-ts'
]);

_gulp.task('dist', [
	'clean-css',
	'clean-js',
	'clean-images',
	'clean-fonts',
	'dist-css',
	'dist-js',
	'dist-images',
	'dist-fonts',
	'dist-ts'
]);

_gulp.task('dev-all', [
	'dev'
]);

_gulp.task('dist-all', [
	'dist'
]);

_gulp.task('default', [
	'dist'
]);