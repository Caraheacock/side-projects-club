jQuery('document').ready(function($){
    var $window = $(window),
        $adminBar = $('#wpadminbar'),
        $header = $('#header'),
        $nav = $('#nav'),
        $main = $('main'),
        $footer = $('#footer');
    
    // Sticky navigation bar
    var adminBarHeight = 0,
        navIsSticky = false;
    
    var stickyNav = function() {
        adminBarHeight = $adminBar.height();
        var headerHeight = $header.outerHeight() - 1,
            threshold = headerHeight;
        
        if ($adminBar.css('position') === 'absolute') {
            threshold += adminBarHeight;
        }
        
        if ($window.scrollTop() > threshold && !navIsSticky) {
            $nav.addClass('sticky-nav');
            navIsSticky = true;
        } else if ($window.scrollTop() <= threshold && navIsSticky) {
            $nav.removeClass('sticky-nav');
            navIsSticky = false;
        }
    };
    
    stickyNav();
    $window.load(stickyNav);
    $window.scroll(stickyNav);
    $window.resize(stickyNav);
    
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