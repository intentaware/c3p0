jQuery(document).ready(function($){
  $('a[href*=#]').click(function() {
    if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'')&& location.hostname === this.hostname) {
      var $target = $(this.hash);
      $target = $target.length && $target|| $('[name=' + this.hash.slice(1) +']');
      if ($target.length) {
        var targetOffset = $target.offset().top;
        $('html,body')
        .animate({scrollTop: targetOffset}, 1000);
       return false;
      }
    }
  });
  $(".page-scroll").mouseover(function() {
    $(this).find("ul").wrap("<div class='subDiv'></div>").hide().css("display","block").fadeIn("250");
  }).mouseout(function() {
    $(this).find("ul").unwrap().css("display","none").fadeOut("250").hide();
  });
});
