(window.webpackWcBlocksJsonp=window.webpackWcBlocksJsonp||[]).push([[12],{316:function(t,e){},365:function(t,e,n){"use strict";n.r(e);var s=n(0),r=(n(8),n(1)),c=n(4),o=n.n(c),a=n(49),u=n(110);n(316);e.default=Object(u.withProductDataContext)(t=>{let{className:e}=t;const{parentClassName:n}=Object(a.useInnerBlockLayoutContext)(),{product:c}=Object(a.useProductDataContext)(),u=(t=>{const e=parseFloat(t.average_rating);return Number.isFinite(e)&&e>0?e:0})(c);if(!u)return null;const i={width:u/5*100+"%"},l=Object(r.sprintf)(
/* translators: %f is referring to the average rating value */
Object(r.__)("Rated %f out of 5",'woocommerce'),u),b=(t=>{const e=parseInt(t.review_count,10);return Number.isFinite(e)&&e>0?e:0})(c),p={__html:Object(r.sprintf)(
/* translators: %1$s is referring to the average rating value, %2$s is referring to the number of ratings */
Object(r._n)("Rated %1$s out of 5 based on %2$s customer rating","Rated %1$s out of 5 based on %2$s customer ratings",b,'woocommerce'),Object(r.sprintf)('<strong class="rating">%f</strong>',u),Object(r.sprintf)('<span class="rating">%d</span>',b))};return Object(s.createElement)("div",{className:o()(e,"wc-block-components-product-rating",{[n+"__product-rating"]:n})},Object(s.createElement)("div",{className:o()("wc-block-components-product-rating__stars",n+"__product-rating__stars"),role:"img","aria-label":l},Object(s.createElement)("span",{style:i,dangerouslySetInnerHTML:p})))})}}]);