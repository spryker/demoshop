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
        styleguide: {
            styles: ASSETS_DIR + 'scss/**/*.{hbs,scss,less}',
            template: {
                folder: ASSETS_DIR + 'styleguide/template',
                files: ASSETS_DIR + 'styleguide/**/*.{hbs,html,js}',
            }
        },
        copy: {
            folder: ASSETS_DIR + 'copy',
            files: ASSETS_DIR + 'copy/**/*.{jpg,png}'
        },
        images: ASSETS_DIR + 'images'
    },
    dest: {
        folder: PUBLIC_DIR,
        styleguide: PUBLIC_DIR + 'styleguide',
        styles: PUBLIC_DIR + 'css',
        images: PUBLIC_DIR + 'images'
    }
  }
};

module.exports = config;