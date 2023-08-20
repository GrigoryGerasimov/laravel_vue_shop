jQuery(function ($) {
  'use strict';

  $(document).on('jq_init', () => {

    /****======  Sticky Header ======*******/
    var scrollPosition = window.scrollY;
    if (scrollPosition >= 400) {
      $(".sticy-header").addClass("animated fadeInDown fixed");
    }
    var header = $(".sticy-header");
    $(window).on("scroll", function () {
      if ($(this).scrollTop() < 400) {
        header.removeClass("animated fadeInDown fixed");
      } else {
        header.addClass("animated fadeInDown fixed");
      }
    });

    /****======  Active class add Remove  ======*******/
    $(".menubar").on("click", function () {
      $(".mobile-menu__sidebar-menu ").addClass("active");
      $(".menu-closer").addClass("active");
    });

    $(".menu-closer").on("click", function () {
      $(".mobile-menu__sidebar-menu ").removeClass("active");
      $(".menu-closer").removeClass("active");
    });

    $(".cart-icon").on("click", function () {
      $(".side-cart").addClass("active");
      $(".side-cart-closer").addClass("active");
    });
    $(".cart-close").on("click", function () {
      $(".side-cart").removeClass("active");
      $(".side-cart-closer").removeClass("active");
    });

    $(".menubar").on("click", function () {
      $(".sidebar-content").addClass("active");
      $(".sidebar-content-closer").addClass("active");
    });
    $(".close-side-widget").on("click", function () {
      $(".sidebar-content").removeClass("active");
    });

    $(".sidebar-content-closer").on("click", function () {
      $(".sidebar-content-closer").removeClass("active");
      $(".sidebar-content").removeClass("active");
    });

    $(".close-side-widget").on("click", function () {
      $(".sidebar-content-closer").removeClass("active");
    });

    $(".side-cart-closer").on("click", function () {
      $(".side-cart").removeClass("active");
      $(".side-cart-closer").removeClass("active");
    });

    $(".slidebarfilter, .remove-sidebar").on("click", function () {
      $(".shop-grid-sidebar").toggleClass("active");
    });

    $(".varients li a").on("click", function () {
      $(".varients li a").removeClass("active");
      $(this).addClass("active");
    });

    /****======  Product Image Change  ======*******/
    if ($(".products-grid-one__product-varient img").length) {
      $(".products-grid-one__product-varient img").on("click", function () {
        $(this).parent().parent().parent().find(".products-grid-one__hover-img").attr("src", $(this).attr("src"));
      });
    };

    /****======  Zoom Product  ======*******/
    if ($(".single-product-two .single-item").length) {
      $(".single-product-two .single-item").zoom();
    };

    if ($(".single-product-three .single-item").length) {
      $(".single-product-three .single-item").magnificPopup({
        delegate: 'a',
        type: 'image'
      });
    };

    /****======  niceSelect  ======*******/
    if ($("select").length) {
      $("select").niceSelect();
    };


    /****======  Wow  ======*******/
    new WOW().init();


    /****====== Magnific popup_link  ======*******/
    if ($(".popup_link").length) {
      $(".popup_link").magnificPopup({
        type: "inline",
        midClick: true,
        mainClass: "mfp-fade"
      });
    };

    /****====== MIXitup ======*******/
    if ($(".products-grid").length) {
      $('#grid').mixItUp();
    };

    /****======  Jquery tabs  ======*******/
    $(".tabs").tabs({
      neighbors: {
        prev: $("button.prev"),
        next: $("button.next")
      }
    });

    /* password show hide on form field  */
    if ($(".eye .icon-2").length) {
      $(".eye .icon-2").click(function () {
        var x = document.getElementById("password-field");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
        $(this).hide();
        $(".eye .icon-1").css("display", "block");
      });
    };

    if ($(".eye .icon-1").length) {
      $(".eye .icon-1").click(function () {
        var x = document.getElementById("password-field");
        if (x.type === "text") {
          x.type = "password";
        } else {
          x.type = "text";
        }
        $(this).hide();
        $(".eye .icon-2").css("display", "block");
      });
    };

    /****======  Bottom to Top Scroll Js  ======*******/
    var ScrollTop = $(".scrollToTop");
    $(window).on("scroll", function () {
      if ($(this).scrollTop() < 500) {
        ScrollTop.removeClass("active");
      } else {
        ScrollTop.addClass("active");
      }
    });
    $(".scrollToTop").on("click", function () {
      $("html, body").animate({
        scrollTop: 0
      }, 250);
      return false;
    });

    $(window).on("load", function () {

      /****======  Preloader Js  ======*******/
      $(".loader").delay(500).animate({
        "opacity": "0"
      }, 500, function () {
        $(".loader").css("display", "none");
      });
    });
  })


}(jQuery));