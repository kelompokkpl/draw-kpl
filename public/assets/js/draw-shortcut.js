// Handle sidebar menu
function openCloseMenu() {
    var menu = $('.js-menu-toggle');

    if ($('body').hasClass('show-sidebar')) {
        $('body').removeClass('show-sidebar');
        menu.removeClass('active');
    } else {
        $('body').addClass('show-sidebar'); 
        menu.addClass('active');
    }
}

// Handle direction of menu
function up(){
    if ($('body').hasClass('show-sidebar')){
        var index = $('li').index($('.menu-item.active'))
        if(index == 0){
            index = $('li.menu-item').length
        }

        $('body').find('.menu-item.active').removeClass('active')
        $('li.menu-item').eq(index-1).addClass('active')
    }
}

function down(){
    if ($('body').hasClass('show-sidebar')){
        var index = $('li').index($('.menu-item.active'))
        if(index == $('li.menu-item').length-1){
            index = -1
        }

        $('body').find('.menu-item.active').removeClass('active')
        $('li.menu-item').eq(index+1).addClass('active')
    }   
}


// Handle draw button
function goToDraw(){
    if ($('.draw-btn')[0]) {
        $(location).attr("href", "file:///D:/NGAMPUS/6/PKL/explore/draw/index2.html");
    } else if ($('.draw')[0]){
        $(location).attr("href", "file:///D:/NGAMPUS/6/PKL/explore/draw/draw.html");
    }
}

// Handle fullscreen
function fullScreen(){
    if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
            document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (document.documentElement.msRequestFullscreen) {
            document.documentElement.msRequestFullscreen();
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
    }
}

// Bind
Mousetrap.bind({
    'm': openCloseMenu,
    'M' : openCloseMenu,
    'enter' : goToDraw,
    'up' : up,
    'right' : up,
    'down': down,
    'left' : down,
    'z' : fullScreen,
    'Z' : fullScreen,
});
