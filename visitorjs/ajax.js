// Plain JavaScript Ajax Methods
// Author: https://stackoverflow.com/users/268074/petah

var ajax={x:function(){if("undefined"!=typeof XMLHttpRequest)return new XMLHttpRequest;for(var e,t=["MSXML2.XmlHttp.6.0","MSXML2.XmlHttp.5.0","MSXML2.XmlHttp.4.0","MSXML2.XmlHttp.3.0","MSXML2.XmlHttp.2.0","Microsoft.XmlHttp"],n=0;n<t.length;n++)try{e=new ActiveXObject(t[n]);break}catch(e){}return e},send:function(e,t,n,o,a){void 0===a&&(a=!0);var r=ajax.x();r.open(n,e,a),r.onreadystatechange=function(){4==r.readyState&&t(r.responseText)},"POST"==n&&r.setRequestHeader("Content-type","application/x-www-form-urlencoded"),r.send(o)},get:function(e,t,n,o){var a=[];for(var r in t)a.push(encodeURIComponent(r)+"="+encodeURIComponent(t[r]));ajax.send(e+(a.length?"?"+a.join("&"):""),n,"GET",null,o)},post:function(e,t,n,o){var a=[];for(var r in t)a.push(encodeURIComponent(r)+"="+encodeURIComponent(t[r]));ajax.send(e,n,"POST",a.join("&"),o)}};