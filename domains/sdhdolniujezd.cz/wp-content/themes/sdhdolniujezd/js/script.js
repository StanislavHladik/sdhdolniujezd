jQuery(document).ready(function () {
    jQuery(".checkbox1").click(function () {
        jQuery(".menu-primary-menu-links-container").slideToggle();
        jQuery(".menu-primary-menu-links-container-nav").slideToggle();     
    });
});

// Zobrazovaní sub-menu v nav toolboru
$(document).ready(function () {
    $(".menu-primary-menu-links-container ul li").hover(function () {
        //When trigger is hovered...
        $(this).css({position: 'relative'});
        $(this).children("ul").slideDown('fast').css({
            'top': '95%',
            left: 0,
            'width': '100%',
            position: "absolute",
            'background-image': "url('/wp-content/themes/sdhdolniujezd/images/backgroundHover.jpg')"});
    }, function () {
        $(this).children("ul").slideUp('fast');
    });
});


$(window).resize(function () {
    if ($(window).width() > 1280) {
        $(".menu-primary-menu-links-container").css({display: 'block'});
        $(".menu-primary-menu-links-container-nav").css({display: 'block'});
    } else {
        $(".menu-primary-menu-links-container").css({display: 'none'});
        $(".menu-primary-menu-links-container-nav").css({display: 'none'});
        $(".checkbox1").prop('checked', false);
    }

    ;
});

function showSearchPanel() {
    var display = document.getElementById('div_search_1').style.display;
    if (display === "none")
    {
        document.getElementById('div_search_1').style.display = "block";
        //$("#search_obrazek_1").css({'background-image': "url('/wp-content/themes/sdhdolniujezd/images/backgroundHover.jpg')"});
    } else
    {
        document.getElementById('div_search_1').style.display = "none";
        //$("#search_obrazek_1").css({'background-image': "none"});
    }

}




