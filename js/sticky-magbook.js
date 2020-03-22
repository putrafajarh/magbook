jQuery(function($){
    if ($(".wrap-main").length ) {
        var stickySidebar = new StickySidebar('#secondary', {
            bottomSpacing: 15,
            topSpacing: 80,
            containerSelector: '.wrap-main',
            // innerWrapperSelector: '#magbook_tab_widgets-1 .tab-wrapper',
            resizeSensor: true
        });
    }
});