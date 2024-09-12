document.addEventListener("DOMContentLoaded", function () {
  initMobileMenu();

  function initMobileMenu() {
    const menuBurger = document.querySelector('.menu-burger');
    const menu = document.querySelector('.header-menu');

    menuBurger.addEventListener('click', function () {
      this.classList.toggle('active');
      menu.classList.toggle('active');
    });

  }

  const breakpoint = window.matchMedia('(min-width:900px)');

  let mySwiper;
  const breakpointChecker = function () {
    if (breakpoint.matches === true) {
      if (mySwiper !== undefined) mySwiper.destroy(true, true);
      return;

    } else if (breakpoint.matches === false) {
      return enableSwiper();
    }
  };

  const enableSwiper = function () {

    mySwiper = new Swiper('.plans-swiper', {
      slidesPerView: "auto",
      spaceBetween: 15,
      loop: true,
      centeredSlides: true,
      breakpoints: {
        575: {
          centeredSlides: false,
        },
      },
    });
  };

  breakpoint.addEventListener('change', breakpointChecker);

  breakpointChecker();

});

!function ($) {
  let activeLine = $('<div class="active-line"></div>');
  let tabsNav = $('.tabs .tabs-nav');
  let activeItem = $('.tabs .nav-item.active');

  function updateActiveLine(item) {
    let itemWidth = item.outerWidth();
    let itemHeight = item.outerHeight();
    let itemLeft = item.position().left - tabsNav.scrollLeft();
    let itemTop = item.position().top - tabsNav.scrollTop();

    if ($(window).width() >= 1280) {
      activeLine.css({ width: itemWidth + 'px', left: itemLeft + 'px', top: '' });
    } else {
      activeLine.css({ width: '100%', height: itemHeight + 'px', top: itemTop + 'px', left: '' });
    }
  }

  tabsNav.append(activeLine);
  updateActiveLine(activeItem);

  $('.tabs .nav-item').click(function () {
    let id = $(this).attr('data-tab');
    let content = $('.tabs-content .tab-item[data-tab="' + id + '"]');

    $('.tabs .nav-item.active').removeClass('active');
    $('.tabs-content .tab-item.active').removeClass('active');

    $(this).addClass('active');
    content.addClass('active');

    updateActiveLine($(this));
  });

  $(window).resize(function () {
    updateActiveLine($('.tabs .nav-item.active'));
  });

}(jQuery);