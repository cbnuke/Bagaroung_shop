$(document).ready(function() {
    if (window.location.href.indexOf("#des_promotions") > -1) {
        $('#home').click();
        $('#promotions').click();
    }
    if (window.location.href.indexOf("#des_products") > -1) {
        $('#home').click();
        $('#products').click();
    }
    if (window.location.href.indexOf("#des_contactus") > -1) {
        $('#home').click();
        $('#contactus').click();
    }
    // Cache selectors
    var lastId,
            topMenu = $("#top-menu"),
            topMenuHeight = topMenu.outerHeight() + 15,
            // All list items
            menuItems = topMenu.find("a"),
            // Anchors corresponding to menu items
            scrollItems = menuItems.map(function() {
                var item = $($(this).attr("href"));
                if (item.length) {
                    return item;
                }
            });
// Bind click handler to menu items
// so we can get a fancy scroll animation
    menuItems.click(function(e) {
        var href = $(this).attr("href"),
                offsetTop = href === "#" ? 0 : $(href).offset().top - topMenuHeight + 14;
        $('html, body').stop().animate({
            scrollTop: offsetTop
        }, 300);
        e.preventDefault();

    });
// Bind to scroll
    $(window).scroll(function() {
        // Get container scroll position
        var fromTop = $(this).scrollTop() + topMenuHeight;
        // Get id of current scroll item
        var cur = scrollItems.map(function() {
            if ($(this).offset().top < fromTop)
                return this;
        });
        // Get the id of the current element
        cur = cur[cur.length - 1];
        var id = cur && cur.length ? cur[0].id : "";
        if (lastId !== id) {
            lastId = id;
            // Set/remove active class
            menuItems
                    .parent().removeClass("active")
                    .end().filter("[href=#" + id + "]").parent().addClass("active");
        }
    });
    
    $("#owl-4").owlCarousel({
            items: 4, //4 items above 1000px browser width
            itemsDesktop: [1199, 3], //5 items between 1199px and 979px
            itemsDesktopSmall: [979, 3], // betweem 979px and 601px
            itemsTablet: [768, 1], //1 items between 768 and 0
            itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option

            lazyLoad: true,
            autoPlay: true,
            navigation: true,
            navigationText: ["", ""],
            rewindNav: true,
            scrollPerPage: true,
            //Pagination
            pagination: true,
            paginationNumbers: false,
        });
        $("#owl-3").owlCarousel({
            items: 3, //3 items above 1000px browser width
            itemsDesktop: [1199, 3], //5 items between 1199px and 979px
            itemsDesktopSmall: [979, 3], // betweem 979px and 601px
            itemsTablet: [768, 1], //1 items between 768 and 0
            itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option

            lazyLoad: true,
            autoPlay: true,
            navigation: true,
            navigationText: ["", ""],
            rewindNav: true,
            scrollPerPage: true,
            //Pagination
            pagination: true,
            paginationNumbers: false,
        });
        $("#owl-2").owlCarousel({
            items: 2, //2 items above 1000px browser width
            itemsDesktop: [1199, 2], //5 items between 1199px and 979px
            itemsDesktopSmall: [979, 2], // betweem 979px and 601px
            itemsTablet: [768, 1], //1 items between 768 and 0
            itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option

            lazyLoad: true,
            autoPlay: true,
            navigation: true,
            navigationText: ["", ""],
            rewindNav: true,
            scrollPerPage: true,
            //Pagination
            pagination: true,
            paginationNumbers: false,
        });
        $("#owl-1").owlCarousel({
            items: 1, //2 items above 1000px browser width
            itemsDesktop: [1199, 1], //5 items between 1199px and 979px
            itemsDesktopSmall: [979, 1], // betweem 979px and 601px
            itemsTablet: [768, 1], //1 items between 768 and 0
            itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option

            lazyLoad: true,
            autoPlay: true,
            navigation: true,
            navigationText: ["", ""],
            rewindNav: true,
            scrollPerPage: true,
            //Pagination
            pagination: true,
            paginationNumbers: false,
        });
});
$(document).on('click', '.navbar-collapse.in', function(e) {
    if ($(e.target).is('a')) {
        $(this).collapse('hide');
    }
});