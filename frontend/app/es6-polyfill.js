/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

// add es6 polyfill
require('core-js/fn/promise');
require('core-js/fn/array');
require('core-js/fn/set');
require('core-js/fn/map');

// check if the browser natively supports webcomponents (and es6)
const hasNativeCustomElements = !!window.customElements;

// then load a shim for es5 transpilers (typescript or babel)
// https://github.com/webcomponents/webcomponentsjs#custom-elements-es5-adapterjs
if (hasNativeCustomElements) {
    import(/* webpackMode: "eager" */'@webcomponents/webcomponentsjs/custom-elements-es5-adapter');
}
