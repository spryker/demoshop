var ASSETS_DIR = 'static/assets/Yves/';
var PUBLIC_DIR = 'static/public/Yves/';

var globs = {
    images: '**/*.{png,jpg,jpeg,gif}',
    styles: '**/*.{sass,scss}',
    fonts: '**/*.{svg,woff,otf,ttf,eot}'
};

var config = {
    globs: globs,
    paths: {
        jshint: ['gulpfile.js', ASSETS_DIR + 'js/**/*.js', '!' + ASSETS_DIR + 'js/vendor/*.js'],
        source: {
            templates: 'templates/**/*.html',
            partials: 'templates/partials/**/*.hbs',
            styles: ASSETS_DIR + 'styles/' + globs.styles,
            styles_vendor: ASSETS_DIR + 'styles/vendor/*.css',
            scripts: ASSETS_DIR + 'scripts/**/*.js',
            //scripts_entry: '../../static/assets/Yves/scripts/main.js', // entry points only
            scripts_entry:  ASSETS_DIR + 'scripts/main.js', // entry points only
            scripts_vendor: ASSETS_DIR + 'scripts/vendor/*.js',
            images: [ASSETS_DIR + 'images/**/*', '!' + ASSETS_DIR + 'images/sprite/**/*'],
            sprite: ASSETS_DIR + 'images/sprite/' + globs.images,
            fonts: ASSETS_DIR + 'fonts/' + globs.fonts,
            rev: ASSETS_DIR + 'rev/',
            root: ASSETS_DIR
        },
        dest: {
            styles: PUBLIC_DIR + 'css/',
            scripts: PUBLIC_DIR + 'js/',
            images: PUBLIC_DIR + 'images/',
            sprite: {
                img: PUBLIC_DIR + 'images/',
                scss: ASSETS_DIR + 'css/variables/'
            },
            fonts: PUBLIC_DIR + 'fonts/',
            root: PUBLIC_DIR
        }
    }
};

module.exports = config;