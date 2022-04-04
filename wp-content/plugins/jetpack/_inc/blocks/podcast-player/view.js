/*! For license information please see view.js.LICENSE.txt */
!function(){var e={27538:function(e){e.exports=function(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e},e.exports.default=e.exports,e.exports.__esModule=!0},89105:function(e,t){var r;!function(){"use strict";var a={}.hasOwnProperty;function s(){for(var e=[],t=0;t<arguments.length;t++){var r=arguments[t];if(r){var o=typeof r;if("string"===o||"number"===o)e.push(r);else if(Array.isArray(r)){if(r.length){var n=s.apply(null,r);n&&e.push(n)}}else if("object"===o)if(r.toString===Object.prototype.toString)for(var c in r)a.call(r,c)&&r[c]&&e.push(c);else e.push(r.toString())}}return e.join(" ")}e.exports?(s.default=s,e.exports=s):void 0===(r=function(){return s}.apply(t,[]))||(e.exports=r)}()},32002:function(e){var t=1e3,r=60*t,a=60*r,s=24*a,o=7*s,n=365.25*s;function c(e,t,r,a){var s=t>=1.5*r;return Math.round(e/r)+" "+a+(s?"s":"")}e.exports=function(e,i){i=i||{};var l=typeof e;if("string"===l&&e.length>0)return function(e){if((e=String(e)).length>100)return;var c=/^(-?(?:\d+)?\.?\d+) *(milliseconds?|msecs?|ms|seconds?|secs?|s|minutes?|mins?|m|hours?|hrs?|h|days?|d|weeks?|w|years?|yrs?|y)?$/i.exec(e);if(!c)return;var i=parseFloat(c[1]);switch((c[2]||"ms").toLowerCase()){case"years":case"year":case"yrs":case"yr":case"y":return i*n;case"weeks":case"week":case"w":return i*o;case"days":case"day":case"d":return i*s;case"hours":case"hour":case"hrs":case"hr":case"h":return i*a;case"minutes":case"minute":case"mins":case"min":case"m":return i*r;case"seconds":case"second":case"secs":case"sec":case"s":return i*t;case"milliseconds":case"millisecond":case"msecs":case"msec":case"ms":return i;default:return}}(e);if("number"===l&&isFinite(e))return i.long?function(e){var o=Math.abs(e);if(o>=s)return c(e,o,s,"day");if(o>=a)return c(e,o,a,"hour");if(o>=r)return c(e,o,r,"minute");if(o>=t)return c(e,o,t,"second");return e+" ms"}(e):function(e){var o=Math.abs(e);if(o>=s)return Math.round(e/s)+"d";if(o>=a)return Math.round(e/a)+"h";if(o>=r)return Math.round(e/r)+"m";if(o>=t)return Math.round(e/t)+"s";return e+"ms"}(e);throw new Error("val is not a non-empty string or a valid number. val="+JSON.stringify(e))}},98006:function(e,t,r){"use strict";var a=r(69307),s=r(89105),o=r.n(s),n=r(76814);const c=(0,a.memo)((e=>{let{playerId:t,title:r,cover:s,link:o,track:n,children:c,showEpisodeTitle:l,showCoverArt:u,showEpisodeDescription:d,colors:p}=e;return u||l||d?(0,a.createElement)("div",{className:"jetpack-podcast-player__header"},(0,a.createElement)("div",{className:"jetpack-podcast-player__current-track-info"},u&&s&&(0,a.createElement)("div",{className:"jetpack-podcast-player__cover"},(0,a.createElement)("img",{className:"jetpack-podcast-player__cover-image",src:s,alt:""})),l&&!!(r||n&&n.title)&&(0,a.createElement)(i,{playerId:t,title:r,link:o,track:n,colors:p})),!!(d&&n&&n.description)&&(0,a.createElement)("p",{id:`${t}__track-description`,className:"jetpack-podcast-player__track-description"},n.description),c):c})),i=(0,a.memo)((e=>{let{playerId:t,title:r,link:s,track:c,colors:i={primary:{name:null,custom:null,classes:""}}}=e;return(0,a.createElement)("h2",{id:`${t}__title`,className:"jetpack-podcast-player__title"},!(!c||!c.title)&&(0,a.createElement)("span",{className:o()("jetpack-podcast-player__current-track-title",i.primary.classes),style:{color:i.primary.custom}},c.title,(0,a.createElement)("a",{className:"jetpack-podcast-player__track-title-link",href:c.link||c.src,target:"_blank",rel:"noopener noreferrer nofollow"},n.Z)),!!(c&&c.title&&r)&&(0,a.createElement)("span",{className:"jetpack-podcast-player--visually-hidden"}," - "),!!r&&(0,a.createElement)(l,{title:r,link:s,colors:i}))})),l=(0,a.memo)((e=>{let{title:t,link:r}=e;return(0,a.createElement)("span",{className:"jetpack-podcast-player__podcast-title"},r?(0,a.createElement)("a",{className:"jetpack-podcast-player__link",href:r,target:"_blank",rel:"noopener noreferrer nofollow"},t):{title:t})}));t.Z=c},66530:function(e,t,r){"use strict";var a=r(69307),s=r(15111),o=r(15020);const n=(0,a.memo)((e=>{let{playerId:t,tracks:r,selectTrack:n,currentTrack:c,playerState:i,colors:l}=e;return(0,a.createElement)("ol",{className:"jetpack-podcast-player__tracks","aria-labelledby":`jetpack-podcast-player__tracklist-title--${t}`,"aria-describedby":`jetpack-podcast-player__tracklist-description--${t}`},r.map(((e,t)=>{const r=c===t;return(0,a.createElement)(o.Z,{key:e.id,index:t,track:e,selectTrack:n,isActive:r,isPlaying:r&&i===s.Wp,isError:r&&i===s.Vy,colors:l})})))}));t.Z=n},58627:function(e,t,r){"use strict";var a=r(27538),s=r.n(a),o=r(69307),n=r(89105),c=r.n(n),i=r(65736),l=r(25158),u=r(94333),d=r(9818),p=r(15111),m=r(92924),h=r(66530),y=r(98006),f=r(74693),g=r(56551);const __=i.__;class k extends o.Component{constructor(){super(...arguments),s()(this,"state",{currentTrack:0,hasUserInteraction:!1}),s()(this,"recordUserInteraction",(()=>{this.state.hasUserInteraction||this.setState({hasUserInteraction:!0})})),s()(this,"selectTrack",(e=>{const{currentTrack:t}=this.state;if(t===e)return this.recordUserInteraction(),void this.props.toggleMediaSource(this.props.playerId);-1!==t&&this.props.pauseMediaSource(this.props.playerId),this.loadAndPlay(e)})),s()(this,"loadTrack",(e=>{const t=this.getTrack(e);if(!t)return!1;this.state.currentTrack!==e&&this.setState({currentTrack:e});const{title:r,link:a,description:s}=t;return this.props.updateMediaSourceData(this.props.playerId,{title:r,link:a}),(0,l.speak)(
/* translators: %s is the track title. It describes the current state of the track as "Loading: [track title]". */
`${(0,i.sprintf)(__("Loading: %s","jetpack"),r)} ${s}`,"assertive"),!0})),s()(this,"loadAndPlay",(e=>{this.recordUserInteraction(),this.loadTrack(e)&&this.props.playMediaSource(this.props.playerId)})),s()(this,"getTrack",(e=>this.props.tracks[e])),s()(this,"handleError",(e=>{if(!this.state.hasUserInteraction){const t=window.navigator.userAgent.match(/Trident\/7\./)?"IE11: Playing sounds in webpages setting is not checked":e;this.setState((()=>{throw new Error(t)}))}this.props.errorMediaSource(this.props.playerId),(0,l.speak)(`${__("Error: Episode unavailable - Open in a new tab","jetpack")}`,"assertive")})),s()(this,"handlePlay",(()=>{this.props.playMediaSource(this.props.playerId),this.setState({hasUserInteraction:!0})})),s()(this,"handlePause",(()=>{this.props.pauseMediaSource(this.props.playerId),this.props.playerState!==p.Vy&&this.props.pauseMediaSource(this.props.playerId)})),s()(this,"handleTimeChange",(e=>{this.props.setMediaSourceCurrentTime(this.props.playerId,e)})),s()(this,"handleJump",(()=>{this.props.setMediaSourceCurrentTime(this.props.playerId,this.props.currentTime-5)})),s()(this,"handleSkip",(()=>{this.props.setMediaSourceCurrentTime(this.props.playerId,this.props.currentTime+30)})),s()(this,"updateMediaData",(e=>{var t,r;this.props.updateMediaSourceData(this.props.playerId,{duration:null===(t=e.target)||void 0===t?void 0:t.duration,domId:null===(r=e.target)||void 0===r?void 0:r.id})}))}registerPlayer(){const e=this.getTrack(this.state.currentTrack)||{},{playerId:t}=this.props;this.props.registerMediaSource(t,{title:e.title,link:e.link,state:p._5}),this.props.setDefaultMediaSource(t)}componentDidMount(){this.props.playerId&&this.registerPlayer()}componentWillUnmount(){this.props.playerId&&this.props.unregisterMediaSource(this.props.playerId)}componentDidUpdate(e){const t=e=>null!=e&&e.length?e.map((e=>e.guid)):[],r=t(this.props.tracks),a=new Set(t(e.tracks));r.length===a.size&&r.every((e=>a.has(e)))||this.loadTrack(0)}static getDerivedStateFromProps(e,t){return e.tracks.length<=t.currentTrack?{...t,currentTrack:0}:null}render(){const{playerId:e,title:t,link:r,cover:a,tracks:s,attributes:n,currentTime:l,playerState:u}=this.props,{itemsToShow:d,primaryColor:p,customPrimaryColor:g,hexPrimaryColor:k,secondaryColor:v,customSecondaryColor:E,hexSecondaryColor:C,backgroundColor:_,customBackgroundColor:S,hexBackgroundColor:w,showCoverArt:b,showEpisodeTitle:M,showEpisodeDescription:T}=n,{currentTrack:j}=this.state,F=s.slice(0,d),A=this.getTrack(j),I=(0,f.Aq)({primaryColor:p,customPrimaryColor:g,secondaryColor:v,customSecondaryColor:E,backgroundColor:_,customBackgroundColor:S}),P={color:E,backgroundColor:S,"--jetpack-podcast-player-primary":k,"--jetpack-podcast-player-secondary":C,"--jetpack-podcast-player-background":w},x=c()("jetpack-podcast-player",u,I.secondary.classes,I.background.classes);return(0,o.createElement)("section",{className:x,style:P,"aria-labelledby":t||A&&A.title?`${e}__title`:void 0,"aria-describedby":A&&A.description?`${e}__track-description`:void 0,"data-jetpack-iframe-ignore":!0},(0,o.createElement)(y.Z,{playerId:e,title:t,link:r,cover:a,track:this.getTrack(j),showCoverArt:b,showEpisodeTitle:M,showEpisodeDescription:T,colors:I},(0,o.createElement)(m.Z,{onJumpBack:this.handleJump,onSkipForward:this.handleSkip,trackSource:this.getTrack(j).src,onPlay:this.handlePlay,onPause:this.handlePause,onError:this.handleError,playStatus:u,currentTime:l,onTimeChange:this.handleTimeChange,onMetadataLoaded:this.updateMediaData})),F.length>1&&(0,o.createElement)(o.Fragment,null,(0,o.createElement)("h4",{id:`jetpack-podcast-player__tracklist-title--${e}`,className:"jetpack-podcast-player--visually-hidden"},(0,i.sprintf)(// translators: %s is the track title.
__("Playlist: %s","jetpack"),t)),(0,o.createElement)("p",{id:`jetpack-podcast-player__tracklist-description--${e}`,className:"jetpack-podcast-player--visually-hidden"},__("Select an episode to play it in the audio player.","jetpack")),(0,o.createElement)(h.Z,{playerId:e,playerState:u,currentTrack:j,tracks:F,selectTrack:this.selectTrack,colors:I})))}}k.defaultProps={title:"",cover:"",link:"",attributes:{url:null,itemsToShow:5,showCoverArt:!0,showEpisodeTitle:!0,showEpisodeDescription:!0},tracks:[]},t.Z=(0,u.compose)([g.Z,(0,d.withSelect)(((e,t)=>{const{playerId:r}=t,{getMediaSourceCurrentTime:a,getMediaPlayerState:s}=e(p.tT);return{currentTime:a(r),playerState:s(r)}})),(0,d.withDispatch)((e=>{const{registerMediaSource:t,updateMediaSourceData:r,unregisterMediaSource:a,setDefaultMediaSource:s,playMediaSource:o,pauseMediaSource:n,toggleMediaSource:c,errorMediaSource:i,setMediaSourceCurrentTime:l}=e(p.tT);return{registerMediaSource:t,updateMediaSourceData:r,unregisterMediaSource:a,setDefaultMediaSource:s,playMediaSource:o,pauseMediaSource:n,toggleMediaSource:c,errorMediaSource:i,setMediaSourceCurrentTime:l}}))])(k)},86852:function(e,t,r){"use strict";var a=r(69307),s=r(65736);const __=s.__,o=(0,a.memo)((e=>{let{link:t,title:r,colors:o}=e;return(0,a.createElement)("div",{className:"jetpack-podcast-player__track-error"},__("Episode unavailable. ","jetpack"),t&&(0,a.createElement)("span",{className:o.secondary.classes,style:{color:o.secondary.custom}},(0,a.createElement)("a",{className:"jetpack-podcast-player__link",href:t,rel:"noopener noreferrer nofollow",target:"_blank"},(0,a.createElement)("span",{className:"jetpack-podcast-player--visually-hidden"},`${(0,s.sprintf)(
/* translators: %s is the title of the track. This text is visually hidden from the screen, but available to screen readers. */
__("%s:","jetpack"),r)} `),__("Open in a new tab","jetpack"))))}));t.Z=o},71938:function(e,t,r){"use strict";var a=r(69307),s=r(65736),o=r(72086);const __=s.__,n=(0,a.memo)((e=>{let t,r,{isPlaying:s,isError:n,className:c}=e;n?(r="error",
/* translators: This is text to describe the current state. This will go
    before the track title, such as "Error: [The title of the track]". */
t=__("Error:","jetpack")):s&&(r="playing",
/* translators: Text to describe the current state. This will go before the
    track title, such as "Playing: [The title of the track]". */
t=__("Playing:","jetpack"));const i=o[r];return i?(0,a.createElement)("span",{className:`${c} ${c}--${r}`},(0,a.createElement)("span",{className:"jetpack-podcast-player--visually-hidden"},`${t} `),i):(0,a.createElement)("span",{className:c})}));t.Z=n},15020:function(e,t,r){"use strict";var a=r(69307),s=r(89105),o=r.n(s),n=r(65736),c=r(71938),i=r(86852),l=r(74693);const __=n.__,u=(0,a.memo)((e=>{let{track:t,isActive:r,isPlaying:s,isError:n,selectTrack:u,index:d,colors:p={primary:{},secondary:{}}}=e;const m=(0,l.Gd)("color",p.primary.name),h=(0,l.Gd)("color",p.secondary.name),y=o()("jetpack-podcast-player__track",{"is-active":r,"has-primary":r&&(p.primary.name||p.primary.custom),[m]:r&&!!m,"has-secondary":!r&&(p.secondary.name||p.secondary.custom),[h]:!r&&!!h}),f={};r&&p.primary.custom&&!m?f.color=p.primary.custom:r||!p.secondary.custom||h||(f.color=p.secondary.custom);const
/* translators: This needs to be a single word with no spaces. It describes
  the current item in the group. A screen reader will announce it as "[title],
  current track". */
g=r?__("track","jetpack"):void 0;return(0,a.createElement)("li",{className:y,style:Object.keys(f).length?f:null},(0,a.createElement)("a",{className:"jetpack-podcast-player__link jetpack-podcast-player__track-link",href:t.link||t.src,role:"button","aria-current":g,onClick:e=>{e.shiftKey||e.metaKey||e.altKey||(e.preventDefault(),u(d))},onKeyDown:e=>{" "===event.key&&(e.preventDefault(),u(d))}},(0,a.createElement)(c.Z,{className:"jetpack-podcast-player__track-status-icon",isPlaying:s,isError:n}),(0,a.createElement)("span",{className:"jetpack-podcast-player__track-title"},t.title),t.duration&&(0,a.createElement)("time",{className:"jetpack-podcast-player__track-duration",dateTime:t.duration},t.duration)),r&&n&&(0,a.createElement)(i.Z,{link:t.link,title:t.title,colors:p}))}));t.Z=u},56551:function(e,t,r){"use strict";r.d(t,{Z:function(){return c}});var a=r(27538),s=r.n(a),o=r(69307),n=r(65736);const __=n.__;function c(e){class t extends o.Component{constructor(){super(...arguments),s()(this,"state",{didError:!1,isIE11AudioIssue:!1}),s()(this,"componentDidCatch",((e,t)=>{this.props.onError(e,t)}))}render(){const{didError:t,isIE11AudioIssue:r}=this.state;return t?(0,o.createElement)("section",{className:"jetpack-podcast-player"},(0,o.createElement)("p",{className:"jetpack-podcast-player__error"},r?__('The podcast player cannot be displayed as your browser settings do not allow for sounds to be played in webpages. This can be changed in your browser’s "Internet options" settings. In the "Advanced" tab you will have to check the box next to "Play sounds in webpages" in the "Multimedia" section. Once you have confirmed that the box is checked, please press "Apply" and then reload this page.',"jetpack"):__("An unexpected error occured within the Podcast Player. Reloading this page might fix the problem.","jetpack",0))):(0,o.createElement)(e,this.props)}}return s()(t,"getDerivedStateFromError",(e=>({didError:!0,isIE11AudioIssue:!!e.message.match(/IE11/)}))),t.defaultProps={onError:()=>{}},t}},76814:function(e,t,r){"use strict";var a=r(69307),s=r(55609);const o=(0,a.createElement)(s.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},(0,a.createElement)(s.Path,{d:"M15.6 7.2H14v1.5h1.6c2 0 3.7 1.7 3.7 3.7s-1.7 3.7-3.7 3.7H14v1.5h1.6c2.8 0 5.2-2.3 5.2-5.2 0-2.9-2.3-5.2-5.2-5.2zM4.7 12.4c0-2 1.7-3.7 3.7-3.7H10V7.2H8.4c-2.9 0-5.2 2.3-5.2 5.2 0 2.9 2.3 5.2 5.2 5.2H10v-1.5H8.4c-2 0-3.7-1.7-3.7-3.7zm4.6.9h5.3v-1.5H9.3v1.5z"}));t.Z=o},72086:function(e,t,r){"use strict";r.r(t),r.d(t,{playing:function(){return n},error:function(){return c}});var a=r(69307),s=r(55609);const o={height:"24",viewBox:"0 0 24 24",width:"24",xmlns:"http://www.w3.org/2000/svg"},n=(0,a.createElement)(s.SVG,o,(0,a.createElement)(s.Path,{d:"M0 0h24v24H0V0z",fill:"none"}),(0,a.createElement)(s.Path,{d:"M3 9v6h4l5 5V4L7 9H3zm7-.17v6.34L7.83 13H5v-2h2.83L10 8.83zM16.5 12c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77 0-4.28-2.99-7.86-7-8.77z"})),c=(0,a.createElement)(s.SVG,o,(0,a.createElement)(s.Path,{d:"M0 0h24v24H0V0z",fill:"none"}),(0,a.createElement)(s.Path,{d:"M11 15h2v2h-2zm0-8h2v6h-2zm.99-5C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"}))},74693:function(e,t,r){"use strict";r.d(t,{Gd:function(){return n},Aq:function(){return c}});var a=r(89105),s=r.n(a),o=r(92819);function n(e,t){if(e&&t)return`has-${t}-${e}`}const c=(0,o.memoize)((e=>{let{primaryColor:t,customPrimaryColor:r,secondaryColor:a,customSecondaryColor:o,backgroundColor:c,customBackgroundColor:i}=e;const l=n("color",t),u=n("color",a),d=n("background-color",c);return{primary:{name:t,custom:r,classes:s()({"has-primary":l||r,[l]:l})},secondary:{name:a,custom:o,classes:s()({"has-secondary":u||o,[u]:u})},background:{name:c,custom:i,classes:s()({"has-background":d||i,[d]:d})}}}),(e=>Object.values(e).join()))},92924:function(e,t,r){"use strict";var a=r(69307),s=r(92819),o=r(65736),n=r(25158),c=r(15111);const __=o.__,i="undefined"!=typeof _wpmejsSettings?_wpmejsSettings:{};function l(e,t,r){const a=document.createElement("div");a.className=e;const s=document.createElement("button");return s.innerText=t,s.addEventListener("click",r),s.setAttribute("aria-label",t),s.setAttribute("title",t),a.appendChild(s),a}t.Z=function(e){let{trackSource:t,onPlay:r,onPause:o,onError:u,onTimeChange:d,onSkipForward:p,onJumpBack:m,currentTime:h,playStatus:y=c._5,onMetadataLoaded:f,loadWhenReady:g=!1,preload:k="metadata"}=e;const v=(0,a.useRef)(),E=()=>{v.current.play().catch((()=>{}))},C=()=>{v.current.pause(),(0,n.speak)(__("Paused","jetpack"),"assertive")};return(0,a.useEffect)((()=>{MediaElementPlayer.prototype._setResponsiveMode||(MediaElementPlayer.prototype._setResponsiveMode=MediaElementPlayer.prototype.setResponsiveMode,MediaElementPlayer.prototype.setResponsiveMode=function(){const e=this;e.getElement(e.container).parentNode&&e._setResponsiveMode()})}),[]),(0,a.useEffect)((()=>{const e=v.current;e.preload=k;const t=new MediaElementPlayer(e,{...i,success:()=>g&&(null==e?void 0:e.load())});if(m||p){const e=`${t.options.classPrefix}button ${t.options.classPrefix}jump-button`;if(m){const r=`${e} ${t.options.classPrefix}jump-backward-button`;t.addControlElement(l(r,__("Jump Back","jetpack"),m),"jumpBackwardButton")}if(p){const r=`${e} ${t.options.classPrefix}skip-forward-button`;t.addControlElement(l(r,__("Skip Forward","jetpack"),p),"skipForwardButton")}}return r&&e.addEventListener("play",r),o&&e.addEventListener("pause",o),u&&e.addEventListener("error",u),f&&e.addEventListener("loadedmetadata",f),()=>{t.remove(),r&&e.removeEventListener("play",r),o&&e.removeEventListener("pause",o),u&&e.removeEventListener("error",u),f&&e.removeEventListener("loadedmetadata",f)}}),[r,o,u,m,p,f,g,k]),(0,a.useEffect)((()=>{var e;const[t,r]=!1===(null===(e=v.current)||void 0===e?void 0:e.paused)?[c.Wp,C]:[c._5,E],a=(0,s.debounce)(r,100);return c.Vy!==y&&t!==y&&a(),()=>{a.cancel()}}),[v,y,t]),(0,a.useEffect)((()=>{if(!d)return;const e=v.current,t=(0,s.throttle)((e=>d(e)),1e3,{leading:!0,trailing:!1}),r=e=>t(e.target.currentTime);return d&&(null==e||e.addEventListener("timeupdate",r)),()=>{t.cancel(),null==e||e.removeEventListener("timeupdate",r)}}),[v,d]),(0,a.useEffect)((()=>{const e=v.current;h&&e&&Math.abs(Math.floor(h-e.currentTime))>1&&(e.currentTime=h)}),[v,h]),(0,a.createElement)("div",{className:"jetpack-audio-player"},(0,a.createElement)("audio",{src:t,ref:v}))}},57836:function(e,t,r){"object"==typeof window&&window.Jetpack_Block_Assets_Base_Url&&window.Jetpack_Block_Assets_Base_Url.url&&(r.p=window.Jetpack_Block_Assets_Base_Url.url)},15111:function(e,t,r){"use strict";r.d(t,{tT:function(){return a},Wp:function(){return s},Vy:function(){return o},_5:function(){return n}});const a="jetpack/media-source",s="is-playing",o="is-error",n="is-paused"},73617:function(e,t,r){"use strict";var a=r(9818),s=r(46169),o=r(15111);if(void 0!==a.createReduxStore){const e=(0,a.createReduxStore)(o.tT,s.Z);(0,a.register)(e)}else(0,a.registerStore)(o.tT,s.Z)},46169:function(e,t,r){"use strict";var a=r(15111);const s={sources:{},default:null},o={getDefaultMediaSource(e){let t=null;const r=Object.keys(e.sources);if(e.default?t=e.default:null!=r&&r.length&&(t=e.sources[r[0]].id),t)return e.sources[t]},getMediaPlayerState(e,t){var r;const a=t?null===(r=e.sources)||void 0===r?void 0:r[t]:o.getDefaultMediaSource(e);return null==a?void 0:a.state},getMediaSourceCurrentTime(e,t){var r;const a=t?null===(r=e.sources)||void 0===r?void 0:r[t]:o.getDefaultMediaSource(e);return null==a?void 0:a.currentTime},getMediaSourceDuration(e,t){var r,a;if(!t){const t=o.getDefaultMediaSource(e);return null==t?void 0:t.duration}return null===(r=e.sources)||void 0===r||null===(a=r[t])||void 0===a?void 0:a.duration},getMediaSourceDomReference(e,t){var r;const a=t?null===(r=e.sources)||void 0===r?void 0:r[t]:o.getDefaultMediaSource(e);if(!a)return;const s=null==a?void 0:a.domId;return s?document.getElementById(s):void 0}},n={reducer(){var e;let t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:s,r=arguments.length>1?arguments[1]:void 0;const o=r.id||t.default||(null===(e=Object.keys(t.sources))||void 0===e?void 0:e[0]);switch(r.type){case"REGISTER_MEDIA_SOURCE":return{...t,sources:{...t.sources,[r.id]:{id:r.id,...r.mediaSourceState}}};case"UPDATE_MEDIA_SOURCE_DATA":return{...t,sources:{...t.sources,[r.id]:{...t.sources[r.id],...r.data}}};case"UNREGISTER_MEDIA_SOURCE":{const e=Object.assign({},t);var n;if(e.sources[r.id]&&delete e.sources[r.id],r.id===t.default)e.default=null===(n=Object.keys(t.sources))||void 0===n?void 0:n[0];return e}case"SET_DEFAULT_MEDIA_SOURCE":return{...t,default:r.id};case"SET_MEDIA_PLAYER_STATE":return{...t,sources:{...t.sources,[o]:{...t.sources[o],state:r.state}}};case"TOGGLE_MEDIA_PLAYER_STATE":return{...t,sources:{...t.sources,[o]:{...t.sources[o],state:t.sources[o].state===a.Wp?a._5:a.Wp}}};case"SET_MEDIA_PLAYER_CURRENT_TIME":return{...t,sources:{...t.sources,[o]:{...t.sources[o],currentTime:r.currentTime}}}}return t},actions:{registerMediaSource:(e,t)=>({type:"REGISTER_MEDIA_SOURCE",id:e,mediaSourceState:t}),updateMediaSourceData:(e,t)=>({type:"UPDATE_MEDIA_SOURCE_DATA",id:e,data:t}),unregisterMediaSource:e=>({type:"UNREGISTER_MEDIA_SOURCE",id:e}),setDefaultMediaSource:e=>({type:"SET_DEFAULT_MEDIA_SOURCE",id:e}),playMediaSource:e=>({type:"SET_MEDIA_PLAYER_STATE",id:e,state:a.Wp}),toggleMediaSource:e=>({type:"TOGGLE_MEDIA_PLAYER_STATE",id:e}),pauseMediaSource:e=>({type:"SET_MEDIA_PLAYER_STATE",id:e,state:a._5}),errorMediaSource:e=>({type:"SET_MEDIA_PLAYER_STATE",id:e,state:a.Vy}),setMediaSourceCurrentTime:(e,t)=>({type:"SET_MEDIA_PLAYER_CURRENT_TIME",id:e,currentTime:t})},selectors:o};t.Z=n},95339:function(e,t,r){t.formatArgs=function(t){if(t[0]=(this.useColors?"%c":"")+this.namespace+(this.useColors?" %c":" ")+t[0]+(this.useColors?"%c ":" ")+"+"+e.exports.humanize(this.diff),!this.useColors)return;const r="color: "+this.color;t.splice(1,0,r,"color: inherit");let a=0,s=0;t[0].replace(/%[a-zA-Z%]/g,(e=>{"%%"!==e&&(a++,"%c"===e&&(s=a))})),t.splice(s,0,r)},t.save=function(e){try{e?t.storage.setItem("debug",e):t.storage.removeItem("debug")}catch(e){}},t.load=function(){let e;try{e=t.storage.getItem("debug")}catch(e){}!e&&"undefined"!=typeof process&&"env"in process&&(e=process.env.DEBUG);return e},t.useColors=function(){if("undefined"!=typeof window&&window.process&&("renderer"===window.process.type||window.process.__nwjs))return!0;if("undefined"!=typeof navigator&&navigator.userAgent&&navigator.userAgent.toLowerCase().match(/(edge|trident)\/(\d+)/))return!1;return"undefined"!=typeof document&&document.documentElement&&document.documentElement.style&&document.documentElement.style.WebkitAppearance||"undefined"!=typeof window&&window.console&&(window.console.firebug||window.console.exception&&window.console.table)||"undefined"!=typeof navigator&&navigator.userAgent&&navigator.userAgent.toLowerCase().match(/firefox\/(\d+)/)&&parseInt(RegExp.$1,10)>=31||"undefined"!=typeof navigator&&navigator.userAgent&&navigator.userAgent.toLowerCase().match(/applewebkit\/(\d+)/)},t.storage=function(){try{return localStorage}catch(e){}}(),t.destroy=(()=>{let e=!1;return()=>{e||(e=!0,console.warn("Instance method `debug.destroy()` is deprecated and no longer does anything. It will be removed in the next major version of `debug`."))}})(),t.colors=["#0000CC","#0000FF","#0033CC","#0033FF","#0066CC","#0066FF","#0099CC","#0099FF","#00CC00","#00CC33","#00CC66","#00CC99","#00CCCC","#00CCFF","#3300CC","#3300FF","#3333CC","#3333FF","#3366CC","#3366FF","#3399CC","#3399FF","#33CC00","#33CC33","#33CC66","#33CC99","#33CCCC","#33CCFF","#6600CC","#6600FF","#6633CC","#6633FF","#66CC00","#66CC33","#9900CC","#9900FF","#9933CC","#9933FF","#99CC00","#99CC33","#CC0000","#CC0033","#CC0066","#CC0099","#CC00CC","#CC00FF","#CC3300","#CC3333","#CC3366","#CC3399","#CC33CC","#CC33FF","#CC6600","#CC6633","#CC9900","#CC9933","#CCCC00","#CCCC33","#FF0000","#FF0033","#FF0066","#FF0099","#FF00CC","#FF00FF","#FF3300","#FF3333","#FF3366","#FF3399","#FF33CC","#FF33FF","#FF6600","#FF6633","#FF9900","#FF9933","#FFCC00","#FFCC33"],t.log=console.debug||console.log||(()=>{}),e.exports=r(84330)(t);const{formatters:a}=e.exports;a.j=function(e){try{return JSON.stringify(e)}catch(e){return"[UnexpectedJSONParseError]: "+e.message}}},84330:function(e,t,r){e.exports=function(e){function t(e){let r,s,o,n=null;function c(){for(var e=arguments.length,a=new Array(e),s=0;s<e;s++)a[s]=arguments[s];if(!c.enabled)return;const o=c,n=Number(new Date),i=n-(r||n);o.diff=i,o.prev=r,o.curr=n,r=n,a[0]=t.coerce(a[0]),"string"!=typeof a[0]&&a.unshift("%O");let l=0;a[0]=a[0].replace(/%([a-zA-Z%])/g,((e,r)=>{if("%%"===e)return"%";l++;const s=t.formatters[r];if("function"==typeof s){const t=a[l];e=s.call(o,t),a.splice(l,1),l--}return e})),t.formatArgs.call(o,a);const u=o.log||t.log;u.apply(o,a)}return c.namespace=e,c.useColors=t.useColors(),c.color=t.selectColor(e),c.extend=a,c.destroy=t.destroy,Object.defineProperty(c,"enabled",{enumerable:!0,configurable:!1,get:()=>null!==n?n:(s!==t.namespaces&&(s=t.namespaces,o=t.enabled(e)),o),set:e=>{n=e}}),"function"==typeof t.init&&t.init(c),c}function a(e,r){const a=t(this.namespace+(void 0===r?":":r)+e);return a.log=this.log,a}function s(e){return e.toString().substring(2,e.toString().length-2).replace(/\.\*\?$/,"*")}return t.debug=t,t.default=t,t.coerce=function(e){if(e instanceof Error)return e.stack||e.message;return e},t.disable=function(){const e=[...t.names.map(s),...t.skips.map(s).map((e=>"-"+e))].join(",");return t.enable(""),e},t.enable=function(e){let r;t.save(e),t.namespaces=e,t.names=[],t.skips=[];const a=("string"==typeof e?e:"").split(/[\s,]+/),s=a.length;for(r=0;r<s;r++)a[r]&&("-"===(e=a[r].replace(/\*/g,".*?"))[0]?t.skips.push(new RegExp("^"+e.substr(1)+"$")):t.names.push(new RegExp("^"+e+"$")))},t.enabled=function(e){if("*"===e[e.length-1])return!0;let r,a;for(r=0,a=t.skips.length;r<a;r++)if(t.skips[r].test(e))return!1;for(r=0,a=t.names.length;r<a;r++)if(t.names[r].test(e))return!0;return!1},t.humanize=r(32002),t.destroy=function(){console.warn("Instance method `debug.destroy()` is deprecated and no longer does anything. It will be removed in the next major version of `debug`.")},Object.keys(e).forEach((r=>{t[r]=e[r]})),t.names=[],t.skips=[],t.formatters={},t.selectColor=function(e){let r=0;for(let t=0;t<e.length;t++)r=(r<<5)-r+e.charCodeAt(t),r|=0;return t.colors[Math.abs(r)%t.colors.length]},t.enable(t.load()),t}},92819:function(e){"use strict";e.exports=window.lodash},25158:function(e){"use strict";e.exports=window.wp.a11y},55609:function(e){"use strict";e.exports=window.wp.components},94333:function(e){"use strict";e.exports=window.wp.compose},9818:function(e){"use strict";e.exports=window.wp.data},69307:function(e){"use strict";e.exports=window.wp.element},65736:function(e){"use strict";e.exports=window.wp.i18n}},t={};function r(a){var s=t[a];if(void 0!==s)return s.exports;var o=t[a]={exports:{}};return e[a](o,o.exports,r),o.exports}r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,{a:t}),t},r.d=function(e,t){for(var a in t)r.o(t,a)&&!r.o(e,a)&&Object.defineProperty(e,a,{enumerable:!0,get:t[a]})},r.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"==typeof window)return window}}(),r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},function(){var e;r.g.importScripts&&(e=r.g.location+"");var t=r.g.document;if(!e&&t&&(t.currentScript&&(e=t.currentScript.src),!e)){var a=t.getElementsByTagName("script");a.length&&(e=a[a.length-1].src)}if(!e)throw new Error("Automatic publicPath is not supported in this browser");e=e.replace(/#.*$/,"").replace(/\?.*$/,"").replace(/\/[^\/]+$/,"/"),r.p=e+"../"}(),function(){"use strict";r(57836)}(),function(){"use strict";var e=r(95339),t=r.n(e),a=r(69307),s=(r(73617),r(58627));const o=t()("jetpack:podcast-player"),n={},c=function(e){e.classList.add("is-default"),e.setAttribute("data-jetpack-block-initialized","true")};document.addEventListener("DOMContentLoaded",(()=>{document.querySelectorAll(".wp-block-jetpack-podcast-player:not([data-jetpack-block-initialized])").forEach((e=>{e.classList.remove("is-default"),function(e){const t=document.getElementById(e);if(o("initializing",e,t),!t)return;if("true"===t.getAttribute("data-jetpack-block-initialized"))return;const r=t.querySelector('script[type="application/json"]');if(!r)return void c(t);let i;try{i=JSON.parse(r.text)}catch(e){return o("error parsing json",e),void c(t)}r.remove();const l=t.innerHTML;if(!i||!i.tracks.length)return o("no tracks found"),void c(t);try{const r=(0,a.createElement)(s.Z,{...i,onError:function(){(0,a.unmountComponentAtNode)(t),t.innerHTML=l,c(t)}});n[e]=(0,a.render)(r,t)}catch(e){o("unable to render",e),c(t)}t.setAttribute("data-jetpack-block-initialized","true")}(e.id)}))}))}()}();