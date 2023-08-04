$(document).ready(function () {
  $("#hamburger-menu .menu-item-has-children > a").on("click", function (e) {
    e.preventDefault();
    $(this).parent().find("ul.sub-menu:first").toggle("slow");
  });
  $(".hamburger-menu-open").on("click", function (e) {
    e.preventDefault();
    $(".hamburger-menu-wrapper").fadeIn();
    $(".hamburger-menu-container").animate({ left: "0" });
  });
  $(".hamburger-menu-close").on("click", function () {
    $(".hamburger-menu-container").animate({ left: "-100%" });
    $(".hamburger-menu-wrapper").fadeOut();
  });

  const themeUrl = $("#themeUrl").val();
  $(".wp-block-gallery").slick({
    arrows: false,
    dots: true,
    slidesToShow: 2,
  });

  $(".tabs > li a").on("click", function (e) {
    e.preventDefault();
    $(".tabs > li .active").removeClass("active");
    $(this).addClass("active");
    const target = $(this).attr("data-tab");

    $(".tabs-container .active").removeClass("active");
    $(`.tabs-container #${target}`).addClass("active");
  });

  $("#changeTheme").on('click', function() {
    console.log('trigger')
    $('body').toggleClass('dark')
  })
  
});
