(function ($) {
  /**
   * @param $scope The Widget wrapper element as a jQuery element
   * @param $ The jQuery alias
   */
  var WidgetHelloWorldHandler = function ($scope, $) {
    console.log($scope);
    var sliderThumbnail = new Swiper(
      ".elementor-widget-apic_slider .apicbase-tab-slider-thumbnail",
      {
        slidesPerView: 4,
        freeMode: false,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        centeredSlides: false,
        spaceBetween: 40,
      }
    );
    var slider = new Swiper(
      ".elementor-widget-apic_slider .apicbase-tab-slider",
      {
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        thumbs: {
          swiper: sliderThumbnail,
        },
      }
    );
  };

  // Make sure you run this code under Elementor.
  $(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/apic_slider.default",
      WidgetHelloWorldHandler
    );
  });
})(jQuery);
