( function($) {
    var menuIsOpen = false;
    var targetMenu = "#rbf-nav-links-container";
    var toggleMenu = function() {
        if(!menuIsOpen) {
            openMenu();
        }
        else {
            hideMenu();
        }
    };
    var openMenu = function() {
        // Animate button
        var degrees = 405;

        $("#rbf-nav-main-mobile-button").css({"margin-top": "25px"});
        $("#rbf-nav-main-mobile-button > div:nth-child(2)").css({"opacity": "0"});
        $("#rbf-nav-main-mobile-button > div:first-child").css({
            '-webkit-transform' : 'rotate('+ degrees +'deg)',
            '-moz-transform' : 'rotate('+ degrees +'deg)',
            '-ms-transform' : 'rotate('+ degrees +'deg)',
            'transform' : 'rotate('+ degrees +'deg)'});

        $("#rbf-nav-main-mobile-button > div:first-child").css({
            "margin-bottom": "-15px"
        });

        $("#rbf-nav-main-mobile-button > div:nth-child(3)").css({
            '-webkit-transform' : 'rotate(-'+ degrees +'deg)',
            '-moz-transform' : 'rotate(-'+ degrees +'deg)',
            '-ms-transform' : 'rotate(-'+ degrees +'deg)',
            'transform' : 'rotate(-'+ degrees +'deg)'});

        // Animate Menu appearance
        $(targetMenu).css({"display": "block"});
        $(targetMenu).animate({"opacity": "1"}, 200);
        menuIsOpen = true;
    }
    var hideMenu = function(show) {
        var degrees = 0;

        $("#rbf-nav-main-mobile-button").css({"margin-top": "15px"});
        $("#rbf-nav-main-mobile-button > div:nth-child(2)").css({"opacity": "1"});
        $("#rbf-nav-main-mobile-button > div:first-child").css({
            '-webkit-transform' : 'rotate('+ degrees +'deg)',
            '-moz-transform' : 'rotate('+ degrees +'deg)',
            '-ms-transform' : 'rotate('+ degrees +'deg)',
            'transform' : 'rotate('+ degrees +'deg)'});

        $("#rbf-nav-main-mobile-button > div:first-child").css({
            "margin-bottom": "7px"
        });

        $("#rbf-nav-main-mobile-button > div:nth-child(3)").css({
            '-webkit-transform' : 'rotate('+ degrees +'deg)',
            '-moz-transform' : 'rotate('+ degrees +'deg)',
            '-ms-transform' : 'rotate('+ degrees +'deg)',
            'transform' : 'rotate('+ degrees +'deg)'});


        if(!show) {
            $(targetMenu).animate({"opacity": "0"}, 400);
            setTimeout(function() {$(targetMenu).css({"display": "none"});}, 200);
        }
        else {
            $(targetMenu).removeAttr("style");
        }
        menuIsOpen = false;
    }

    $( window ).resize( function() {
        if ($(window).width() >= 805) {
            if(menuIsOpen)
                hideMenu(true);
            if($(targetMenu)[0].hasAttribute("style")) {
                $(targetMenu).removeAttr("style");
            }
        }


    });

    $("#rbf-nav-main-mobile-button").click(function() {
        toggleMenu()
    });
})(jQuery)