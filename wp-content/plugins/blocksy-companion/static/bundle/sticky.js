!function(t){var e={};function r(n){if(e[n])return e[n].exports;var i=e[n]={i:n,l:!1,exports:{}};return t[n].call(i.exports,i,i.exports,r),i.l=!0,i.exports}r.m=t,r.c=e,r.d=function(t,e,n){r.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},r.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},r.t=function(t,e){if(1&e&&(t=r(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(r.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var i in t)r.d(n,i,function(e){return t[e]}.bind(null,i));return n},r.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return r.d(e,"a",e),e},r.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},r.p="",r(r.s=2)}([function(t,e){t.exports=window.ctEvents},function(t,e){t.exports=window.ctFrontend},function(t,e,r){"use strict";r.r(e);var n=r(0),i=r.n(n),o=r(1),a=function(t,e,r){return Math.max(t,Math.min(e,r))},c=function(t,e,r){return e[0]+(e[1]-e[0])/(t[1]-t[0])*(r-t[0])},s=function(t){if(t.blcInitialHeight)return t.blcInitialHeight;var e=t.firstElementChild.firstElementChild.getBoundingClientRect().height;return t.blcInitialHeight=e,e},u=function(t){var e=getComputedStyle(t),r=100;"middle"===t.dataset.row&&(r=e.getPropertyValue("--sticky-shrink"));var n=s(t);return r&&(n*=parseFloat(r)/100),n};function l(t){return function(t){if(Array.isArray(t))return d(t)}(t)||function(t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(t))return Array.from(t)}(t)||function(t,e){if(!t)return;if("string"==typeof t)return d(t,e);var r=Object.prototype.toString.call(t).slice(8,-1);"Object"===r&&t.constructor&&(r=t.constructor.name);if("Map"===r||"Set"===r)return Array.from(t);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return d(t,e)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function d(t,e){(null==e||e>t.length)&&(e=t.length);for(var r=0,n=new Array(e);r<e;r++)n[r]=t[r];return n}var y=null,f=function(t){var e=t.stickyContainer,r=t.startPosition;l(e.querySelectorAll('[data-row*="middle"]')).map((function(t){if(t.querySelector('[data-id="logo"] .site-logo-container')){var e=t.querySelector('[data-id="logo"] .site-logo-container'),n=function(t){var e=t.logo,r=t.row;if(y)return y;var n=parseFloat(getComputedStyle(e).getPropertyValue("--logo-max-height")||50),i=parseFloat(getComputedStyle(e).getPropertyValue("--logo-sticky-shrink").toString().replace(",",".")||1),o=s(r),a=u(r);return y={initialHeight:n,stickyShrink:i,rowInitialHeight:o,rowStickyHeight:a}}({logo:e,row:t}),i=n.initialHeight,o=n.stickyShrink,l=n.rowInitialHeight,d=n.rowStickyHeight,f=i*o;1!==o&&e.style.setProperty("--logo-shrink-height","".concat(c([r,r+Math.abs(l===d?i-f:l-d)],[1,o],a(r,r+Math.abs(l===d?i-f:l-d),scrollY))*i,"px"))}}))},m=null,h=function(t){var e=t.stickyContainer,r=(t.containerInitialHeight,t.startPosition);e.querySelector('[data-row*="middle"]')&&[e.querySelector('[data-row*="middle"]')].map((function(t){var e=function(t){var e=t.row;if(m)return m;var r=s(e),n=u(e);return m={rowInitialHeight:r,rowStickyHeight:n}}({row:t}),n=e.rowInitialHeight,i=e.rowStickyHeight;n!==i&&t.style.setProperty("--shrink-height","".concat(c([r,r+Math.abs(n-i)],[n,i],a(r,r+Math.abs(n-i),scrollY)),"px"))}))};function p(t){return function(t){if(Array.isArray(t))return g(t)}(t)||function(t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(t))return Array.from(t)}(t)||function(t,e){if(!t)return;if("string"==typeof t)return g(t,e);var r=Object.prototype.toString.call(t).slice(8,-1);"Object"===r&&t.constructor&&(r=t.constructor.name);if("Map"===r||"Set"===r)return Array.from(t);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return g(t,e)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function g(t,e){(null==e||e>t.length)&&(e=t.length);for(var r=0,n=new Array(e);r<e;r++)n[r]=t[r];return n}function b(t){return function(t){if(Array.isArray(t))return k(t)}(t)||function(t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(t))return Array.from(t)}(t)||function(t,e){if(!t)return;if("string"==typeof t)return k(t,e);var r=Object.prototype.toString.call(t).slice(8,-1);"Object"===r&&t.constructor&&(r=t.constructor.name);if("Map"===r||"Set"===r)return Array.from(t);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return k(t,e)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function k(t,e){(null==e||e>t.length)&&(e=t.length);for(var r=0,n=new Array(e);r<e;r++)n[r]=t[r];return n}var w=window.scrollY;function v(t){return function(t){if(Array.isArray(t))return A(t)}(t)||function(t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(t))return Array.from(t)}(t)||function(t,e){if(!t)return;if("string"==typeof t)return A(t,e);var r=Object.prototype.toString.call(t).slice(8,-1);"Object"===r&&t.constructor&&(r=t.constructor.name);if("Map"===r||"Set"===r)return Array.from(t);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return A(t,e)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function A(t,e){(null==e||e>t.length)&&(e=t.length);for(var r=0,n=new Array(e);r<e;r++)n[r]=t[r];return n}function S(t){return function(t){if(Array.isArray(t))return O(t)}(t)||function(t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(t))return Array.from(t)}(t)||function(t,e){if(!t)return;if("string"==typeof t)return O(t,e);var r=Object.prototype.toString.call(t).slice(8,-1);"Object"===r&&t.constructor&&(r=t.constructor.name);if("Map"===r||"Set"===r)return Array.from(t);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return O(t,e)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function O(t,e){(null==e||e>t.length)&&(e=t.length);for(var r=0,n=new Array(e);r<e;r++)n[r]=t[r];return n}var j=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"yes";Array.from(t.querySelectorAll("[data-row][data-transparent-row]")).map((function(t){t.dataset.transparentRow=e}))},x=null,C=null,I=null;i.a.on("ct:header:update",(function(){x=null,C=null,I=null,q()}));var P=function(t){if(-1===t.dataset.sticky.indexOf("shrink")&&-1===t.dataset.sticky.indexOf("auto-hide"))return t.parentNode.getBoundingClientRect().height+200;var e=t.closest("header").getBoundingClientRect().top+scrollY;if(e>0){var r=document.elementFromPoint(0,3);r&&function(t){for(var e=[];t&&t!==document;t=t.parentNode)e.push(t);return e}(r).map((function(t){return getComputedStyle(t).position})).indexOf("fixed")>-1&&(e-=r.getBoundingClientRect().height)}var n=t.parentNode;return 1===n.parentNode.children.length||n.parentNode.children[0].classList.contains("ct-sticky-container")?e:Array.from(n.parentNode.children).reduce((function(t,e,r){return t.indexOf(0)>-1||!e.dataset.row?[].concat(S(t),[0]):[].concat(S(t),[e.classList.contains("ct-sticky-container")?0:e.getBoundingClientRect().height])}),[]).reduce((function(t,e){return t+e}),e)},Y=null,q=function(){if(Y!==scrollY){Y=scrollY;var t=document.querySelector('[data-device="'.concat(Object(o.getCurrentScreen)(),'"] [data-sticky]'));if(t){var e=x;null===e&&(e=P(t),x=e);var r=I;r||(r=parseInt(t.getBoundingClientRect().height),I=parseInt(r),document.body.style.setProperty("--header-sticky-height-animated","".concat(S(t.querySelectorAll("[data-row]")).reduce((function(t,e){return t+u(e)}),0),"px")));var n=t.dataset.sticky.split(":").filter((function(t){return"yes"!==t&&"no"!==t&&"fixed"!==t})),i=e>0&&Math.abs(window.scrollY-e)<5||window.scrollY>e;n.indexOf("shrink")>-1&&(i=e>0?window.scrollY>=e:window.scrollY>0),setTimeout((function(){i&&-1===document.body.dataset.header.indexOf("shrink")&&(document.body.dataset.header="".concat(document.body.dataset.header,":shrink")),!i&&document.body.dataset.header.indexOf("shrink")>-1&&(document.body.dataset.header=document.body.dataset.header.replace(":shrink",""))}),300);var a=C;a||(a=C=Array.from(t.querySelectorAll("[data-row]")).reduce((function(t,e){return t+e.getBoundingClientRect().height}),0),t.parentNode.style.height="".concat(a,"px")),n.indexOf("shrink")>-1&&function(t){var e=t.containerInitialHeight,r=t.stickyContainer,n=(t.stickyContainerHeight,t.isSticky),i=t.startPosition,o=t.stickyComponents;if(0===i&&0===window.scrollY&&(r.dataset.sticky=["fixed"].concat(p(o)).join(":")),n){if(o.indexOf("yes")>-1)return;-1===r.dataset.sticky.indexOf("yes")&&(j(r,"no"),r.dataset.sticky=["yes"].concat(p(o)).join(":")),f({stickyContainer:r,startPosition:i}),h({stickyContainer:r,containerInitialHeight:e,startPosition:i})}else Array.from(r.querySelectorAll("[data-row]")).map((function(t){return t.removeAttribute("style")})),Array.from(r.querySelectorAll('[data-row*="middle"] .site-logo-container')).map((function(t){return t.removeAttribute("style")})),j(r,"yes"),0===i&&0===window.scrollY?r.dataset.sticky=["fixed"].concat(p(o)).join(":"):r.dataset.sticky=o.join(":")}({stickyContainer:t,stickyContainerHeight:r,containerInitialHeight:a,isSticky:i,startPosition:e,stickyComponents:n}),n.indexOf("auto-hide")>-1&&function(t){var e=t.startPosition,r=t.stickyContainer,n=t.isSticky,i=t.stickyComponents;if(window.scrollY<e&&(w=window.scrollY),n&&window.scrollY-w==0&&document.body.style.setProperty("--header-sticky-height-animated","0px"),n&&window.scrollY-w<-5)-1===r.dataset.sticky.indexOf("yes")&&(r.dataset.sticky=["yes-start"].concat(b(i)).join(":"),requestAnimationFrame((function(){r.dataset.sticky=r.dataset.sticky.replace("yes-start","yes-end"),setTimeout((function(){r.dataset.sticky=r.dataset.sticky.replace("yes-end","yes")}),200)}))),j(r,"no"),document.body.removeAttribute("style");else{if(!n)return r.dataset.sticky=i.filter((function(t){return"yes-end"!==t})).join(":"),Array.from(r.querySelectorAll("[data-row]")).map((function(t){return t.removeAttribute("style")})),j(r,"yes"),document.body.style.setProperty("--header-sticky-height-animated","0px"),void(w=window.scrollY);-1===r.dataset.sticky.indexOf("yes-hide")&&r.dataset.sticky.indexOf("yes:")>-1&&window.scrollY-w>5&&(r.dataset.sticky=["yes-hide-start"].concat(b(i)).join(":"),document.body.style.setProperty("--header-sticky-height-animated","0px"),requestAnimationFrame((function(){r.dataset.sticky=r.dataset.sticky.replace("yes-hide-start","yes-hide-end"),setTimeout((function(){r.dataset.sticky=i.join(":"),Array.from(r.querySelectorAll("[data-row]")).map((function(t){return t.removeAttribute("style")})),j(r,"yes")}),200)})))}w=window.scrollY}({stickyContainer:t,isSticky:i,startPosition:e,stickyComponents:n}),(n.indexOf("slide")>-1||n.indexOf("fade")>-1)&&function(t){var e=t.stickyContainer,r=t.isSticky,n=t.startPosition,i=t.stickyComponents;r?(-1===e.dataset.sticky.indexOf("yes")&&(e.dataset.sticky=["yes-start"].concat(v(i)).join(":"),setTimeout((function(){e.dataset.sticky=e.dataset.sticky.replace("yes-start","yes-end"),setTimeout((function(){e.dataset.sticky=e.dataset.sticky.replace("yes-end","yes")}),200)}),1)),j(e,"no")):-1===e.dataset.sticky.indexOf("yes-hide")&&e.dataset.sticky.indexOf("yes:")>-1&&(Math.abs(window.scrollY-n)>10?(e.dataset.sticky=i.join(":"),setTimeout((function(){Array.from(e.querySelectorAll("[data-row]")).map((function(t){return t.removeAttribute("style")}))}),300),j(e,"yes")):(e.dataset.sticky=["yes-hide-start"].concat(v(i)).join(":"),requestAnimationFrame((function(){e.dataset.sticky=e.dataset.sticky.replace("yes-hide-start","yes-hide-end"),setTimeout((function(){e.dataset.sticky=i.join(":"),setTimeout((function(){Array.from(e.querySelectorAll("[data-row]")).map((function(t){return t.removeAttribute("style")}))}),300),j(e,"yes")}),200)}))))}({stickyContainer:t,isSticky:i,startPosition:e,stickyComponents:n})}}},H=function(){document.querySelector("header [data-sticky]")&&(window.addEventListener("resize",(function(t){q(t),i.a.trigger("ct:header:update")}),!1),window.addEventListener("orientationchange",(function(t){q(t),i.a.trigger("ct:header:update")})),window.addEventListener("scroll",q,!1),window.addEventListener("load",q,!1),q())};document.body.className.indexOf("e-preview")>-1?setTimeout((function(){H()}),500):H(),Object(o.registerDynamicChunk)("blocksy_sticky_header",{mount:function(t){}})}]);