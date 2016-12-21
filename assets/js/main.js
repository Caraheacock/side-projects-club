jQuery('document').ready(function($){
    var $window = $(window),
        $body = $('body'),
        $adminBar = $('#wpadminbar'),
        $header = $('.main-header'),
        $nav = $('.main-nav'),
        $main = $('main'),
        $footer = $('.main-footer');
    
    // Sticky navigation bar
    var adminBarHeight = 0,
        navIsSticky = false;
    
    var stickyNav = function() {
        adminBarHeight = $adminBar.height();
        
        var threshold = $header.outerHeight() - $nav.outerHeight();
        
        if ($adminBar.css('position') === 'absolute') {
            threshold += adminBarHeight;
        }
        
        if ($window.scrollTop() > threshold && !navIsSticky) {
            $nav.removeClass('home-nav').removeClass('animate-nav');
            navIsSticky = true;
        } else if ($window.scrollTop() <= threshold && navIsSticky) {
            $nav.addClass('home-nav');
            navIsSticky = false;
        }
    };
    
    if ($body.hasClass('home')) {
        stickyNav();
        $window.load(stickyNav);
        $window.scroll(stickyNav);
        $window.resize(stickyNav);
    }
    
    // Scroll down button on the home page
    var homeScroll = $('.home-scroll-to-content .spc-button');
    
    homeScroll.click(function(e) {
        e.preventDefault();
        adminBarHeight = $adminBar.height();
        
        $('html, body').animate({
           scrollTop: $main.offset().top - adminBarHeight
        }, 1500);
    })
    
    // Sticky footer
    var pushFooterDown = function() {
        $main.css('min-height', '');
    
        windowHeight = $window.height();
        mainHeight = $main.outerHeight();
        mainTop = $main.offset().top;
        footerHeight = $footer.outerHeight();
    
        mainMinHeight = windowHeight - mainTop - footerHeight;
    
        if (mainHeight < mainMinHeight) {
            $main.css('min-height', mainMinHeight);
        }
    }

    pushFooterDown();
    $window.resize(pushFooterDown);
});