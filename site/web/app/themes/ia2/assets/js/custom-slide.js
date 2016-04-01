var SLIDESHOW_ACTIVE_CLASS = "ui-state-slide-active";
var $ = jQuery.noConflict();
function init_intent_quality_slideshow()
{
    var $section2 = $("#section-2");
    if ($section2.length == 0) {return;}
    var $slide_cover_wrapper = $(".section-slide-cover-wrapper", $section2);
    var $slide_wrapper = $(".section-slide-wrapper", $section2);
    var $slide_container = $(".section-slide-container", $section2);
    var $slide_cover_buttons = $("a.slide-cover-button", $slide_cover_wrapper);
    var $nav_btns = $(".section-slide-navigation-list a", $section2);
        $($nav_btns[0]).addClass("active")
    var $back_btn = $(".back-btn", $section2);
    var $all_slides = $(".section-slide", $section2);
    var all_slides_length = $all_slides.length;

    //#.init slideshow
    var $slides = $(".section-slides", $section2);
    $slides.slidesjs({
        width: 940,
        height: 528,
        callback: {
            complete: function(number)
            {
                $nav_btns.removeClass("active");
                $($nav_btns[number-1]).addClass("active")
                
                var $navigation_buttons = $(".slidesjs-navigation", $slide_container);

                $navigation_buttons.removeClass("disabled");
                if (number == all_slides_length) {
                    $($navigation_buttons[1]).addClass("disabled");
                } else if (number == 1) {
                    $($navigation_buttons[0]).addClass("disabled");
                }
                
            }
        }
    });
    
    var show_slideshow = function()
    {
        $section2.addClass(SLIDESHOW_ACTIVE_CLASS);

        $slide_cover_wrapper.animate({
            opacity: 0
        }, {
            duration: 250
        });
        $slide_wrapper.animate({
            opacity: 1
        }, {
            duration: 250
        });
    }
    var hide_slideshow = function()
    {
        $section2.removeClass(SLIDESHOW_ACTIVE_CLASS);
        $slide_cover_wrapper.animate({
            opacity: 1
        }, {
            duration: 250
        });
        $slide_wrapper.animate({
            opacity: 0
        }, {
            duration: 250
        });
    }
    var goto_slide = function(idx) {
        var slidejs_plugin_instance = $slides.data('plugin_slidesjs');
        //console.log($slides, $slides.data(), $slides.data('plugin_slidesjs'))
        $slides.data('plugin_slidesjs').goto(idx+1);
    }
    
    
    $slide_cover_buttons.click(function(event){
        var $clicked_slide_cover_button = $(event.currentTarget);
        var idx = parseInt( $clicked_slide_cover_button.attr('data-idx') );
        goto_slide(idx);
        show_slideshow();
        return false;
    });
    
    $back_btn.click(function(){
        hide_slideshow();
        //window.location.hash = "#."
        return false;
    });
    
    $nav_btns.click(function(event){
        var $nav_btn = $(event.currentTarget);
        var idx = $nav_btns.index($nav_btn);
        goto_slide(idx);
        return false;
    });
    
    
    var resize_callback = function(){
        var $slidejs_control = $(".slidesjs-control", $section2);
        var $slidejs_container = $(".slidesjs-container", $section2);

        var current_slide_idx =  $slides.data("plugin_slidesjs").data.current;
        var $current_slide = $($all_slides[current_slide_idx]);
        $all_slides.show();
        var max_height = 0;
        $all_slides.each(function(idx, slide){
            var $slide = $(slide);
            var resized_height = $slide.height();
            if (resized_height > max_height) {
                max_height = resized_height;
            }
        });

        $slidejs_control.css("height", max_height);
        $slidejs_container.css("height", max_height);
        $all_slides.hide();
        $current_slide.show();
    }
    
    $(window).resize(resize_callback);
    setTimeout(function(){
        $(window).trigger("resize")
    }, 200);
}

$(document).ready(function()
{
    init_intent_quality_slideshow();
})