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
    var URL, param;
    var paramString = '';
    for (param in params) {
      paramString += param+'='+params[param]+'&';
    }
    paramString = paramString.substr(0, paramString.length-1);
    URL = URLUtils.init().origin+URLUtils.pathname+'?'+paramString;
    window.history.pushState(null, window.document.title, URL);
  }

};