$(document).ready(function () {
    var msgbox = $("#msgBox");
    var closeButton = $("#closeButton");

    closeButton.on("click", function () {
        msgbox.fadeOut();
    });

    setTimeout(function () {
        msgbox.fadeOut();
    }, 3000);
});
