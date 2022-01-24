$(document).ready(function () {
   $('.humberger').click(function () {
        $('.header .nav').addClass('active');
   });
   $('.exit').click(function () {
       $('.header .nav').removeClass('active');
   });
    $(".header .scroll-on ").on("click","a", function (event) {
        event.preventDefault();
        $('.header .nav').removeClass('active');
        var id  = $(this).attr('href'),

            top = $(id).offset().top;

        $('body,html').animate({scrollTop: top}, 1500);
    });
    $(".info a").click(function(event) {
      event.preventDefault();
        var id  = $(this).attr('href'),

            top = $(id).offset().top;

        $('body,html').animate({scrollTop: top}, 1500);
    })
  
});