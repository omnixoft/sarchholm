!function(a){"use strict";var t,i;a('[data-toggle="tooltip"]').tooltip(),a("#datepicker-from").datepicker({autoclose:!0,todayHighlight:!0}),a("#datepicker-to").datepicker({autoclose:!0,todayHighlight:!0}),a(".filter-sort-menu li").on("click",(function(){var e=a(this).text();a(".sort-filter-btn").text(e)})),a(".scrolltotop").on("click",(function(){return a("html, body").animate({scrollTop:0},800),!1})),a(document).scroll((function(){600<a(this).scrollTop()?a(".scrolltotop").fadeIn():a(".scrolltotop").fadeOut()})),a(document).scroll((function(){400<a(this).scrollTop()?a(".chat-popup").fadeIn():a(".chat-popup").fadeOut()})),a(window).scroll((function(){100<=a(window).scrollTop()?a(".header-top-section").addClass("header-top-none"):a(".header-top-section").removeClass("header-top-none")})),a("body").scrollspy({target:".list_menu",offset:50}),a("#list-menu a").on("click",(function(e){var t;""!==this.hash&&(e.preventDefault(),t=this.hash,a("html, body").animate({scrollTop:a(t).offset().top},800,(function(){window.location.hash=t})))})),a(".list-details-tab li, .hero_list li").on("click",(function(){a("li").removeClass("active"),a(this).addClass("active")})),i=0,a(window).scroll((function(e){t=!0})),0<a(".scroll-hide").length&&setInterval((function(){t&&(function(){var e=a(this).scrollTop();Math.abs(i-e)<=50||(i<e&&75<e?0<a(".scroll-hide").length&&a("header").addClass("hide"):(0<a(".scroll-hide").length&&e+a(window).height()<a(document).height()&&(a("header").removeClass("hide"),a(".header.transparent").addClass("scroll")),a(window).scrollTop()<300&&a(".header.transparent").removeClass("scroll")),i=e)}(),t=!1)}),100),a(window).on("load resize",(function(){a(".fixed_nav").css("width","100%")})),a(window).scroll((function(){700<=a(window).scrollTop()?a(".list_menu").addClass("fixed-header"):a(".list_menu").removeClass("fixed-header")})),a(".player").mb_YTPlayer({containment:"#video-wrapper",mute:!0,autoplay:!0,showControls:!1,quality:"hd720"}),a(document).ready((function(){a(".popup-yt, .property-yt").magnificPopup({type:"iframe",mainClass:"mfp-fade",preloader:!0}),a("a.btn-gallery").on("click",(function(e){e.preventDefault(),e=a(this).attr("href"),a(e).magnificPopup({delegate:"a",type:"image",gallery:{enabled:!0}}).magnificPopup("open")})),a(".nav-folderized h2").on("click",(function(){a(this).parent(".nav").toggleClass("open"),a("html, body").animate({scrollTop:a(this).offset().top-170},1500)})),a(".js-clone-nav").each((function(){a(this).clone().attr("class","site-nav-wrap").appendTo(".site-mobile-menu-body")})),setTimeout((function(){var t=0;a(".site-mobile-menu .has-children").each((function(){var e=a(this);e.prepend('<span class="arrow-collapse collapsed">'),e.find(".arrow-collapse").attr({"data-toggle":"collapse","data-target":"#collapseItem"+t}),e.find("> ul").attr({class:"collapse",id:"collapseItem"+t}),t++}))}),1e3),a("body").on("click",".js-menu-toggle",(function(e){var t=a(this);e.preventDefault(),a("body").hasClass("offcanvas-menu")?(a("body").removeClass("offcanvas-menu"),t.removeClass("active")):(a("body").addClass("offcanvas-menu"),t.addClass("active"))}));var i=a(".contact-form__rate-bx"),n=a(".rate-actual"),e;i.find("i").on("hover",(function(){for(var e=a(this).index(),t=0;t<=9;t++)i.find("i:lt("+e+"1)").addClass("active"),i.find("i:gt("+e+")").removeClass("active")})),i.find("i").on("click",(function(){for(var e=a(this).index(),t=0;t<=9;t++)i.find("i:lt("+e+"1)").addClass("selected"),i.find("i:gt("+e+")").removeClass("selected");n.text(e+1)})),i.on("mouseout",(function(){i.find("i").removeClass("active")})),a("#slider-range_one").slider({range:!0,min:0,max:8e3,values:[1200,4014],slide:function(event,ui){$("#amount_one").val(ui.values[0]+" - "+ui.values[1]+" sq ft")}}),a(" #amount_one").val(a("#slider-range_one").slider("values",0)+" - "+a("#slider-range_one").slider("values",1)+" sq ft"),a("#slider-range_two").slider({range:!0,min:0,max:1e4,values:[0,5600],slide:function(event,ui){a("#amount_two").val(ui.values[0]+" - "+ui.values[1])}}),a(" #amount_two").val(a("#slider-range_two").slider("values",0)+" - "+a("#slider-range_two").slider("values",1)),a(".chat-popup, .chat-close").click((function(){a(".agent-chat-form").toggle()})),a(".dropdown-filter").on("click",(function(){a(".explore__form-checkbox-list").toggleClass("filter-block")})),new Swiper(".trending-place-wrap",{slidesPerView:3,spaceBetween:30,speed:1500,loop:!0,pagination:{el:".trending-pagination",clickable:!0},breakpoints:{767:{slidesPerView:1,slidesPerGroup:1},1199:{slidesPerView:2,spaceBetween:30}}}),new Swiper(".single-property-slider",{slidesPerView:1,spaceBetween:0,speed:1500,loop:!0,navigation:{nextEl:".single-property-next",prevEl:".single-property-prev"}}),new Swiper(".hero-slider-wrap",{slidesPerView:1,spaceBetween:0,speed:1500,loop:!0,effect:"fade",navigation:{nextEl:".single-property_next",prevEl:".single-property_prev"}}),new Swiper(".featured-property-wrap.v1",{slidesPerView:1,spaceBetween:0,effect:"fade",speed:1500,loop:!0,navigation:{nextEl:".featured-next",prevEl:".featured-prev"}}),new Swiper(".featured-property-wrap.v2",{slidesPerView:3,spaceBetween:30,speed:1500,loop:!0,autoplay:{delay:2e3,disableOnInteraction:!1},navigation:{nextEl:".featured_next",prevEl:".featured_prev"},breakpoints:{767:{slidesPerView:1,slidesPerGroup:1,spaceBetween:30},1199:{slidesPerView:2,spaceBetween:30}}}),new Swiper(".featured-property-wrap.v3",{slidesPerView:1,spaceBetween:0,speed:1500,effect:"fade",loop:!0,navigation:{nextEl:".feature-next",prevEl:".feature-prev"},breakpoints:{991:{slidesPerView:1,slidesPerGroup:1,spaceBetween:10},1199:{slidesPerView:2,spaceBetween:30}}}),new Swiper(".property-slider",{slidesPerView:1,spaceBetween:0,speed:700,loop:!0,navigation:{nextEl:".property-next",prevEl:".property-prev"}}),new Swiper(".similar-list-wrap",{slidesPerView:3,spaceBetween:30,loop:!1,speed:1e3,navigation:{nextEl:".similar-next",prevEl:".similar-prev"},breakpoints:{768:{slidesPerView:1,spaceBetween:30},1100:{slidesPerView:2,spaceBetween:30}}}),new Swiper(".featured-list",{slidesPerView:1,spaceBetween:5,loop:!0,speed:1e3,navigation:{nextEl:".featured-next",prevEl:".featured-prev"},breakpoints:{767:{slidesPerView:1,spaceBetween:30}}}),new Swiper(".single-featured-list",{slidesPerView:1,spaceBetween:0,autoplay:{delay:3e3,disableOnInteraction:!1},loop:!0,speed:1e3,navigation:{nextEl:".single-featured-next",prevEl:".single-featured-prev"}}),new Swiper(".popular-place-wrap.v1",{slidesPerView:3,spaceBetween:30,loop:!1,speed:1e3,navigation:{nextEl:".popular-next",prevEl:".popular-prev"},breakpoints:{768:{slidesPerView:1},991:{slidesPerView:2,spaceBetween:30},1200:{slidesPerView:3,spaceBetween:30}}}),new Swiper(".partner-wrap",{slidesPerView:5,spaceBetween:30,loop:!0,speed:1e3,autoplay:{delay:2500,disableOnInteraction:!1},navigation:{nextEl:".partner-next",prevEl:".partner-prev"},breakpoints:{575:{slidesPerView:2,spaceBetween:30},767:{slidesPerView:3,spaceBetween:30},991:{slidesPerView:4,spaceBetween:30}}}),new Swiper(".testimonial-wrapper",{slidesPerView:1,loop:!0,speed:1e3,effect:"fade",navigation:{nextEl:".client-next",prevEl:".client-prev"}}),new Swiper(".client-wrapper",{slidesPerView:3,loop:!1,spaceBetween:30,speed:1e3,navigation:{nextEl:".testimonial-next",prevEl:".testimonial-prev"},breakpoints:{991:{slidesPerView:1},1199:{slidesPerView:2}}}),new Swiper(".team-wrapper",{slidesPerView:4,loop:!0,speed:1e3,spaceBetween:30,navigation:{nextEl:".team_next",prevEl:".team_prev"},breakpoints:{767:{slidesPerView:1,spaceBetween:50},991:{slidesPerView:2,spaceBetween:30},1025:{slidesPerView:3,spaceBetween:30}}}),new Swiper(".listing-details-slider",{slidesPerView:3,spaceBetween:0,loop:!0,speed:1e3,navigation:{nextEl:".listing-details-next",prevEl:".listing-details-prev"},autoplay:{delay:3e3,disableOnInteraction:!1},breakpoints:{767:{slidesPerView:1,spaceBetween:15}}}),new Swiper(".single-agency-slider",{slidesPerView:1,spaceBetween:0,effect:"fade",loop:!0,speed:1e3,navigation:{nextEl:".single-agency_next",prevEl:".single-agency_prev"},breakpoints:{767:{slidesPerView:1,spaceBetween:15}}}),0<a("./*counter*/-widget").length&&(e=a(".counter-widget").attr("data-countDate"),a(".countdown").downCount({date:e,offset:0}))})),a("select").selectpicker(),a(".quantity-right-plus").on("click",(function(e){e.preventDefault(),e=parseInt(a(this).parent().siblings("input.input-number").val(),10),a(this).parent().siblings("input.input-number").val(e+1)})),a(".quantity-left-minus").on("click",(function(e){e.preventDefault(),0<(e=parseInt(a(this).parent().siblings("input.input-number").val(),10))&&a(this).parent().siblings("input.input-number").val(e-1)}))}(jQuery);