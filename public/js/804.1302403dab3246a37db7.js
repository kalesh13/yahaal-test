(self.webpackChunk=self.webpackChunk||[]).push([[804],{2957:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>n});const n={name:"GenderSelector",props:["value"],data:function(){return{gender:this.value&&this.value.gender||""}},watch:{gender:function(t){this.$emit("input",{gender:t})}}}},1159:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>c});var n=r(9009),s=r(94),a=r(1699);function i(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function o(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?i(Object(r),!0).forEach((function(e){l(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):i(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function l(t,e,r){return e in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}const c={name:"Filters",props:["submitted","errors"],data:function(){return{filter_by:"",conditions:""}},methods:{submit:function(){this.$emit("onSubmit",o(o({},this.conditions),{},{filter_by:this.filter_by}))}},components:{GenderSelector:s.default,NameSelector:n.default,LocationSelector:a.default}}},2245:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>n});const n={name:"LocationSelector",props:["value","locations"],data:function(){return{location:this.value&&this.value.location||"",radius:this.value&&this.value.radius||200}},watch:{location:function(t){this.$emit("input",{location:t,radius:this.radius})},radius:function(t){this.$emit("input",{location:this.location,radius:t})}},computed:{radiusText:function(){return"Within ".concat(this.radius,"km radius")}}}},5703:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>n});const n={name:"NameSelector",props:["value"],data:function(){return{character:this.value&&this.value.character||""}},watch:{character:function(t){this.$emit("input",{character:t})}}}},8705:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>s});var n=r(3311);const s={name:"Map",props:["users","apiKey"],mounted:function(){var t=this;new n.Loader({apiKey:this.apiKey,version:"weekly"}).load().then((function(){t.map=new google.maps.Map(t.$refs.map,{center:{lat:51.509865,lng:-.118092},zoom:4}),t.users.length>0&&t.initMarkers(t.users)}))},data:function(){return{map:null,markers:[]}},watch:{users:function(t){google&&this.initMarkers(t)}},methods:{initMarkers:function(t){var e=this;this.clearMarkers(),t.forEach((function(t){return e.addMarkers(t)}))},addMarkers:function(t){var e=this,r="male"===t.gender.toLowerCase(),n=new google.maps.Marker({position:new google.maps.LatLng(t.lat,t.lon),icon:"http://maps.google.com/mapfiles/ms/icons/".concat(r?"blue":"pink","-dot.png"),map:this.map});this.markers.push(n);var s=new google.maps.InfoWindow({content:this.infoWindowForUser(t,r)});n.addListener("click",(function(){s.open(e.map,n)}))},infoWindowForUser:function(t,e){var r=e?"fas fa-male":"fas fa-female";return'\n            <div class="info-content">\n                <div class="name">\n                    <strong>'.concat([t.first_name,t.last_name].join(" "),'</strong>\n                    <div class="gender">\n                        <span class="').concat(r,'"></span>\n                    </div>\n                </div>\n                <div class="position">\n                    <span class="fas fa-globe"></span>\n                    <span>').concat([t.lat,t.lon].join(", "),"</span>\n                </div>\n            </div>\n            ")},clearMarkers:function(){(this.markers||[]).forEach((function(t){return t.setMap(null)})),this.markers=[]}}}},9960:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>n});const n={name:"Sidebar",components:{Stats:r(5352).default}}},4771:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>i});var n=r(3136),s=r(7686),a=r.n(s);const i={name:"Stats",mounted:function(){this.df.fetchData(null,this.onSuccess)},data:function(){return{stats:{male:0,female:0},df:new(a())("/api/stats")}},methods:{onSuccess:function(t){this.stats=t}},components:{StatsCard:n.default}}},3306:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>n});const n={name:"StatsCard",props:["icon","label","count","loading"]}},3489:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>l});var n=r(17),s=r(3193),a=r(1499),i=r(7686),o=r.n(i);const l={name:"HomePage",props:["api"],mounted:function(){this.df.fetchData(null,this.onSuccess)},data:function(){return{users:[],df:new(o())("/api/users")}},methods:{onSuccess:function(t){this.users=t},applyFilter:function(t){var e="/api/users?"+this.getQuery(t);this.df.fetchData(e,this.onSuccess)},getQuery:function(t){var e=[];for(var r in t)t.hasOwnProperty(r)&&null!==t[r]&&e.push(encodeURIComponent(r)+"="+encodeURIComponent(t[r]));return e.join("&")}},components:{Sidebar:a.default,Filters:s.default,MapWidget:n.default}}},94:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>i});var n=r(7684),s=r(1299),a={};for(const t in s)"default"!==t&&(a[t]=()=>s[t]);r.d(e,a);const i=(0,r(1900).default)(s.default,n.render,n.staticRenderFns,!1,null,null,null).exports},3193:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>i});var n=r(2995),s=r(6085),a={};for(const t in s)"default"!==t&&(a[t]=()=>s[t]);r.d(e,a);const i=(0,r(1900).default)(s.default,n.render,n.staticRenderFns,!1,null,null,null).exports},1699:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>i});var n=r(352),s=r(2911),a={};for(const t in s)"default"!==t&&(a[t]=()=>s[t]);r.d(e,a);const i=(0,r(1900).default)(s.default,n.render,n.staticRenderFns,!1,null,null,null).exports},9009:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>i});var n=r(3189),s=r(7461),a={};for(const t in s)"default"!==t&&(a[t]=()=>s[t]);r.d(e,a);const i=(0,r(1900).default)(s.default,n.render,n.staticRenderFns,!1,null,null,null).exports},17:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>i});var n=r(3051),s=r(8346),a={};for(const t in s)"default"!==t&&(a[t]=()=>s[t]);r.d(e,a);const i=(0,r(1900).default)(s.default,n.render,n.staticRenderFns,!1,null,null,null).exports},1499:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>i});var n=r(8669),s=r(8075),a={};for(const t in s)"default"!==t&&(a[t]=()=>s[t]);r.d(e,a);const i=(0,r(1900).default)(s.default,n.render,n.staticRenderFns,!1,null,null,null).exports},5352:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>i});var n=r(941),s=r(3347),a={};for(const t in s)"default"!==t&&(a[t]=()=>s[t]);r.d(e,a);const i=(0,r(1900).default)(s.default,n.render,n.staticRenderFns,!1,null,null,null).exports},3136:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>i});var n=r(8194),s=r(9909),a={};for(const t in s)"default"!==t&&(a[t]=()=>s[t]);r.d(e,a);const i=(0,r(1900).default)(s.default,n.render,n.staticRenderFns,!1,null,null,null).exports},6804:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>i});var n=r(3335),s=r(7871),a={};for(const t in s)"default"!==t&&(a[t]=()=>s[t]);r.d(e,a);const i=(0,r(1900).default)(s.default,n.render,n.staticRenderFns,!1,null,null,null).exports},1299:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>a});var n=r(2957),s={};for(const t in n)"default"!==t&&(s[t]=()=>n[t]);r.d(e,s);const a=n.default},6085:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>a});var n=r(1159),s={};for(const t in n)"default"!==t&&(s[t]=()=>n[t]);r.d(e,s);const a=n.default},2911:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>a});var n=r(2245),s={};for(const t in n)"default"!==t&&(s[t]=()=>n[t]);r.d(e,s);const a=n.default},7461:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>a});var n=r(5703),s={};for(const t in n)"default"!==t&&(s[t]=()=>n[t]);r.d(e,s);const a=n.default},8346:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>a});var n=r(8705),s={};for(const t in n)"default"!==t&&(s[t]=()=>n[t]);r.d(e,s);const a=n.default},8075:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>a});var n=r(9960),s={};for(const t in n)"default"!==t&&(s[t]=()=>n[t]);r.d(e,s);const a=n.default},3347:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>a});var n=r(4771),s={};for(const t in n)"default"!==t&&(s[t]=()=>n[t]);r.d(e,s);const a=n.default},9909:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>a});var n=r(3306),s={};for(const t in n)"default"!==t&&(s[t]=()=>n[t]);r.d(e,s);const a=n.default},7871:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>a});var n=r(3489),s={};for(const t in n)"default"!==t&&(s[t]=()=>n[t]);r.d(e,s);const a=n.default},7684:(t,e,r)=>{"use strict";r.r(e);var n=r(7558),s={};for(const t in n)"default"!==t&&(s[t]=()=>n[t]);r.d(e,s)},2995:(t,e,r)=>{"use strict";r.r(e);var n=r(7739),s={};for(const t in n)"default"!==t&&(s[t]=()=>n[t]);r.d(e,s)},352:(t,e,r)=>{"use strict";r.r(e);var n=r(3664),s={};for(const t in n)"default"!==t&&(s[t]=()=>n[t]);r.d(e,s)},3189:(t,e,r)=>{"use strict";r.r(e);var n=r(3105),s={};for(const t in n)"default"!==t&&(s[t]=()=>n[t]);r.d(e,s)},3051:(t,e,r)=>{"use strict";r.r(e);var n=r(9281),s={};for(const t in n)"default"!==t&&(s[t]=()=>n[t]);r.d(e,s)},8669:(t,e,r)=>{"use strict";r.r(e);var n=r(1837),s={};for(const t in n)"default"!==t&&(s[t]=()=>n[t]);r.d(e,s)},941:(t,e,r)=>{"use strict";r.r(e);var n=r(1428),s={};for(const t in n)"default"!==t&&(s[t]=()=>n[t]);r.d(e,s)},8194:(t,e,r)=>{"use strict";r.r(e);var n=r(2798),s={};for(const t in n)"default"!==t&&(s[t]=()=>n[t]);r.d(e,s)},3335:(t,e,r)=>{"use strict";r.r(e);var n=r(5824),s={};for(const t in n)"default"!==t&&(s[t]=()=>n[t]);r.d(e,s)},7558:(t,e,r)=>{"use strict";r.r(e),r.d(e,{render:()=>n,staticRenderFns:()=>s});var n=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"selector pt-2 pb-2"},[r("div",{staticClass:"section-title"},[t._v("Choose gender")]),r("form",{on:{submit:function(t){t.preventDefault()}}},[r("div",{staticClass:"form-group d-flex align-items-center"},[r("input",{directives:[{name:"model",rawName:"v-model",value:t.gender,expression:"gender"}],attrs:{type:"radio",name:"gender",value:"Male"},domProps:{checked:t._q(t.gender,"Male")},on:{change:function(e){t.gender="Male"}}}),r("span",[t._v("Male")])]),r("div",{staticClass:"form-group d-flex align-items-center"},[r("input",{directives:[{name:"model",rawName:"v-model",value:t.gender,expression:"gender"}],attrs:{type:"radio",name:"gender",value:"Female"},domProps:{checked:t._q(t.gender,"Female")},on:{change:function(e){t.gender="Female"}}}),r("span",[t._v("Female")])])])])},s=[]},7739:(t,e,r)=>{"use strict";r.r(e),r.d(e,{render:()=>n,staticRenderFns:()=>s});var n=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"filters-container"},[t._m(0),r("div",{staticClass:"filters"},[r("div",{staticClass:"section-title"},[t._v("Filter by")]),r("form",{on:{submit:function(t){t.preventDefault()}}},[r("div",{staticClass:"form-group d-flex align-items-center"},[r("input",{directives:[{name:"model",rawName:"v-model",value:t.filter_by,expression:"filter_by"}],attrs:{type:"radio",name:"filter_by",value:"gender"},domProps:{checked:t._q(t.filter_by,"gender")},on:{change:function(e){t.filter_by="gender"}}}),r("span",[t._v("Gender")])]),r("div",{staticClass:"form-group d-flex align-items-center"},[r("input",{directives:[{name:"model",rawName:"v-model",value:t.filter_by,expression:"filter_by"}],attrs:{type:"radio",name:"filter_by",value:"name"},domProps:{checked:t._q(t.filter_by,"name")},on:{change:function(e){t.filter_by="name"}}}),r("span",[t._v("Name")])]),r("div",{staticClass:"form-group d-flex align-items-center"},[r("input",{directives:[{name:"model",rawName:"v-model",value:t.filter_by,expression:"filter_by"}],attrs:{type:"radio",name:"filter_by",value:"location"},domProps:{checked:t._q(t.filter_by,"location")},on:{change:function(e){t.filter_by="location"}}}),r("span",[t._v("Location")])])]),"gender"===t.filter_by?r("gender-selector",{model:{value:t.conditions,callback:function(e){t.conditions=e},expression:"conditions"}}):t._e(),"name"===t.filter_by?r("name-selector",{model:{value:t.conditions,callback:function(e){t.conditions=e},expression:"conditions"}}):t._e(),"location"===t.filter_by?r("location-selector",{attrs:{locations:["London","Paris","Kansas City"]},model:{value:t.conditions,callback:function(e){t.conditions=e},expression:"conditions"}}):t._e(),""!==t.filter_by&&t.errors?r("ul",{staticClass:"errors"},[t.errors.server_error?r("li",{domProps:{textContent:t._s(t.errors.server_error)}}):t._l(t.errors,(function(e,n){return r("li",{key:n,domProps:{textContent:t._s(e[0])}})}))],2):t._e(),""!==t.filter_by?r("button",{staticClass:"theme-btn mb-1",attrs:{disabled:t.submitted},on:{click:t.submit}},[t.submitted?r("span",{staticClass:"fas fa-circle-notch fa-spin"}):t._e(),t._v("Apply filter")]):t._e()],1)])},s=[function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"title px-1"},[r("span",{staticClass:"fas fa-filter"}),t._v("Filter")])}]},3664:(t,e,r)=>{"use strict";r.r(e),r.d(e,{render:()=>n,staticRenderFns:()=>s});var n=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"selector pt-2 pb-2"},[r("div",{staticClass:"section-title"},[t._v("Choose location")]),r("form",{on:{submit:function(t){t.preventDefault()}}},[r("div",{staticClass:"form-group"},[r("select",{directives:[{name:"model",rawName:"v-model",value:t.location,expression:"location"}],staticClass:"form-control",on:{change:function(e){var r=Array.prototype.filter.call(e.target.options,(function(t){return t.selected})).map((function(t){return"_value"in t?t._value:t.value}));t.location=e.target.multiple?r:r[0]}}},[r("option",{attrs:{selected:"",value:"",disabled:""}},[t._v("Choose location")]),t._l(t.locations,(function(e,n){return r("option",{key:n,domProps:{value:e,textContent:t._s(e)}})}))],2)]),t.location?r("div",{staticClass:"form-group slider-container"},[r("input",{directives:[{name:"model",rawName:"v-model",value:t.radius,expression:"radius"}],staticClass:"slider",attrs:{type:"range",min:"10",max:"2000"},domProps:{value:t.radius},on:{__r:function(e){t.radius=e.target.value}}}),r("div",{staticClass:"small",domProps:{textContent:t._s(t.radiusText)}})]):t._e()])])},s=[]},3105:(t,e,r)=>{"use strict";r.r(e),r.d(e,{render:()=>n,staticRenderFns:()=>s});var n=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"selector pt-2 pb-2"},[r("div",{staticClass:"section-title"},[t._v("Starting character")]),r("form",{on:{submit:function(t){t.preventDefault()}}},[r("div",{staticClass:"form-group"},[r("input",{directives:[{name:"model",rawName:"v-model",value:t.character,expression:"character"}],staticClass:"form-control",attrs:{name:"character",placeholder:"Starting character of firstname/lastname",maxlength:"1"},domProps:{value:t.character},on:{input:function(e){e.target.composing||(t.character=e.target.value)}}})])])])},s=[]},9281:(t,e,r)=>{"use strict";r.r(e),r.d(e,{render:()=>n,staticRenderFns:()=>s});var n=function(){var t=this.$createElement;return(this._self._c||t)("div",{ref:"map",staticClass:"map w-100"})},s=[]},1837:(t,e,r)=>{"use strict";r.r(e),r.d(e,{render:()=>n,staticRenderFns:()=>s});var n=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"sidebar"},[r("stats"),t._t("default")],2)},s=[]},1428:(t,e,r)=>{"use strict";r.r(e),r.d(e,{render:()=>n,staticRenderFns:()=>s});var n=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"stats-container mb-3"},[t._m(0),r("div",{staticClass:"stats"},[r("stats-card",{attrs:{icon:"fa-male",label:"Males",count:t.stats.male,loading:t.df.fetching}}),r("stats-card",{attrs:{icon:"fa-female",label:"Females",count:t.stats.female,loading:t.df.fetching}})],1)])},s=[function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"title px-1"},[r("span",{staticClass:"fas fa-info-circle"}),t._v("Total Stats")])}]},2798:(t,e,r)=>{"use strict";r.r(e),r.d(e,{render:()=>n,staticRenderFns:()=>s});var n=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"stats-card"},[r("div",{staticClass:"value",domProps:{textContent:t._s(t.count)}}),r("div",{staticClass:"label"},[r("strong",{domProps:{textContent:t._s(t.label)}})])])},s=[]},5824:(t,e,r)=>{"use strict";r.r(e),r.d(e,{render:()=>n,staticRenderFns:()=>s});var n=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("main",{staticClass:"container"},[r("sidebar",{staticClass:"col-4"},[r("filters",{attrs:{submitted:t.df.fetching,errors:t.df.errors},on:{onSubmit:t.applyFilter}})],1),r("div",{staticClass:"map-container w-100 px-2 d-flex"},[r("map-widget",{attrs:{users:t.users,"api-key":t.api}})],1)],1)},s=[]}}]);