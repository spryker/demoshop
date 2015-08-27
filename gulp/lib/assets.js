/**
 * (c) Spryker Systems GmbH copyright protected
 */

'use strict';

var p = require('path');
var R = require('ramda');
var is = require('is_js');
var glob = require('glob');

function map(target, type) {
    var target = target || '*';
    var type = type || '*';
    var bundles = [];
    var map = {
        js: [],
        css: [],
        images: [],
        fonts: []
    };

    glob.sync('{0}/**/assets.{1}.{2}.json'.format(basePath, target, type)).forEach(function(assetsFile) {
        var maps = require(assetsFile) || [{}];

        maps.forEach(function(map) {
            map.priority = is.number(map.priority) ? map.priority : 100;
            bundles.push({
                path: p.dirname(assetsFile),
                priority: map.priority,
                map: map
            })
        });
    });

    if (bundles.length === 0) {
        map.empty = true;
    } else {
        var sortByLevel = R.sortBy(R.prop('priority'));
        bundles = sortByLevel(bundles);

        bundles.forEach(function(bundle) {
            if (bundle.map && bundle.map.assets) {
                R.mapObjIndexed(function(array, key, parentObj) {
                    if (bundle.map.assets[key]) {
                        parentObj[key] = array.concat(R.map(function(asset) {
                            return bundle.path + asset;
                        }, bundle.map.assets[key]));
                    }
                }, map);
            }
        });

        map.empty = false;
    }

    return map;
}

module.exports = {
	map: map
};
