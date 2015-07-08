'use strict';
var URLUtils = require('../../utils/URLUtils');

module.exports = {

  getParam: function(paramName) {
    var params = this.getParams();
    return params[paramName];
  },

  getParams: function() {
    var params = {};
    URLUtils.init().search.substr(1).split('&').forEach(function(el) {
      var param = el.split('=');
      if (param.length == 2) {
        params[param[0]] = param[1];
      }
    });
    if (!this.isSearch()) {
        params["category"] = this.getPath().replace(/^\//, '');
    }
    return params;
  },

  setParams: function(params) {
    var URL = URLUtils.init().origin + (this.isSearch() ? URLUtils.pathname : '/' + params["category"]),
        paramString = this.paramsToString(params);

    if (paramString.length > 0) {
      URL = URL + '?' + paramString;
    }

    window.history.pushState(null, window.document.title, URL);
  },

  paramsToString: function(params) {
    var param,
        queryParts = [];

    for (param in params) {
      if (param == 'category' && !this.isSearch())   {
        continue;
      }
      if (params[param].length > 0) {
        queryParts.push(param+'='+params[param]);
      }
    }

    return queryParts.join('&');
  },

  getPath: function() {
      return URLUtils.init().pathname;
  },

  isSearch: function() {
      return this.getPath() == '/search';
  }
};
