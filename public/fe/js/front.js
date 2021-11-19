var xDownMenu = null;
var yDownMenu = null;
$(document).ready(function() {
    $('.search_btn_toggle').on('click', function() {
        $(".form_search_header").toggleClass('hidden');
    });

    $('.openDirector').on('click', function() {
        $('.absolu_footer_list').toggleClass('hidden');
    });
    $(document).click((event) => {
        if (!$(event.target).closest('.header_search').length) {
            $('.header_search .form_search_header').addClass('hidden');
        }
        if (!$(event.target).closest('.itemListChild').length) {
            $('.itemListChild .absolu_footer_list').addClass('hidden');
        }
        if (!$(event.target).closest('.box').length && !$(event.target).closest('.menu_btn_toggle').length) {
            $(".box").animate({
                right: "-100%"
            }, 500);
        }
    });
    $('.menu_btn_toggle').on('click', function() {
        $(".box").animate({
            right: "0"
        }, 500);
    });
    $('.close_menu_box').on('click', function() {
        $(".box").animate({
            right: "-100%"
        }, 500);
    });
    var widthWin = $(window).width();

    if (widthWin < 576) {
        if ($(window).scrollTop() >= 50) {
            $(".moveTopBtn").show("slow", function() {});
        } else {
            $(".moveTopBtn").hide("slow", function() {});
        }
        $(window).scroll(function() {
            if ($(this).scrollTop() >= 50) {
                $(".moveTopBtn").show("slow", function() {});
            } else {
                $(".moveTopBtn").hide("slow", function() {});
            }
        });
        $(".moveTopBtn").on('click', function() {
            $("html, body").animate({ scrollTop: 0 }, "slow");
        });
        document.addEventListener('touchstart', handleTouchStartMobile, false);
        document.addEventListener('touchmove', handleTouchMoveMobile, false);
    }

});



function getTouches(evt) {
    return evt.touches || // browser API
        evt.originalEvent.touches; // jQuery
}

function handleTouchStartMobile(evt) {
    const firstTouchMobile = getTouches(evt)[0];
    xDownMenu = firstTouchMobile.clientX;
    yDownMenu = firstTouchMobile.clientY;
};

function handleTouchMoveMobile(evt) {

    if (!xDownMenu || !yDownMenu) {
        return;
    }

    var xUpMenu = evt.touches[0].clientX;
    var yUpMenu = evt.touches[0].clientY;
    if (yUpMenu > yDownMenu) {
        $(".mobileMenuFooter").animate({
            bottom: "-110px"
        }, 500);
    } else {
        var scrollBottom = $(document).height() - $(window).height() - $(window).scrollTop();
        if (scrollBottom < 80) {
            $(".mobileMenuFooter").animate({
                bottom: "0"
            }, 500);
        }
    }
    var xDiffMenu = xDownMenu - xUpMenu;
    var yDiffMenu = yDownMenu - yUpMenu;

    if (Math.abs(xDiffMenu) > Math.abs(yDiffMenu)) { /*most significant*/
        if (xDiffMenu > 0) {
            /* left swipe */
        } else {
            /* right swipe */
        }
    } else {
        if (yDiffMenu > 0) {
            /* up swipe */
        } else {
            /* down swipe */
        }
    }
    /* reset values */
    xDownMenu = null;
    yDownMenu = null;
};