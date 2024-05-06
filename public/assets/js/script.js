$(function () {
    $("#toggleButton").click(function () {
        $("#hero-navbar").removeClass("hidden");
        $("#hero-content")
            .removeClass("w-full")
            .addClass("w-8/12 lg:w-5/6 min-h-screen");
        $("#content-btn-toggle button").addClass("relative group");
    });
});

$(document).click(function (e) {
    const sideMenu = document.querySelector("#hero-navbar");
    const btnMenu = document.querySelector("#toggleButton");
    if (!sideMenu.contains(e.target) && !btnMenu.contains(e.target)) {
        $("#hero-content")
            .removeClass("w-8/12 lg:w-5/6 min-h-screen")
            .addClass("w-full min-h-screen");
        $("#hero-navbar").addClass("hidden");
        $("#content-btn-toggle button").removeClass("relative group");
    }
});
