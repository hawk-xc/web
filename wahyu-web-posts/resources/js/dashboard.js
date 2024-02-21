$(document).ready(function () {
    feather.replace();

    var mainbar = $("#mainbar");
    var fullNameWeb = $("#fullNameWeb");
    var toggleButton = $("#toggleButton");
    var navbar = $("#navbar");
    var modeSlider = $("#modeSlider");

    // darkmode slider
    modeSlider.on("click", function () {
        $("body").toggleClass("dark");
        const newIcon = $("body").hasClass("dark") ? "sun" : "moon";
        $("#modeSwitchIcon").attr("data-feather", newIcon);
        feather.replace();
    });

    function showNav() {
        fullNameWeb.toggleClass("hidden");

        $(".icon_titles").toggleClass("hidden");
        if (mainbar.hasClass("pl-[7rem]")) {
            mainbar.removeClass("pl-[7rem]").addClass("pl-[14rem]");
            // fullNameWeb.toggleClass('hidden');
            $("#toggleIcon").attr("data-feather", "arrow-left");
        } else {
            mainbar.addClass("pl-[7rem]").removeClass("pl-[14rem]");
            // fullNameWeb.toggleClass('hidden');
            $("#toggleIcon").attr("data-feather", "arrow-right");
        }

        feather.replace();
    }

    $("#sidebar")
        .children()
        .on("click", function (e) {
            e.stopPropagation();
        });

    $("#sidebar").on("click", function () {
        showNav();
    });

    toggleButton.on("click", function (e) {
        showNav();

        e.stopPropagation();
    });

    $("#mainContainer").scroll(function () {
        $(this).scrollTop() > 100 ? navbar.fadeOut() : navbar.fadeIn();
    });
});
