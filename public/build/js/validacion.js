const expresiones={nombre:/^[a-zA-ZÀ-ÿ\s]{10,40}$/,correo:/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i,numero:/^[0-9]{10}$/,"contraseña":/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/,mayuscula:/^[A-Z]/,minuscula:/^[a-z]/,numeros:/^[0-9]/,caracteres:/^[.]/},campos={nombre:!1,correo:!1,telefono:!1},datos={nombre:"",correo:"",telefono:""};function headerFijo(){if(document.querySelector(".header")){const e=document.querySelector(".header"),o=document.querySelector(".navegacion-principal");window.addEventListener("scroll",(function(){o.classList.toggle("sticky",window.scrollY>0),e.classList.toggle("sticky",window.scrollY>0)}))}}function carga(){const e=document.getElementById("formulario"),o=document.querySelectorAll(".campos-validacion");try{const e=document.querySelector("#nombre"),o=document.querySelector("#correo"),n=document.querySelector("#telefono");e.addEventListener("input",leerTexto),o.addEventListener("input",leerTexto),n.addEventListener("input",leerTexto)}catch(e){}o.forEach(e=>{e.addEventListener("keyup",validarFormulario),e.addEventListener("blur",validarFormulario),e.addEventListener("keydown",validarFormulario)}),e.onsubmit=function(o){o.preventDefault();const{nombre:n,correo:t,telefono:r}=datos;campos.nombre&&campos.correo&&campos.telefono?(e.reset(),""===n.datos||""===t.datos||""===r.datos?mostrarAlerta("*Todos los campos son obligatorios","error"):mostrarAlerta("Formulario enviado correctamente")):mostrarAlerta("Los campos son obligatorios, o están incorrectos","error")}}function leerTexto(e){try{datos[e.target.id]=e.target.value}catch(e){}}document.addEventListener("DOMContentLoaded",(function(){try{scrollNav(),botonTop(),headerFijo(),carga()}catch(e){}}));const validarFormulario=e=>{switch(e.target.name){case"nombre":validarCampo(expresiones.nombre,e.target,"nombre");break;case"correo":validarCampo(expresiones.correo,e.target,"correo");break;case"telefono":validarCampo(expresiones.numero,e.target,"telefono")}},validarCampo=(e,o,n)=>{const t=document.querySelector(".campo__correcto--"+n),r=document.querySelector(".campo__incorrecto--"+n),a=document.querySelector("#"+n);e.test(o.value)?(r.classList.remove("mensaje-error"),t.classList.add("mensaje-correcto"),campos[n]=!0):(t.classList.remove("mensaje-correcto"),r.classList.add("mensaje-error"),campos[n]=!1),0==a.value.length&&(t.classList.remove("mensaje-correcto"),r.classList.remove("mensaje-error"),campos[n]=!1)};function mostrarAlerta(e,o=null){const n=document.getElementById("formulario"),t=document.createElement("DIV"),r=document.createElement("P");let a;r.textContent=e,t.appendChild(r),n.appendChild(t),o?(t.classList.add("error"),a="error"):(t.classList.add("mensaje"),document.querySelectorAll(".campos-validacion span").forEach(e=>{e.classList.remove("mensaje-correcto")}),a="mensaje"),setTimeout(()=>{t.remove(a)},3e3);document.querySelector(".boton").addEventListener("click",(function(){t.remove()}))}function scrollNav(){document.querySelectorAll(".navegacion-principal a").forEach((function(e){e.addEventListener("click",(function(e){e.preventDefault();document.querySelector(e.target.attributes.href.value).scrollIntoView({behavior:"smooth"})}))}))}function botonTop(){if(document.querySelector(".boton-Top")){const e=document.querySelector(".boton-Top"),o=document.querySelector(".boton-Top img");window.onscroll=function(){document.documentElement.scrollTop>1e3?e.classList.add("imagen-Top"):e.classList.remove("imagen-Top")},window.onload=function(){o.onclick=function(){window.scrollTo({top:0,behavior:"smooth"})}}}}
/*! modernizr 3.6.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-webp-setclasses !*/!function(e,o,n){function t(e,o){return typeof e===o}function r(e){var o=u.className,n=l._config.classPrefix||"";if(d&&(o=o.baseVal),l._config.enableJSClass){var t=new RegExp("(^|\\s)"+n+"no-js(\\s|$)");o=o.replace(t,"$1"+n+"js$2")}l._config.enableClasses&&(o+=" "+n+e.join(" "+n),d?u.className.baseVal=o:u.className=o)}function a(e,o){if("object"==typeof e)for(var n in e)A(e,n)&&a(n,e[n]);else{var t=(e=e.toLowerCase()).split("."),s=l[t[0]];if(2==t.length&&(s=s[t[1]]),void 0!==s)return l;o="function"==typeof o?o():o,1==t.length?l[t[0]]=o:(!l[t[0]]||l[t[0]]instanceof Boolean||(l[t[0]]=new Boolean(l[t[0]])),l[t[0]][t[1]]=o),r([(o&&0!=o?"":"no-")+t.join("-")]),l._trigger(e,o)}return l}var s=[],c=[],i={_version:"3.6.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,o){var n=this;setTimeout((function(){o(n[e])}),0)},addTest:function(e,o,n){c.push({name:e,fn:o,options:n})},addAsyncTest:function(e){c.push({name:null,fn:e})}},l=function(){};l.prototype=i,l=new l;var A,u=o.documentElement,d="svg"===u.nodeName.toLowerCase();!function(){var e={}.hasOwnProperty;A=t(e,"undefined")||t(e.call,"undefined")?function(e,o){return o in e&&t(e.constructor.prototype[o],"undefined")}:function(o,n){return e.call(o,n)}}(),i._l={},i.on=function(e,o){this._l[e]||(this._l[e]=[]),this._l[e].push(o),l.hasOwnProperty(e)&&setTimeout((function(){l._trigger(e,l[e])}),0)},i._trigger=function(e,o){if(this._l[e]){var n=this._l[e];setTimeout((function(){var e;for(e=0;e<n.length;e++)(0,n[e])(o)}),0),delete this._l[e]}},l._q.push((function(){i.addTest=a})),l.addAsyncTest((function(){function e(e,o,n){function t(o){var t=!(!o||"load"!==o.type)&&1==r.width;a(e,"webp"===e&&t?new Boolean(t):t),n&&n(o)}var r=new Image;r.onerror=t,r.onload=t,r.src=o}var o=[{uri:"data:image/webp;base64,UklGRiQAAABXRUJQVlA4IBgAAAAwAQCdASoBAAEAAwA0JaQAA3AA/vuUAAA=",name:"webp"},{uri:"data:image/webp;base64,UklGRkoAAABXRUJQVlA4WAoAAAAQAAAAAAAAAAAAQUxQSAwAAAABBxAR/Q9ERP8DAABWUDggGAAAADABAJ0BKgEAAQADADQlpAADcAD++/1QAA==",name:"webp.alpha"},{uri:"data:image/webp;base64,UklGRlIAAABXRUJQVlA4WAoAAAASAAAAAAAAAAAAQU5JTQYAAAD/////AABBTk1GJgAAAAAAAAAAAAAAAAAAAGQAAABWUDhMDQAAAC8AAAAQBxAREYiI/gcA",name:"webp.animation"},{uri:"data:image/webp;base64,UklGRh4AAABXRUJQVlA4TBEAAAAvAAAAAAfQ//73v/+BiOh/AAA=",name:"webp.lossless"}],n=o.shift();e(n.name,n.uri,(function(n){if(n&&"load"===n.type)for(var t=0;t<o.length;t++)e(o[t].name,o[t].uri)}))})),function(){var e,o,n,r,a,i;for(var A in c)if(c.hasOwnProperty(A)){if(e=[],(o=c[A]).name&&(e.push(o.name.toLowerCase()),o.options&&o.options.aliases&&o.options.aliases.length))for(n=0;n<o.options.aliases.length;n++)e.push(o.options.aliases[n].toLowerCase());for(r=t(o.fn,"function")?o.fn():o.fn,a=0;a<e.length;a++)1===(i=e[a].split(".")).length?l[i[0]]=r:(!l[i[0]]||l[i[0]]instanceof Boolean||(l[i[0]]=new Boolean(l[i[0]])),l[i[0]][i[1]]=r),s.push((r?"":"no-")+i.join("-"))}}(),r(s),delete i.addTest,delete i.addAsyncTest;for(var m=0;m<l._q.length;m++)l._q[m]();e.Modernizr=l}(window,document);