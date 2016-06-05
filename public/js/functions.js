/**
 * Created by Patrick on 5-6-2016.
 */
$(function(){
    var n = $("#navsidebar");

    if (localStorage.getItem("navbarvis") === null) {
        localStorage['navbarvis'] = false;
    }

    if (localStorage['navbarvis'] === 'false') {
        n.css('display', 'none');
        n.css('left', '400px');
    }
});

$("#hideshownavbar").click(function(){
    var n = $("#navsidebar");

    if (localStorage['navbarvis'] === 'true') {
        n.animate({
            left: "+=" + 400

        }, 250, function(){
            n.hide();
        });
        localStorage['navbarvis'] = false;
    } else {
        n.show();
        n.animate({
            left: "-=" + 400

        }, 250);
        localStorage['navbarvis'] = true;
    }
});