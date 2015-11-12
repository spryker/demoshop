/**
 * Registers the "foo" Handlebars helper.
 *
 * @param {object} handlebars The global Handlebars object used by kss-node's kssHandlebarsGenerator.
 */
module.exports.register = function(handlebars) {
    handlebars.registerHelper('splitFirst', function(title) {
        var t = title.split('.');
        return t[0];
    });

    handlebars.registerHelper('splitLast', function(title) {
        var t = title.split('.');
        return t[t.length - 1];
    });

    handlebars.registerHelper('default', function (a, b) {
        return typeof a !== 'undefined' ? a : b;
    });

    handlebars.registerHelper('debug', function (a) {
        console.log(a);
        return a;
    });

    handlebars.registerHelper('cachebust', function (a) {
        return a + '?' + new Date().getTime();
    });
};
