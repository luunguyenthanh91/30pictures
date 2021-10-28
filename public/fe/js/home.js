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
                right: "-350px"
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
            right: "-350px"
        }, 500);
    });


});