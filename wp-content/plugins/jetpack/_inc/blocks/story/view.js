/*! For license information please see view.js.LICENSE.txt */
!function(){var e={29183:function(e){function t(){return e.exports=t=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(e[r]=n[r])}return e},e.exports.default=e.exports,e.exports.__esModule=!0,t.apply(this,arguments)}e.exports=t,e.exports.default=e.exports,e.exports.__esModule=!0},89105:function(e,t){var n;!function(){"use strict";var r={}.hasOwnProperty;function l(){for(var e=[],t=0;t<arguments.length;t++){var n=arguments[t];if(n){var s=typeof n;if("string"===s||"number"===s)e.push(n);else if(Array.isArray(n)){if(n.length){var i=l.apply(null,n);i&&e.push(i)}}else if("object"===s)if(n.toString===Object.prototype.toString)for(var u in n)r.call(n,u)&&n[u]&&e.push(u);else e.push(n.toString())}}return e.join(" ")}e.exports?(l.default=l,e.exports=l):void 0===(n=function(){return l}.apply(t,[]))||(e.exports=n)}()},2601:function(e){"use strict";function t(e,n){var r;if(Array.isArray(n))for(r=0;r<n.length;r++)t(e,n[r]);else for(r in n)e[r]=(e[r]||[]).concat(n[r])}e.exports=function(e){var n,r={};return t(r,e),(n=function(e){return function(t){return function(n){var l,s,i=r[n.type],u=t(n);if(i)for(l=0;l<i.length;l++)(s=i[l](n,e))&&e.dispatch(s);return u}}}).effects=r,n}},96178:function(e,t,n){"use strict";var r=n(69307),l=n(55609);const s=(0,n(41632).Z)((0,r.createElement)(l.G,null,(0,r.createElement)(l.Path,{d:"M17 5a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2h9z"}),(0,r.createElement)(l.Path,{d:"M13 4H5a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2z"}),(0,r.createElement)(l.Path,{d:"M7 16h8a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z"})));t.Z=s},18754:function(e,t,n){"use strict";n.d(t,{Z:function(){return s}});var r=n(69307),l=n(55609);function s(e){let{currentMedia:t}=e;const n=t&&"image"===t.type?t.url:null;return(0,r.createElement)("div",{className:"wp-story-background"},(0,r.createElement)("div",{className:"wp-story-background-image",style:{backgroundImage:n?`url("${n}")`:"none"}}),(0,r.createElement)("div",{className:"wp-story-background-blur"}),(0,r.createElement)(l.SVG,{version:"1.1",xmlns:"http://www.w3.org/2000/svg",width:"0",height:"0"},(0,r.createElement)("filter",{id:"gaussian-blur-18"},(0,r.createElement)("feGaussianBlur",{stdDeviation:"18"}))))}},85974:function(e,t,n){"use strict";n.d(t,{Z:function(){return o}});var r=n(69307),l=n(89105),s=n.n(l),i=n(65736),u=n(55609);const __=i.__;function o(e){let{isEllipsis:t,disabled:n,index:l,isSelected:o,progress:c,onClick:a}=e;const d=n||t;let p=null;return t||(p=o?(0,i.sprintf)(
/* translators: %d: Slide number. */
__("Slide %d, currently selected","jetpack"),l+1):(0,i.sprintf)(
/* translators: %d: Slide number. */
__("Go to slide %d","jetpack"),l+1)),(0,r.createElement)(u.Button,{role:d?"presentation":"tab",key:l,className:s()("wp-story-pagination-bullet",{"wp-story-pagination-ellipsis":t}),"aria-label":p,"aria-disabled":d||o,onClick:d||o?void 0:a,disabled:d},(0,r.createElement)("div",{className:"wp-story-pagination-bullet-bar"},(0,r.createElement)("div",{className:"wp-story-pagination-bullet-bar-progress",style:{width:`${c}%`}})))}},9610:function(e,t,n){"use strict";n.d(t,{b:function(){return o},r:function(){return c}});var r=n(29183),l=n.n(r),s=n(69307),i=n(89105),u=n.n(i);const o=e=>{let{className:t,size:n,label:r,isPressed:i,...o}=e;return(0,s.createElement)("button",l()({type:"button","aria-label":r,"aria-pressed":i,className:u()("jetpack-mdc-icon-button","circle-icon","outlined","bordered",t),style:{width:`${n}px`,height:`${n}px`}},o))},c=e=>{let{className:t,size:n=24,label:r,isPressed:i,...o}=e;return(0,s.createElement)("button",l()({type:"button","aria-label":r,"aria-pressed":i,className:u()("jetpack-mdc-icon-button",t),style:{width:`${n}px`,height:`${n}px`}},o))}},1019:function(e,t,n){"use strict";var r=n(69307);t.Z=()=>(0,r.createElement)("div",{className:"wp-story-loading-spinner"},(0,r.createElement)("div",{className:"wp-story-loading-spinner__outer"},(0,r.createElement)("div",{className:"wp-story-loading-spinner__inner"})))},50281:function(e,t,n){"use strict";n.d(t,{Z:function(){return u}});var r=n(69307),l=n(65736),s=n(9610),i=n(29089);const _x=l._x;function u(e){let{playing:t,muted:n,onPlayPressed:l,onMutePressed:u,showMute:o}=e;return(0,r.createElement)("div",{className:"wp-story-controls"},(0,r.createElement)(s.r,{isPressed:t,label:t?_x("pause","Button tooltip text","jetpack"):_x("play","Button tooltip text","jetpack",0),onClick:l},t?(0,r.createElement)(i.fp,null):(0,r.createElement)(i.o1,null)),o&&(0,r.createElement)(s.r,{isPressed:n,label:n?_x("unmute","Button tooltip text","jetpack"):_x("mute","Button tooltip text","jetpack",0),onClick:u},n?(0,r.createElement)(i.xb,null):(0,r.createElement)(i.MC,null)))}},40220:function(e,t,n){"use strict";n.d(t,{Z:function(){return u}});var r=n(69307),l=n(65736),s=n(9610),i=n(29089);const __=l.__;function u(e){let{fullscreen:t,onExitFullscreen:n,siteIconUrl:l,storyTitle:u}=e;return t?(0,r.createElement)("div",{className:"wp-story-meta"},(0,r.createElement)("div",{className:"wp-story-icon"},(0,r.createElement)("img",{alt:__("Site icon","jetpack"),src:l,width:"40",height:"40"})),(0,r.createElement)("div",null,(0,r.createElement)("div",{className:"wp-story-title"},u)),(0,r.createElement)(s.r,{className:"wp-story-exit-fullscreen",label:__("Exit Fullscreen","jetpack"),onClick:n},(0,r.createElement)(i.Tw,null))):null}},29089:function(e,t,n){"use strict";n.d(t,{o1:function(){return u},fp:function(){return o},Tw:function(){return c},MC:function(){return a},xb:function(){return d},JM:function(){return p},Vq:function(){return f}});var r=n(69307),l=n(55609),s=n(41632);const i=e=>{let{children:t,size:n}=e;return(0,s.Z)(t,n,n)},u=e=>{let{size:t}=e;return(0,r.createElement)(i,{size:t},(0,r.createElement)(l.Path,{d:"M8 5v14l11-7z"}))},o=e=>{let{size:t}=e;return(0,r.createElement)(i,{size:t},(0,r.createElement)(l.Path,{d:"M6 19h4V5H6v14zm8-14v14h4V5h-4z"}))},c=e=>{let{size:t}=e;return(0,r.createElement)(i,{size:t},(0,r.createElement)(l.Path,{d:"M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"}))},a=e=>{let{size:t}=e;return(0,r.createElement)(i,{size:t},(0,r.createElement)(l.Path,{d:"M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"}))},d=e=>{let{size:t}=e;return(0,r.createElement)(i,{size:t},(0,r.createElement)(l.Path,{d:"M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z"}))},p=e=>{let{size:t}=e;return(0,r.createElement)(i,{size:t},(0,r.createElement)(l.Path,{d:"M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"}))},f=e=>{let{size:t}=e;return(0,r.createElement)(i,{size:t},(0,r.createElement)(l.Path,{d:"M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"}))}},27870:function(e,t,n){"use strict";n.d(t,{gT:function(){return r.Z},ZX:function(){return l.Z},h4:function(){return s.Z},aV:function(){return i.Z},Aq:function(){return u.Z},WB:function(){return o.Z},pU:function(){return c.pU}});var r=n(85974),l=n(50281),s=n(40220),i=n(46531),u=n(18754),o=n(1019),c=n(64816);n(9610)},64816:function(e,t,n){"use strict";n.d(t,{pU:function(){return a}});var r=n(29183),l=n.n(r),s=n(69307),i=n(89105),u=n.n(i);const o=e=>{let{title:t,alt:n,className:r,id:l,mediaRef:i,mime:o,sizes:c,srcset:a,url:d}=e;return(0,s.createElement)("img",{ref:i,"data-id":l,"data-mime":o,title:t,alt:n,src:d,className:u()("wp-story-image",`wp-image-${l}`,r),srcSet:a,sizes:c})},c=e=>{let{title:t,className:n,id:r,mediaRef:l,mime:i,url:o,poster:c}=e;return(0,s.createElement)("video",{className:u()("wp-story-video","intrinsic-ignore",`wp-video-${r}`,n),ref:l,"data-id":r,title:t,type:i,src:o,poster:c,tabIndex:-1,preload:"auto",playsInline:!0})},a=e=>{let{targetAspectRatio:t,cropUpTo:n,type:r,width:i,height:u,...a}=e,d=null;if(i&&u){const e=i/u;if(e>=t){e>t/(1-n)||(d="wp-story-crop-wide")}else{e<t*(1-n)||(d="wp-story-crop-narrow")}}const p="video"===r||(a.mime||"").startsWith("video/");return(0,s.createElement)("figure",null,p?(0,s.createElement)(c,l()({},a,{className:d})):(0,s.createElement)(o,l()({},a,{className:d})))}},46531:function(e,t,n){"use strict";n.d(t,{Z:function(){return c}});var r=n(69307),l=n(48735),s=n.n(l),i=n(65736),u=n(9610),o=n(29089);const __=i.__;function c(e){let{ended:t,hasPrevious:n,onNextSlide:l,onPreviousSlide:c,icon:a,slideCount:d,showSlideCount:p}=e;const f=(0,r.useCallback)((e=>{t||(e.stopPropagation(),c())}),[c,t]),m=(0,r.useCallback)((e=>{t||(e.stopPropagation(),l())}),[l,t]);return(0,r.createElement)("div",{className:"wp-story-overlay"},p&&(0,r.createElement)("div",{className:"wp-story-embed-icon"},a,(0,r.createElement)("span",null,d)),!p&&(0,r.createElement)("div",{className:"wp-story-embed-icon-expand"},(0,r.createElement)(s(),{role:"img"})),n&&(0,r.createElement)("div",{className:"wp-story-prev-slide",onClick:f},(0,r.createElement)(u.b,{size:44,label:__("Previous Slide","jetpack"),className:"outlined-w"},(0,i.isRTL)()?(0,r.createElement)(o.Vq,{size:24}):(0,r.createElement)(o.JM,{size:24}))),(0,r.createElement)("div",{className:"wp-story-next-slide",onClick:m},(0,r.createElement)(u.b,{size:44,label:__("Next Slide","jetpack"),className:"outlined-w"},(0,i.isRTL)()?(0,r.createElement)(o.JM,{size:24}):(0,r.createElement)(o.Vq,{size:24}))))}},58871:function(e,t,n){"use strict";n.d(t,{Z:function(){return a}});var r=n(69307),l=n(89105),s=n.n(l),i=n(31158),u=n(29891),o=n(72096);const c=/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(window.navigator.userAgent);function a(e){let{className:t,fullscreenClassName:n,bodyFullscreenClassName:l,fullscreen:a,shadowDOM:d,onKeyDown:p,onExitFullscreen:f,playerQuerySelector:m,children:g}=e;const y=(0,r.useRef)(),E=(0,r.useRef)(),[h,S]=(0,r.useState)(null),w=c&&u.am(),v=a&&!w,b=a&&w;return(0,r.useLayoutEffect)((()=>{if(w)a?y.current&&u.uP(y.current,f):u.bG()&&u.JF();else if(a){if(S([document.documentElement.scrollLeft,document.documentElement.scrollTop]),document.body.classList.add(l),document.getElementsByTagName("html")[0].classList.add(l),E.current){const e=E.current.querySelector(m);e&&e.focus()}}else if(document.body.classList.remove(l),document.getElementsByTagName("html")[0].classList.remove(l),h){window.scrollTo(...h);const e=y.current.querySelector(m);e&&e.focus()}}),[a]),(0,r.createElement)(r.Fragment,null,(0,r.createElement)(i.Z,d,(0,r.createElement)("div",{ref:y,className:s()(t,{[n]:b}),onKeyDown:p},!v&&g)),(0,r.createElement)(o.Z,{className:s()(t,{[n]:v}),isOpened:v,onRequestClose:f,shadowDOM:d,onKeyDown:v&&p,focusOnMount:!1,modalRef:E},v&&g))}},4045:function(e,t,n){"use strict";n.d(t,{Z:function(){return o}});var r=n(69307),l=n(9818),s=n(39630),i=(n(66930),n(54616)),u=n(58871);function o(e){let{id:t,slides:n,metadata:o,disabled:c,...a}=e;const d=(0,r.useMemo)((()=>t||Math.random().toString(36)),[t]),{init:p,setEnded:f,setPlaying:m,setFullscreen:g,showSlide:y}=(0,l.useDispatch)("jetpack/story/player"),{playing:E,currentSlideIndex:h,fullscreen:S,isReady:w,playerSettings:v}=(0,l.useSelect)((e=>{const{getCurrentSlideIndex:t,getSettings:n,isFullscreen:r,isPlayerReady:l,isPlaying:s}=e("jetpack/story/player");return l(d)?{playing:s(d),currentSlideIndex:t(d),isReady:!0,fullscreen:r(d),playerSettings:n(d)}:{isReady:!1}}),[d]);(0,r.useEffect)((()=>{w||p(d,{slideCount:n.length,...a})}),[w,d]);const b=(0,r.useCallback)((e=>{switch(e.keyCode){case s.ENTER:if(S)break;case s.SPACE:m(d,!E);break;case s.LEFT:h>0&&y(d,h-1);break;case s.RIGHT:h<n.length-1?y(d,h+1):f(d)}}),[d,h,S,E]),x=(0,r.useCallback)((()=>{g(d,!1)}),[d]);return w?(0,r.createElement)(u.Z,{shadowDOM:v.shadowDOM,className:"wp-story-app",fullscreenClassName:"wp-story-fullscreen",bodyFullscreenClassName:"wp-story-in-fullscreen",playerQuerySelector:".wp-story-container",fullscreen:S,onExitFullscreen:x,onKeyDown:b},(0,r.createElement)(i.Z,{id:d,slides:n,metadata:o,disabled:c})):null}},29891:function(e,t,n){"use strict";n.d(t,{am:function(){return r},bG:function(){return l},uP:function(){return s},JF:function(){return i}});const r=()=>document.fullscreenEnabled||document.webkitFullscreenEnabled||document.mozFullScreenEnabled||document.msFullscreenEnabled,l=()=>document.fullscreenElement||document.webkitFullscreenElement||document.mozFullScreenElement||document.msFullScreenElement,s=(e,t)=>{if((e.requestFullscreen||e.webkitRequestFullScreen||e.mozRequestFullScreen||e.msRequestFullscreen).call(e),t){const e=()=>{document.fullscreenElement||(document.removeEventListener("fullscreenchange",e),t())};document.addEventListener("fullscreenchange",e)}},i=()=>(document.exitFullscreen||document.webkitExitFullscreen||document.mozCancelFullScreen||document.msExitFullscreen).call(document)},31158:function(e,t,n){"use strict";n.d(t,{Z:function(){return s}});var r=n(69307);const l=window&&window.Element&&window.Element.prototype.hasOwnProperty("attachShadow");function s(e){let{enabled:t,delegatesFocus:n=!1,mode:s="open",globalStyleElements:u=[],adoptedStyleSheets:o=null,mountOnElement:c=null,children:a}=e;const[d,p]=(0,r.useState)(null),f=c||d,[m,g]=(0,r.useState)(null),y="string"==typeof u?[...document.querySelectorAll(u)]:u,E=l&&t&&y.length>0,h=(0,r.useCallback)((e=>{null!==e&&p(e.parentNode)}),[]);if((0,r.useEffect)((()=>{if(!f)return;if(f.shadowRoot)return void g(f.shadowRoot);const e=f.attachShadow({delegatesFocus:n,mode:s});o&&(e.adoptedStyleSheets=o),g(e)}),[f]),E&&!m)return c?null:(0,r.createElement)("span",{ref:h});const S=(0,r.createElement)(r.Fragment,null,E&&(0,r.createElement)(i,{globalStyleElements:y}),a);return E?(0,r.createPortal)(S,m):S}function i(e){let{globalStyleElements:t}=e;return(0,r.createElement)(r.Fragment,null,t.map(((e,t)=>{let{id:n,tagName:l,attributes:s,innerHTML:i}=e;return"LINK"===l?(0,r.createElement)("link",{key:n||t,id:n,rel:s.rel.value,href:s.href.value}):"STYLE"===l?(0,r.createElement)("style",{key:n||t,id:n},i):void 0})))}},94292:function(e,t,n){"use strict";var r=n(69307);t.Z=e=>{const t=(0,r.useRef)(),n=(0,r.useRef)(),l=(0,r.useRef)(e),s=(0,r.useCallback)((e=>{e.touches&&1===e.touches.length&&e.preventDefault()}),[]);return(0,r.useEffect)((()=>{l.current=e}),[e]),{onTouchStart:(0,r.useCallback)((e=>{e.target&&(e.target.addEventListener("touchend",s,{passive:!1}),n.current=e.target),t.current=setTimeout((()=>{l.current&&l.current(!0),t.current=null}),200)}),[]),onTouchEnd:(0,r.useCallback)((e=>{t.current?clearTimeout(t.current):(l.current&&l.current(!1),e.stopPropagation()),n.current&&n.current.removeEventListener("touchend",s)}),[])}}},21531:function(e,t,n){"use strict";n.d(t,{Z:function(){return l}});var r=n(69307);function l(e){const t=(0,r.useRef)(null),n=(0,r.useRef)(!1),l=(0,r.useRef)(e),s=(0,r.useRef)(e);return s.current=e,(0,r.useLayoutEffect)((()=>{e.forEach(((e,r)=>{const s=l.current[r];"function"==typeof e&&e!==s&&!1===n.current&&(s(null),e(t.current))})),l.current=e}),e),(0,r.useLayoutEffect)((()=>{n.current=!1})),(0,r.useCallback)((e=>{t.current=e,n.current=!0;(e?s.current:l.current).forEach((t=>{"function"==typeof t?t(e):t&&t.hasOwnProperty("current")&&(t.current=e)}))}),[])}},97524:function(e,t,n){"use strict";async function r(e){const t=e.tagName.toLowerCase();if("img"===t){if(e.complete)return;await new Promise((t=>{e.addEventListener("load",t,{once:!0})}))}else if("video"===t||"audio"===t){if(e.HAVE_ENOUGH_DATA===e.readyState)return;await new Promise((t=>{e.addEventListener("canplaythrough",t,{once:!0}),e.addEventListener("load",t,{once:!0}),e.HAVE_NOTHING===e.readyState&&e.networkState!==e.NETWORK_LOADING&&e.load()}))}}n.d(t,{Z:function(){return r}})},82295:function(e,t,n){"use strict";n.d(t,{BM:function(){return u},i1:function(){return o}});var r=n(92819);const l=new Set(["alert","status","log","marquee","timer"]);let s=[],i=!1;function u(e){if(i)return;const t=document.body.children;(0,r.forEach)(t,(t=>{t!==e&&function(e){const t=e.getAttribute("role");return!("SCRIPT"===e.tagName||e.hasAttribute("aria-hidden")||e.hasAttribute("aria-live")||l.has(t))}(t)&&(t.setAttribute("aria-hidden","true"),s.push(t))})),i=!0}function o(){i&&((0,r.forEach)(s,(e=>{e.removeAttribute("aria-hidden")})),s=[],i=!1)}},97790:function(e,t,n){"use strict";n.d(t,{Z:function(){return u}});var r=n(69307),l=n(39630),s=n(94333),i=n(21531);function u(e){let{overlayClassName:t,children:n,className:u,focusOnMount:o,shouldCloseOnEsc:c=!0,onRequestClose:a,onKeyDown:d,modalRef:p}=e;const f=(0,s.useFocusOnMount)(o),m=(0,s.useConstrainedTabbing)(),g=(0,s.useFocusReturn)();return(0,r.createElement)("div",{className:t,onKeyDown:function(e){c&&e.keyCode===l.ESCAPE&&(e.stopPropagation(),a&&a(e)),e.target&&"button"===e.target.tagName.toLowerCase()&&e.keyCode===l.SPACE||d&&d(e)}},(0,r.createElement)("div",{className:u,ref:(0,i.Z)([m,g,f,p])},n))}},72096:function(e,t,n){"use strict";var r=n(29183),l=n.n(r),s=n(69307),i=n(94333),u=n(31158),o=n(97790),c=n(82295);let a,d=0;const p=()=>{};class f extends s.Component{constructor(e){super(e),this.prepareDOM()}componentDidMount(){d++,1===d&&this.openFirstModal()}componentWillUnmount(){d--,0===d&&this.closeLastModal(),this.cleanDOM()}prepareDOM(){a||(a=document.createElement("div"),document.body.appendChild(a)),this.node=document.createElement("div"),a.appendChild(this.node),this.node.ontouchstart=p,this.node.ontouchend=p}cleanDOM(){a.removeChild(this.node)}openFirstModal(){c.BM(a)}closeLastModal(){c.i1()}render(){const{children:e,isOpened:t,shadowDOM:n,...r}=this.props;return(0,s.createElement)(u.Z,l()({},n,{mountOnElement:this.node}),t&&(0,s.createElement)(o.Z,r,e))}}f.defaultProps={shouldCloseOnEsc:!0,isOpened:!1,focusOnMount:!0},t.Z=(0,i.withInstanceId)(f)},54616:function(e,t,n){"use strict";n.d(t,{Z:function(){return h}});var r=n(29183),l=n.n(r),s=n(69307),i=n(89105),u=n.n(i),o=n(92819),c=n(11313),a=n(94333),d=n(65736),p=n(9818),f=n(12378),m=n(96178),g=n(16019),y=n(27870),E=n(94292);const __=d.__;function h(e){let{id:t,slides:n,metadata:r,disabled:i}=e;const{setFullscreen:d,setEnded:h,setPlaying:S,setMuted:w,showSlide:v}=(0,p.useDispatch)("jetpack/story/player"),{playing:b,muted:x,currentSlideIndex:C,currentSlideEnded:k,ended:N,fullscreen:P,settings:T}=(0,p.useSelect)((e=>{const{getCurrentSlideIndex:n,getSettings:r,hasCurrentSlideEnded:l,hasEnded:s,isFullscreen:i,isMuted:u,isPlaying:o}=e("jetpack/story/player");return{playing:o(t),muted:u(t),currentSlideIndex:n(t),currentSlideEnded:l(t),ended:s(t),fullscreen:i(t),settings:r(t)}}),[t]),M=(0,s.useRef)(),[R,I]=(0,s.useState)(null),[_,{width:L,height:O}]=(0,a.useResizeObserver)(),[z,F]=(0,s.useState)(T.defaultAspectRatio),D=(0,o.some)(n,(e=>(0,c.isBlobURL)(e.url))),A=e=>{v(t,e)},Z=(0,s.useCallback)((()=>{i||P||T.playInFullscreen&&!b&&S(t,!0)}),[b,i,P]),{onTouchStart:j,onTouchEnd:B}=(0,E.Z)((e=>{S(t,!e)}),[]),U=(0,s.useCallback)((()=>{C>0&&A(C-1)}),[C]),H=(0,s.useCallback)((()=>{C<n.length-1?A(C+1):h(t)}),[C,n]),q=(0,s.useCallback)((()=>{d(t,!1)}),[]);let G,V;return(0,s.useEffect)((()=>{i&&b&&S(t,!1)}),[i,b]),(0,s.useEffect)((()=>{b&&k&&H()}),[b,k]),(0,s.useLayoutEffect)((()=>{if(!M.current)return;let e=Math.round(T.defaultAspectRatio*M.current.offsetHeight);P&&(e=Math.abs(1-e/L)<T.cropUpTo?L:e),I(e)}),[L,O,P]),(0,s.useLayoutEffect)((()=>{R&&M.current&&M.current.offsetHeight>0&&F(R/M.current.offsetHeight)}),[R]),G=P?[__("You are currently playing a story.","jetpack"),b?__("Press space to pause.","jetpack"):__("Press space to play.","jetpack",0),__("Press escape to exit.","jetpack")].join(" "):__("Play story","jetpack"),V=i?"presentation":P?"dialog":"button",(0,s.createElement)("div",{className:"wp-story-display-contents"},_,(0,s.createElement)("div",{role:V,"aria-label":G,tabIndex:P?-1:0,className:u()("wp-story-container",{"wp-story-with-controls":!i&&!P&&!T.playInFullscreen,"wp-story-fullscreen":P,"wp-story-ended":N,"wp-story-disabled":i,"wp-story-clickable":!i&&!P}),style:{maxWidth:`${R}px`},onClick:Z,onTouchStart:j,onTouchEnd:B},(0,s.createElement)(y.h4,l()({},r,{fullscreen:P,onExitFullscreen:q})),(0,s.createElement)("div",{ref:M,className:"wp-story-wrapper"},n.map(((e,n)=>(0,s.createElement)(f.Z,{playerId:t,key:n,media:e,index:n,playing:!i&&b,uploading:D,settings:T,targetAspectRatio:z})))),(0,s.createElement)(y.aV,{icon:m.Z,slideCount:n.length,showSlideCount:T.showSlideCount,ended:N,hasPrevious:C>0,onPreviousSlide:U,onNextSlide:H}),T.showProgressBar&&(0,s.createElement)(g.ZP,{playerId:t,slides:n,disabled:!P,onSlideSeek:A,maxBullets:P?T.maxBulletsFullscreen:T.maxBullets}),(0,s.createElement)(y.ZX,{playing:b,muted:x,onPlayPressed:()=>S(t,!b),onMutePressed:()=>w(t,!x),showMute:(e=>{const t=e<n.length?n[e]:null;return!!t&&("video"===t.type||(t.mime||"").startsWith("video/"))})(C)})),P&&(0,s.createElement)(y.Aq,{currentMedia:T.blurredBackground&&n.length>C&&n[C]}))}},16019:function(e,t,n){"use strict";var r=n(69307),l=n(92819),s=n(27870),i=n(9818);const u=e=>{let{key:t,playerId:n,index:l,disabled:u,isSelected:o,onClick:c}=e;const a=(0,i.useSelect)((e=>e("jetpack/story/player").getCurrentSlideProgressPercentage(n)),[]);return(0,r.createElement)(s.gT,{key:t,index:l,progress:a,disabled:u,isSelected:o,onClick:c})};t.ZP=e=>{let{playerId:t,slides:n,disabled:o,onSlideSeek:c,maxBullets:a}=e;const{currentSlideIndex:d}=(0,i.useSelect)((e=>({currentSlideIndex:e("jetpack/story/player").getCurrentSlideIndex(t)})),[]),p=Math.min(n.length,a),f=Math.floor(p/2);let m,g=0,y=n.length-1;return n.length<=a||d<f?(m=d,y=p-1):d>=n.length-f?(m=d-n.length+p,g=n.length-p):(m=f,g=d-f,y=d+f),(0,r.createElement)("div",{className:"wp-story-pagination wp-story-pagination-bullets",role:"tablist"},g>0&&(0,r.createElement)(s.gT,{key:"bullet-0",index:g-1,progress:100,isEllipsis:!0}),(0,l.range)(1,p+1).map(((e,n)=>{const l=n+g;let i=null;if(l<d)i=100;else{if(!(l>d))return(0,r.createElement)(u,{playerId:t,key:`bullet-${n}`,index:l,disabled:o,isSelected:m===n,onClick:()=>c(l)});i=0}return(0,r.createElement)(s.gT,{key:`bullet-${n}`,index:l,progress:i,disabled:o,isSelected:m===n,onClick:()=>c(l)})})),y<n.length-1&&(0,r.createElement)(s.gT,{key:`bullet-${p+1}`,index:y+1,progress:0,isEllipsis:!0}))}},12378:function(e,t,n){"use strict";var r=n(29183),l=n.n(r),s=n(69307),i=n(97524),u=n(89105),o=n.n(u),c=n(9818),a=n(27870);t.Z=e=>{let{playerId:t,media:n,index:r,playing:u,uploading:d,settings:p,targetAspectRatio:f}=e;const{currentSlideIndex:m,buffering:g}=(0,c.useSelect)((e=>({currentSlideIndex:e("jetpack/story/player").getCurrentSlideIndex(t),buffering:e("jetpack/story/player").isBuffering(t)})),[]),{slideReady:y}=(0,c.useDispatch)("jetpack/story/player"),E=r===m,h=(0,s.useRef)(null),[S,w]=(0,s.useState)(!1),[v,b]=(0,s.useState)(!0);return(0,s.useEffect)((()=>{if(E&&!v){const e=h.current&&h.current.src&&"video"===h.current.tagName.toLowerCase()?h.current:null;y(t,h.current,e?e.duration:p.imageTime)}}),[E,v]),(0,s.useEffect)((()=>{r<=m+(u?1:0)&&w(!0)}),[u,m]),(0,s.useLayoutEffect)((()=>{h.current&&(0,i.Z)(h.current).then((()=>{b(!1)}))}),[S,d]),(0,s.createElement)(s.Fragment,null,E&&(v||d||g)&&(0,s.createElement)("div",{className:o()("wp-story-slide","is-loading",{transparent:u&&g,"semi-transparent":d||!u&&g})},(0,s.createElement)(a.WB,null)),(0,s.createElement)("div",{role:"figure",className:"wp-story-slide",style:{display:E&&!v?"block":"none"},tabIndex:E?0:-1},S&&(0,s.createElement)(a.pU,l()({},n,{targetAspectRatio:f,cropUpTo:p.cropUpTo,index:r,mediaRef:h}))))}},46192:function(e,t,n){"use strict";function r(e,t){return{type:"SET_MUTED",value:t,playerId:e}}function l(e,t){return{type:"SET_PLAYING",value:t,playerId:e}}function s(e,t){return{type:"SHOW_SLIDE",index:t,playerId:e}}function i(e,t,n){return{type:"SLIDE_READY",mediaElement:t,duration:n,playerId:e}}function u(e,t){return{type:"SET_CURRENT_SLIDE_PROGRESS",value:t,playerId:e}}function o(e){return{type:"RESET_CURRENT_SLIDE_PROGRESS",playerId:e}}function c(e){return{type:"SET_CURRENT_SLIDE_ENDED",playerId:e}}function a(e,t){return{type:"SET_FULLSCREEN",playerId:e,fullscreen:t}}function d(e){return{type:"ENDED",playerId:e}}function p(e){let t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};return{type:"INIT",playerId:e,settings:t}}function f(e,t){return{type:"SET_BUFFERING",value:t,playerId:e}}n.r(t),n.d(t,{setMuted:function(){return r},setPlaying:function(){return l},showSlide:function(){return s},slideReady:function(){return i},setCurrentSlideProgress:function(){return u},resetCurrentSlideProgress:function(){return o},setCurrentSlideEnded:function(){return c},setFullscreen:function(){return a},setEnded:function(){return d},init:function(){return p},setBuffering:function(){return f}})},58571:function(e,t,n){"use strict";n.d(t,{XO:function(){return r},Qz:function(){return l},H2:function(){return s}});const r={currentTime:0,duration:null,timeout:null,lastUpdate:null},l={progress:r,index:0,mediaElement:null,duration:null,ended:!1,ready:!1},s={slideCount:0,currentSlide:l,previousSlide:null,muted:!1,playing:!1,ended:!1,buffering:!1,fullscreen:!1,settings:{imageTime:5,startMuted:!1,playInFullscreen:!0,playOnNextSlide:!0,playOnLoad:!1,exitFullscreenOnEnd:!0,loadInFullscreen:!1,blurredBackground:!0,showSlideCount:!1,showProgressBar:!0,shadowDOM:{enabled:!0,mode:"open",globalStyleElements:'#jetpack-block-story-css, link[href*="jetpack/_inc/blocks/story/view.css"]'},defaultAspectRatio:.5625,cropUpTo:.2,volume:.8,maxBullets:7,maxBulletsFullscreen:14}}},83566:function(e,t,n){"use strict";var r=n(46192),l=n(96494);const s=e=>e&&e.src&&"video"===e.tagName.toLowerCase();function i(e,t){const{getState:n}=t,r=e.playerId,i=(0,l.isMuted)(n(),r),u=(0,l.isPlaying)(n(),r),o=(0,l.getCurrentMediaElement)(n(),r),c=(0,l.getPreviousSlideMediaElement)(n(),r),a=(0,l.getSettings)(n(),r);s(c)&&(c.currentTime=0,c.onwaiting=null,c.onplaying=null,c.pause()),s(o)&&(i!==o.muted&&(o.muted=i,i||(o.volume=a.volume)),u?o.play():o.pause())}function u(e,t){const{getState:n,dispatch:i}=t,o=e.playerId,c=(0,l.isCurrentSlideReady)(n(),o),a=(0,l.isPlaying)(n(),o),d=(0,l.getCurrentSlideProgress)(n(),o);if(clearTimeout(d.timeout),!a||!c)return void(d.lastUpdate&&i((0,r.setCurrentSlideProgress)(o,{...d,lastUpdate:null})));const p=(0,l.getCurrentMediaElement)(n(),o),f=(0,l.getCurrentMediaDuration)(n(),o),m=d.lastUpdate?Date.now()-d.lastUpdate:100,g=s(p)?p.currentTime:d.currentTime+m/1e3;if(g>=f){i((0,r.setCurrentSlideEnded)(o));const e=(0,l.getSlideCount)(n(),o);(0,l.getCurrentSlideIndex)(n(),o)===e-1&&i((0,r.setEnded)(o))}else i((0,r.setCurrentSlideProgress)(o,{timeout:setTimeout((()=>u(e,t)),100),lastUpdate:Date.now(),duration:f,currentTime:g}))}t.Z={SET_PLAYING:[u,i],SLIDE_READY:[function(e,t){const{getState:n,dispatch:i}=t,u=e.playerId,o=(0,l.getCurrentMediaElement)(n(),u);if(!s(o))return;const c=(0,l.getCurrentSlideProgress)(n(),u);0===o.currentTime&&c.currentTime>0&&(o.currentTime=c.currentTime),o.onwaiting=()=>i((0,r.setBuffering)(u,!0)),o.onplaying=()=>i((0,r.setBuffering)(u,!1))},u,i],SET_MUTED:i,SHOW_SLIDE:i}},66930:function(e,t,n){"use strict";var r=n(9818),l=n(46192),s=n(96494),i=n(36978),u=n(2814);const o=(0,r.registerStore)("jetpack/story/player",{actions:l,reducer:u.Z,selectors:s});(0,i.Z)(o)},36978:function(e,t,n){"use strict";n.d(t,{Z:function(){return u}});var r=n(2601),l=n.n(r),s=n(92819),i=n(83566);function u(e){const t=[l()(i.Z)];let n=()=>{throw new Error("Dispatching while constructing your middleware is not allowed. Other middleware would not be applied to this dispatch.")},r=[];const u={getState:e.getState,dispatch:function(){return n(...arguments)}};return r=t.map((e=>e(u))),n=(0,s.flowRight)(...r)(e.dispatch),e.dispatch=n,e}},2814:function(e,t,n){"use strict";n.d(t,{Z:function(){return i}});var r=n(92819),l=n(58571);function s(){let e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:l.H2,t=arguments.length>1?arguments[1]:void 0;switch(t.type){case"SHOW_SLIDE":{const n=e.currentSlide===t.index+1;return{...e,currentSlide:{...l.Qz,index:t.index},previousSlide:e.currentSlide,playing:n?e.settings.playOnNextSlide:e.playing}}case"SLIDE_READY":return{...e,buffering:!1,currentSlide:{...e.currentSlide,mediaElement:t.mediaElement,duration:t.duration,ready:!0},previousSlide:null};case"SET_CURRENT_SLIDE_PROGRESS":return{...e,currentSlide:{...e.currentSlide,progress:t.value}};case"SET_CURRENT_SLIDE_ENDED":return{...e,currentSlide:{...e.currentSlide,ended:!0}};case"RESET_CURRENT_SLIDE_PROGRESS":return{...e,currentSlide:{...e.currentSlide,progress:{...l.XO}}};case"SET_MUTED":return{...e,muted:t.value};case"SET_PLAYING":{const n=t.value&&e.ended;return{...e,playing:t.value,buffering:!!t.value&&e.buffering,fullscreen:!e.playing&&t.value?e.settings.playInFullscreen:e.fullscreen,ended:!n&&e.ended,currentSlide:n?{...l.Qz,index:0}:e.currentSlide,previousSlide:n?null:e.previousSlide}}case"SET_BUFFERING":return{...e,buffering:t.value};case"SET_FULLSCREEN":return{...e,fullscreen:t.fullscreen,playing:!(e.fullscreen&&!t.fullscreen&&e.settings.playInFullscreen)&&e.playing};case"INIT":{const n=(0,r.merge)({},e.settings,t.settings);return{...e,settings:n,playing:n.playOnLoad,fullscreen:n.loadInFullscreen}}case"ENDED":return{...e,currentSlide:{...l.Qz,index:e.settings.slideCount-1,progress:{...l.XO,currentTime:100,duration:100}},ended:!0,playing:!1,fullscreen:!e.settings.exitFullscreenOnEnd}}return e}function i(){let e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=arguments.length>1?arguments[1]:void 0;return t.playerId?{...e,[t.playerId]:s(e[t.playerId],t)}:e}},96494:function(e,t,n){"use strict";function r(e,t){return!!e[t]}function l(e,t){return e[t].currentSlide.index}function s(e,t){return e[t].currentSlide.progress}function i(e,t){const n=e[t].currentSlide.progress.currentTime,r=e[t].currentSlide.progress.duration,l=Math.round(100*n/r);return l>=100?100:l}function u(e,t){return e[t].playing}function o(e,t){return e[t].muted}function c(e,t){return e[t].buffering}function a(e,t){return e[t].currentSlide.mediaElement}function d(e,t){return e[t].currentSlide.duration}function p(e,t){return e[t].currentSlide.ended}function f(e,t){return e[t].currentSlide.ready}function m(e,t){var n;return null===(n=e[t].previousSlide)||void 0===n?void 0:n.mediaElement}function g(e,t){return e[t].fullscreen}function y(e,t){return e[t].ended}function E(e,t){return e[t].settings}function h(e,t){return e[t].settings.slideCount}n.r(t),n.d(t,{isPlayerReady:function(){return r},getCurrentSlideIndex:function(){return l},getCurrentSlideProgress:function(){return s},getCurrentSlideProgressPercentage:function(){return i},isPlaying:function(){return u},isMuted:function(){return o},isBuffering:function(){return c},getCurrentMediaElement:function(){return a},getCurrentMediaDuration:function(){return d},hasCurrentSlideEnded:function(){return p},isCurrentSlideReady:function(){return f},getPreviousSlideMediaElement:function(){return m},isFullscreen:function(){return g},hasEnded:function(){return y},getSettings:function(){return E},getSlideCount:function(){return h}})},57836:function(e,t,n){"object"==typeof window&&window.Jetpack_Block_Assets_Base_Url&&window.Jetpack_Block_Assets_Base_Url.url&&(n.p=window.Jetpack_Block_Assets_Base_Url.url)},41632:function(e,t,n){"use strict";var r=n(69307),l=n(55609);t.Z=function(e){let t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:24,n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:24,s=arguments.length>3&&void 0!==arguments[3]?arguments[3]:"0 0 24 24";return(0,r.createElement)(l.SVG,{xmlns:"http://www.w3.org/2000/svg",width:t,height:n,viewBox:s},(0,r.createElement)(l.Path,{fill:"none",d:"M0 0h24v24H0V0z"}),e)}},48735:function(e,t,n){"use strict";var r=Object.assign||function(e){for(var t,n=1;n<arguments.length;n++)for(var r in t=arguments[n])Object.prototype.hasOwnProperty.call(t,r)&&(e[r]=t[r]);return e};Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(e){var t=e.size,n=void 0===t?24:t,l=e.onClick,s=(e.icon,e.className),u=function(e,t){var n={};for(var r in e)0<=t.indexOf(r)||Object.prototype.hasOwnProperty.call(e,r)&&(n[r]=e[r]);return n}(e,["size","onClick","icon","className"]),o=["gridicon","gridicons-fullscreen",s,!1,!1,!1].filter(Boolean).join(" ");return i.default.createElement("svg",r({className:o,height:n,width:n,onClick:l},u,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"}),i.default.createElement("g",null,i.default.createElement("path",{d:"M21 3v6h-2V6.41l-3.29 3.3-1.42-1.42L17.59 5H15V3zM3 3v6h2V6.41l3.29 3.3 1.42-1.42L6.41 5H9V3zm18 18v-6h-2v2.59l-3.29-3.29-1.41 1.41L17.59 19H15v2zM9 21v-2H6.41l3.29-3.29-1.41-1.42L5 17.59V15H3v6z"})))};var l,s=n(99196),i=(l=s)&&l.__esModule?l:{default:l};e.exports=t.default},99196:function(e){"use strict";e.exports=window.React},92819:function(e){"use strict";e.exports=window.lodash},11313:function(e){"use strict";e.exports=window.wp.blob},55609:function(e){"use strict";e.exports=window.wp.components},94333:function(e){"use strict";e.exports=window.wp.compose},9818:function(e){"use strict";e.exports=window.wp.data},47701:function(e){"use strict";e.exports=window.wp.domReady},69307:function(e){"use strict";e.exports=window.wp.element},65736:function(e){"use strict";e.exports=window.wp.i18n},39630:function(e){"use strict";e.exports=window.wp.keycodes}},t={};function n(r){var l=t[r];if(void 0!==l)return l.exports;var s=t[r]={exports:{}};return e[r](s,s.exports,n),s.exports}n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,{a:t}),t},n.d=function(e,t){for(var r in t)n.o(t,r)&&!n.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:t[r]})},n.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"==typeof window)return window}}(),n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},function(){var e;n.g.importScripts&&(e=n.g.location+"");var t=n.g.document;if(!e&&t&&(t.currentScript&&(e=t.currentScript.src),!e)){var r=t.getElementsByTagName("script");r.length&&(e=r[r.length-1].src)}if(!e)throw new Error("Automatic publicPath is not supported in this browser");e=e.replace(/#.*$/,"").replace(/\?.*$/,"").replace(/\/[^\/]+$/,"/"),n.p=e+"../"}(),function(){"use strict";n(57836)}(),function(){"use strict";var e=n(29183),t=n.n(e),r=n(69307),l=n(47701),s=n.n(l),i=n(4045);if("undefined"!=typeof window){const e=Array.from(new URLSearchParams(window.location.search).entries()).filter((e=>e[0].startsWith("wp-story-"))).reduce(((e,t)=>{const n=t[0].replace(/^wp-story-/,"").replace(/-([a-z])/g,(e=>e[1].toUpperCase()));try{e[n]=JSON.parse(t[1])}catch(r){e[n]=JSON.parse(`"${t[1]}"`)}return e}),{});s()((function(){const n=[...document.querySelectorAll(":not(#debug-bar-wp-query) .wp-story")];n.forEach((l=>{if("true"===l.getAttribute("data-block-initialized"))return;let s=null;1===n.length&&(s={...e});const u=l.getAttribute("data-settings");if(u)try{s={...s,...JSON.parse(u)}}catch(e){}!function(e,n){"string"==typeof e&&(e=document.querySelectorAll(e));const l=e.querySelector(".wp-story-wrapper"),s=e.querySelector(".wp-story-meta");let u=[];l&&l.children.length>0&&(u=function(e){return[...e.querySelectorAll("li > figure > :first-child")].map((e=>({alt:e.getAttribute("alt")||e.getAttribute("title"),mime:e.getAttribute("data-mime")||e.getAttribute("type"),url:e.getAttribute("src"),id:e.getAttribute("data-id"),type:"img"===e.tagName.toLowerCase()?"image":"video",srcset:e.getAttribute("srcset"),sizes:e.getAttribute("sizes")})))}(l));let o={};s&&s.children.length>0&&(o=function(e){const t=e.querySelector("div:first-child > img"),n=e.querySelector(".wp-story-title"),r=t&&t.src;return{storyTitle:n&&n.innerText,siteIconUrl:r}}(s));const c=function(e){return e.getAttribute("data-id")}(e);(0,r.render)((0,r.createElement)(i.Z,t()({id:c,slides:u,metadata:o,disabled:!1},n)),e)}(l,s)}))}))}}()}();