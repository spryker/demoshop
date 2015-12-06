var ASSETS_DIR = 'assets/';
var PUBLIC_DIR = '../../../public/Yves/';

var config = {
  paths: {
    source: {
        root: ASSETS_DIR,
        styles: {
            folder: ASSETS_DIR + 'scss',
            files: ASSETS_DIR + 'scss/**/*.scss',
            main: ASSETS_DIR + 'scss/styles.scss',
            styleguide: ASSETS_DIR + 'scss/styleguide.scss'
        },
        scripts: {
            folder: ASSETS_DIR + 'js',
            files: ASSETS_DIR + 'js/**/*.js',
            entry: ASSETS_DIR + 'js/sg-main.js'
        },
        styleguide: {
            styles: ASSETS_DIR + 'scss/**/*.{hbs,scss,less,json}',
            template: {
                folder: ASSETS_DIR + 'styleguide/template',
                files: ASSETS_DIR + 'styleguide/**/*.{hbs,html,js}',
            }
        },
        copy: {
            folder: ASSETS_DIR + 'copy',
            files: ASSETS_DIR + 'copy/**/*.{jpg,png,svg,ttf,woff,woff2,eot,ico,js}'
        },
        images: ASSETS_DIR + 'images',
        iconfont: {
            icons: ASSETS_DIR + 'icons/**/*.svg',
            templates: {
                style: ASSETS_DIR + 'templates/iconfont.scss',
                preview: ASSETS_DIR + 'templates/iconfont.html'
            }
        }
    },
    dest: {
        folder: PUBLIC_DIR,
        styleguide: PUBLIC_DIR + 'styleguide',
        styles: PUBLIC_DIR + 'css',
        scripts: PUBLIC_DIR + 'js',
        images: PUBLIC_DIR + 'images',
        fonts: PUBLIC_DIR + 'fonts'
    }
  }
};

module.exports = config;