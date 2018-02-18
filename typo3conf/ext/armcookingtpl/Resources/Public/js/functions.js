( function( $ ) {
  "use strict";

  function is_display_type(display_type){
    return ( ($('.display-type').css('content') == display_type) || ($('.display-type').css('content') == '"'+display_type+'"'));
  }
  function not_display_type(display_type){
    return ( ($('.display-type').css('content') != display_type) && ($('.display-type').css('content') != '"'+display_type+'"'));
  }

  // DOCUMENT READY
  $(function() {

    $('.share-recipe-btn, .trigger-share-recipe-lightbox, .share-meal-plan').on('click', function(){
      if($('.full-screen-share-box').length){
        $('.full-screen-share-box').remove();
      }else{
        $('body').append('<div class="full-screen-share-box"><div class="post-share-box">' + $('.post-share-box').html() + '</div></div>');
      }
      return false;
    });

    $('body').on('click', '.full-screen-share-box .psb-close', function(){
      $('.full-screen-share-box').remove();
      return false;
    });


    // GIF IMAGES CONTROLS
    if($('.gif-media').length){
      $('.gif-media').freezeframe();
    }
    if($('.gif-media-lazy').length){
      $('.gif-media-lazy').gifplayer();
      $('.gif-media-lazy-w').mouseleave(function(){
        $(this).find('.gif-media-lazy').gifplayer('stop');
      });
    }
    // END GIF IMAGES CONTROLS

    if($('.os-parallax').length && not_display_type('phone') && not_display_type('tablet')){
      var isSafari = !!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/);

      var $osParallax = $('.os-parallax');
      var bodyHeight = $('body').height();
      var windowHeight = $(window).height();
      var newBodyHeight = 0;
      var parallaxImageProportions = $osParallax.data('height') / $osParallax.data('width');
      var bodyProportions = bodyHeight / $('body').width();
      var imageCoveredHeight = Math.round($('body').width() * parallaxImageProportions);

      var parallaxProportionsToBody = ((bodyHeight - windowHeight) / (imageCoveredHeight - windowHeight)).toFixed(2);

      if(isSafari){
        // if its safari browser - use css transform becuase it works better
        $(window).scroll(function() {
          newBodyHeight = $('body').height();
          if(newBodyHeight != bodyHeight){
            imageCoveredHeight = Math.round($('body').width() * parallaxImageProportions);
            parallaxProportionsToBody = ((newBodyHeight - windowHeight) / (imageCoveredHeight - windowHeight)).toFixed(2);
          }
          var scroll_value = -(Math.round($(document).scrollTop() / parallaxProportionsToBody));
          $osParallax.css({
            'transform': 'translateY('+scroll_value+'px)'
          });
        });
      }else{
        $(window).scroll(function() {
          newBodyHeight = $('body').height();
          if(newBodyHeight != bodyHeight){
            imageCoveredHeight = Math.round($('body').width() * parallaxImageProportions);
            parallaxProportionsToBody = ((newBodyHeight - windowHeight) / (imageCoveredHeight - windowHeight)).toFixed(2);
          }
          var scroll_value = -(Math.round($(document).scrollTop() / parallaxProportionsToBody));
          $osParallax.css({
            'top': scroll_value
          });
        });
      }
    }


    // timed scroll event
    var uniqueCntr = 0;
    $.fn.scrolled = function (waitTime, fn) {
        if (typeof waitTime === "function") {
            fn = waitTime;
            waitTime = 50;
        }
        var tag = "scrollTimer" + uniqueCntr++;
        this.scroll(function () {
            var self = $(this);
            var timer = self.data(tag);
            if (timer) {
                clearTimeout(timer);
            }
            timer = setTimeout(function () {
                self.removeData(tag);
                fn.call(self[0]);
            }, waitTime);
            self.data(tag, timer);
        });
    }

    $(window).scrolled(function(){
        if($('.top-menu').length && $('.fixed-header-w').length){
          var offset = $('.top-menu').offset();
          var trigger_point = offset.top + $('.top-menu').outerHeight();
          if($(document).scrollTop() >= trigger_point){
            $('body').addClass('fix-top-menu');
          }else{
            $('body').removeClass('fix-top-menu');
          }
        }
    });

    if(not_display_type('phone') && $('.single-panel-details-i').length && $('.single-panel-details').hasClass('move-on-scroll')){

      // how to use this code
      $(window).scrolled(function() {

        if ($('.single-panel-details-i').data('current-offset')) {
          var currentOffset = $('.single-panel-details-i').data('current-offset');
        }else{
          var currentOffset = 0;
        }

        var sidebarWrapperBottom = $('.single-panel-details').position().top + $('.single-panel-details').outerHeight();
        var sidebarBottom = $('.single-panel-details').position().top + $('.single-panel-details-i').outerHeight() + 100;
        var sidebarTop = $('.single-panel-details').position().top + currentOffset;
        var panelDifference = $('.single-panel-details').height() - $('.single-panel-details-i').outerHeight();

        var screenBottom = $(document).scrollTop() + $(window).outerHeight();
        var screenTop = $(document).scrollTop();
        var emptyGap = 0;
        var sidebar_offset = 0;
        if($(window).height() > $('.single-panel-details-i').height()){
          emptyGap = $(window).height() - $('.single-panel-details-i').height() - 100;
        }

        if((screenBottom > (sidebarBottom + currentOffset))){
          if(screenBottom > sidebarWrapperBottom){
            if(emptyGap > 0){
              emptyGap = emptyGap - (screenBottom - sidebarWrapperBottom);
              if(emptyGap < 0) emptyGap = 0;
            }
            sidebar_offset = panelDifference - emptyGap;
            if(sidebar_offset < 0) sidebar_offset = 0;
          }else{
            sidebar_offset = screenBottom - sidebarBottom - emptyGap;
          }


          $('.single-panel-details-i').css({
            '-webkit-transform' : 'translateY(' + sidebar_offset + 'px)',
            '-moz-transform'    : 'translateY(' + sidebar_offset + 'px)',
            '-ms-transform'     : 'translateY(' + sidebar_offset + 'px)',
            '-o-transform'      : 'translateY(' + sidebar_offset + 'px)',
            'transform'         : 'translateY(' + sidebar_offset + 'px)'
          });
          $('.single-panel-details-i').data('current-offset', sidebar_offset);
        }else if(screenTop < sidebarTop){

          sidebar_offset = screenTop - $('.single-panel-details').position().top;
          if(sidebar_offset < 0) sidebar_offset = 0;
          $('.single-panel-details-i').css({
            '-webkit-transform' : 'translateY(' + sidebar_offset + 'px)',
            '-moz-transform'    : 'translateY(' + sidebar_offset + 'px)',
            '-ms-transform'     : 'translateY(' + sidebar_offset + 'px)',
            '-o-transform'      : 'translateY(' + sidebar_offset + 'px)',
            'transform'         : 'translateY(' + sidebar_offset + 'px)'
          });
          $('.single-panel-details-i').data('current-offset', sidebar_offset);
        }
      });
      
    }

    // INGREDIENTS CHECKMARK LOGIC
    $('.ingredients-table tr .ingredient-action').on('click', function(){
      var $tr = $(this).closest('tr');
      if($tr.hasClass('ingredient-off')){
        $tr.removeClass('ingredient-off');
        $tr.find('i.os-icon').addClass('os-icon-circle-o').removeClass('os-icon-check');
      }else{
        $tr.addClass('ingredient-off');
        $tr.find('i.os-icon').addClass('os-icon-check').removeClass('os-icon-circle-o');
      }
    });

    $('body').on('click', '.single-step-number-i', function(){
      var $step = $(this).closest('.single-step');
      if($step.hasClass('step-off')){
        $step.removeClass('step-off');
        $(this).find('.os-icon').removeClass('os-icon-check').addClass('os-icon-circle-o');
      }else{
        $step.addClass('step-off');
        $(this).find('.os-icon').removeClass('os-icon-circle-o').addClass('os-icon-check');
      }
      return false;
    });


    $('body').on('click', '.single-content .aisl-font', function(){
      var font_changes_count = $('.single-content').data('font-change-count');
      if(font_changes_count == 0){
        $('.single-content').css('font-size', '18px');
        $('.single-content').data('font-change-count', 1);          
      }else if(font_changes_count == 1){
        $('.single-content').css('font-size', '22px');
        $('.single-content').data('font-change-count', 2);          
      }else if(font_changes_count == 2){
        $('.single-content').css('font-size', '26px');
        $('.single-content').data('font-change-count', 3);          
      }else if(font_changes_count == 3){
        $('.single-content').css('font-size', '30px');
        $('.single-content').data('font-change-count', 4);   
      }else if(font_changes_count == 4){
        $('.single-content').css('font-size', '16px');
        $('.single-content').data('font-change-count', 0);          
      }else{
        $('.single-content').css('font-size', '18px');
        $('.single-content').data('font-change-count', 1);   
      }
      return false;
    });

    $('body').on('click', '.cooking-mode-w .aisl-font', function(){
      var font_changes_count = $('.cooking-mode-w').data('font-change-count');
      if(font_changes_count == 0){
        $('.cooking-mode-i').css('font-size', '21px');
        $('.cooking-mode-w').data('font-change-count', 1);          
      }else if(font_changes_count == 1){
        $('.cooking-mode-i').css('font-size', '24px');
        $('.cooking-mode-w').data('font-change-count', 2);          
      }else if(font_changes_count == 2){
        $('.cooking-mode-i').css('font-size', '28px');
        $('.cooking-mode-w').data('font-change-count', 3);          
      }else if(font_changes_count == 3){
        $('.cooking-mode-i').css('font-size', '32px');
        $('.cooking-mode-w').data('font-change-count', 4);   
      }else if(font_changes_count == 4){
        $('.cooking-mode-i').css('font-size', '19px');
        $('.cooking-mode-w').data('font-change-count', 0);          
      }else{
        $('.cooking-mode-i').css('font-size', '21px');
        $('.cooking-mode-w').data('font-change-count', 1);   
      }
      return false;
    });



    /// ------------------
    /// BOOKMARKS CLOSE BUTTON
    /// ------------------
    
    $('.single-recipe-bookmark-box .close-btn').on('click', function(){
      $('.single-recipe-bookmark-box .userpro-bm').slideToggle();
      return false;
    });

    /// ------------------
    /// NUTRITIONS CLOSE BUTTON
    /// ------------------
    
    $('.single-nutritions .close-btn').on('click', function(){
      $('.single-nutritions .single-nutritions-list').slideToggle();
      return false;
    });



    /// ------------------
    /// INGREDIENTS CLOSE BUTTON
    /// ------------------

    $('.single-ingredients .close-btn').on('click', function(){
      $('.single-ingredients table').fadeToggle();
      return false;
    });

    $('.read-comments-link').on('click', function(){
      $('.comment-list').toggle();
      return false;
    });

    $('.search-trigger, .mobile-menu-search-toggler').on('click', function(){
      $('body').addClass('active-search-form');
      $('.main-search-form-overlay').fadeIn(300);
      $('.main-search-form .search-field').focus();
    });

    $('.main-search-form-overlay').on('click', function(){
      $('body').removeClass('active-search-form');
      $('.main-search-form-overlay').fadeOut(300);
    });



    /// ------------------
    /// mobile menu activator
    /// ------------------
    $('.mobile-menu-toggler').on('click', function(){
      $('.mobile-header-menu-w').slideToggle(400);
      $('.top-profile-links-box-container').slideToggle(400);
    });


    $(document).keyup(function(e) {
      if (e.keyCode == 27) { 
        $('body').removeClass('active-search-form');
        $('.main-search-form-overlay').fadeOut(300);
      }
    });


    var gridLayoutMode = $('.masonry-grid').data('layout-mode');
    var $os_masonry_grid = $('.masonry-grid-temp').isotope({
      percentPosition: true,
      itemSelector: '.masonry-item',
      layoutMode: gridLayoutMode,
      masonry: {
      }
    });

    // REGULAR POST GALLERY
    var $post_gallery = $(".single-post-gallery-images-i");
    if ($post_gallery.length) {
      $post_gallery.owlCarousel({
        items: 4,
        loop: false,
        nav: $post_gallery.find('.gallery-image-source').length > 4 ? true : false,
        dots: false,
        navText : ['<i class="os-icon os-icon-chevron-left"></i>', '<i class="os-icon os-icon-chevron-right"></i>']
      });
    }
    $('.single-post-gallery-images .gallery-image-source').on('click', function(){
      var image_id = $(this).data('image-id');
      $('.single-main-media-image-w.active').removeClass('active');
      $('#'+image_id).addClass('active');
      return false;
    });

    // HERO POSTS
    var $hero_owl = $('.hero-posts-owl-slider');
    if ($hero_owl.length) {
      var looped = ($hero_owl.children().length > 1) ? true : false;
      $hero_owl.owlCarousel({
        items: 1,
        loop: looped,
        nav: true,
        dots: true,
        navText : ['<i class="os-icon os-icon-chevron-left"></i>', '<i class="os-icon os-icon-chevron-right"></i>']
      });
    }

    // FEATURED POSTS
    var $featured_owl = $('.featured-recipes-owl-slider');
    if ($featured_owl.length) {
      var looped = ($featured_owl.children().length > 1) ? true : false;
      $featured_owl.owlCarousel({
        loop: looped,
        center: true,
        autoWidth: true
      });
    }

    // STICKY POSTS
    var $sticky_owl = $(".sticky-posts-owl-slider");
    if ($sticky_owl.length) {
      $sticky_owl.owlCarousel({
        items: 1,
        loop: false,
        nav: true,
        dots: true,
        navText : ['<i class="os-icon os-icon-chevron-left"></i>', '<i class="os-icon os-icon-chevron-right"></i>']
      });
    }

    // Tooltip

    $('.tooltip-trigger').on({
      mouseenter: function(){
        var tooltip_header = $(this).data('tooltip-header');
        $(this).append('<div class="tooltip-box"><div class="tooltip-box-header">'+ tooltip_header +'</div></div>');
      },
      mouseleave: function(){
        $(this).find('.tooltip-box').remove();
      }
    });


    // Go to the next item
    $('.featured-recipes-fade-left').on('click', function() {
        $featured_owl.trigger('prev.owl.carousel');
    });
    // Go to the previous item
    $('.featured-recipes-fade-right').on('click', function() {
        $featured_owl.trigger('next.owl.carousel');
    });


    // --------------------------------------------

    // ACTIVATE TOP MENU

    // --------------------------------------------

    // MAIN TOP MENU HOVER DELAY LOGIC
    var menu_timer;
    $('.menu-activated-on-hover > ul > li.menu-item-has-children').mouseenter(function(){
      var $elem = $(this);
      clearTimeout(menu_timer);
      $elem.closest('ul').addClass('has-active').find('> li').removeClass('active');
      $elem.addClass('active');
    });
    $('.menu-activated-on-hover > ul > li.menu-item-has-children').mouseleave(function(){
      var $elem = $(this);
      menu_timer = setTimeout(function(){
        $elem.removeClass('active').closest('ul').removeClass('has-active');

      }, 200);
    });

    // SUB MENU HOVER DELAY LOGIC
    var sub_menu_timer;
    $('.menu-activated-on-hover > ul > li.menu-item-has-children > ul > li.menu-item-has-children').mouseenter(function(){
      var $elem = $(this);
      clearTimeout(sub_menu_timer);
      $elem.closest('ul').addClass('has-active').find('> li').removeClass('active');
      $elem.addClass('active');
      if($elem.length){
        var sub_menu_right_offset = $elem.offset().left + ($elem.outerWidth() * 2);
        if(sub_menu_right_offset >= $('body').width()){
          $elem.addClass('active-left');
        }
      }
    });
    $('.menu-activated-on-hover > ul > li.menu-item-has-children > ul > li.menu-item-has-children').mouseleave(function(){
      var $elem = $(this);
      sub_menu_timer = setTimeout(function(){
        $elem.removeClass('active').removeClass('active-left').closest('ul').removeClass('has-active');

      }, 200);
    });


    $('.menu-activated-on-click li.menu-item-has-children > a').on('click', function(event){
      var $elem = $(this).closest('li');
      $elem.toggleClass('active');
      return false;
    });

    // $('.top-menu .sub-menu li.menu-item-has-children, .fixed-top-menu-w .sub-menu li.menu-item-has-children').on('mouseenter', function(event){
    //   var $elem = $(this).closest('li');
    //   $elem.addClass('active');
    //   return false;
    // });
    // $('.top-menu .sub-menu li.menu-item-has-children, .fixed-top-menu-w .sub-menu li.menu-item-has-children').on('mouseleave', function(event){
    //   var $elem = $(this).closest('li');
    //   $elem.removeClass('active');
    //   return false;
    // });


    // SHARE POST LINK
    $('.post-control-share, .single-panel .psb-close').on('click', function(){
      $('.post-share-box').slideToggle(500);
      return false;
    });

    // select all text on click when trying to share a url
    $('.psb-url-input').on('click', function(){
      $(this).select();
    });


  });


})(jQuery);
