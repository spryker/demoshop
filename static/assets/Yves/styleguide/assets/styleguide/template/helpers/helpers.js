/**
 * Registers the "foo" Handlebars helper.
 *
 * @param {object} handlebars The global Handlebars object used by kss-node's kssHandlebarsGenerator.
 */
module.exports.register = function(handlebars) {
    handlebars.registerHelper('split', function(title) {
        var t = title.split('.');
        return t[t.length - 1];
    });
};
