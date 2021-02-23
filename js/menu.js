//Menu Toggle Script

$("#menu-toggle").click(function(e) {
    e.preventDefault();

    if ($('#icon-toggle').hasClass("fa-chevron-left")) {
        $('#icon-toggle')
            .removeClass("fa-chevron-left")
            .addClass("fa-chevron-right")
        ;
    } else {
        $('#icon-toggle')
            .removeClass("fa-chevron-right")
            .addClass("fa-chevron-left")
        ;
    }

    $("#wrapper").toggleClass("toggled");
});
