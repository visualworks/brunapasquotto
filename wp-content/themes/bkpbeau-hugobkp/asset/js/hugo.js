(function($) {
 "use strict";
// Css for modal center
    function centerModal() {
        $(this).css('display', 'block');
        var $dialog = $(this).find(".modal-body");
        var offset = ($(window).height() - $dialog.height()) / 2;
        // Center modal vertically in window
        $dialog.css("margin-top", offset);
    }

    $('.modal').on('show.bs.modal', centerModal);

    $('.beau-back, .beau-next').click(function(event) {
        var currentId = $(this).attr('data-current');
        var idOpen = $(this).attr('data-next');
        $('#'+currentId).modal('hide');
        $('#'+idOpen).modal('show');
    });


//Setup menu
// Click out then close menu when menu opened
//Humberger click
    $('.open-menu').click(function(event) {
        if ($(this).hasClass('menu-active')) {
            $('.open-menu').removeClass('menu-active');
            $('section, footer').removeClass('section-menu-active');
            $('.main-menu-view').removeClass('mobile-show');
        }else{
            $('.open-menu').addClass('menu-active');
            $('section, footer').addClass('section-menu-active');
            $('.main-menu-view').addClass('mobile-show');
        }
    });
    $('.close-humberger').click(function(event) {
        $('.open-menu').removeClass('menu-active');
        $('section').removeClass('section-menu-active');
        $('.main-menu-view').removeClass('mobile-show');
    });


    // On re size
     $(window).on("resize", function () {
        $('.modal:visible').each(centerModal);
        //Resize and hide menu
        $('.open-menu,.button-humberger-menu').removeClass('menu-active');
        $('section').removeClass('section-menu-active');
        $('.main-menu-view').removeClass('mobile-show');
    });



    // One page
    $('#main-nav li').click(function(event) {
        $('#main-nav li').removeClass('current-menu-item')
        $(this).addClass('current-menu-item')
        var scrollToID = $(this).find('a').attr('href')
        $("html, body").animate({ scrollTop: $(scrollToID) },1000);
        return false;

    });


})(jQuery);

