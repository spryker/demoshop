/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

// core
require('foundation-sites/js/foundation.core');

// utils
require('foundation-sites/js/foundation.util.mediaQuery.js');
require('foundation-sites/js/foundation.util.motion.js');
require('foundation-sites/js/foundation.util.triggers.js');
require('foundation-sites/js/foundation.util.keyboard.js');
require('foundation-sites/js/foundation.util.box.js');

// plugins
require('foundation-sites/js/foundation.toggler');
require('foundation-sites/js/foundation.dropdown.js');

$(document).ready(function(){
    $(document).foundation();
});
