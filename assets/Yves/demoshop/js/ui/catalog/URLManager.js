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
    return params;
  },

  setParams: function(params) {
    var URL = URLUtils.init().origin+URLUtils.pathname,
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
      if (params[param].length > 0) {
        queryParts.push(param+'='+params[param]);
      }
    }

    return queryParts.join('&');
  },

  getPath: function() {
      return URLUtils.init().pathname;
  },

  filterParams: function(filters) {
    var params = this.getParams();

    for (var i = 0; i < filters.length; i++) {
      if (params[filters[i]] !== undefined) {
        delete params[filters[i]];
      }
    }

    return params;
  }

};
