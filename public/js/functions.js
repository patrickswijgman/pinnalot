/**
 * Created by Patrick on 5-6-2016.
 */

//Code that executes when the page loads
$(function(){
    if (localStorage.getItem("navbarvis") === null) {
        localStorage['navbarvis'] = true;
    }

    if (localStorage['navbarvis'] === 'true') {
        showNavbar();
    }
});

//Custom functions
$("#togglenavbar").click(function(){

    if (localStorage['navbarvis'] === 'true') {
        hideNavbar();
    } else {
        showNavbar();
    }
});

function showNavbar(){
    var n = $("#navsidebar");
    $("#togglenavbar").css("color", "rgba(255, 255, 255, 1)");
    n.show();
    n.animate({
        left: "-=" + 400
    }, 250);
    localStorage['navbarvis'] = true;
}

function hideNavbar(){
    var n = $("#navsidebar");
    $("#togglenavbar").css("color", "rgba(255, 255, 255, 0.6)");
    n.animate({
        left: "+=" + 400
    }, 250, function(){
        n.hide();
    });
    localStorage['navbarvis'] = false;
}