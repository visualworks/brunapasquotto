(function($){
    "use strict";
    var MQL =320;
    if($(window).width() > MQL) {

        $(window).on('scroll',
        {
            previousTop: 0
        },
        function () {
            var logoE = $('#logo');
            var currentTop = $(window).scrollTop();
            if (logoE.offset() != undefined) {
                var elementFix =logoE.parents( "section");
                var menuOfset  =logoE.offset().top;
                if (currentTop < this.previousTop ) {
                  if (currentTop > menuOfset && elementFix.hasClass('is-fixed')) {
                    elementFix.addClass('is-visible');
                  } else {
                    elementFix.removeClass('is-visible is-fixed');
                  }
                } else {
                  if( currentTop > menuOfset && !elementFix.hasClass('is-fixed')) elementFix.addClass('is-fixed is-visible');
                }
            };
            this.previousTop = currentTop;
        });
    }
})(jQuery)