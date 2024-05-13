$(function () {
    $("#toggleButton").click(function () {
        $("#hero-navbar").removeClass("hidden");
        // $("#content-btn-toggle button").addClass("relative group");
    });
});

// click navbar
$(document).click(function (e) {
    const sideMenu = document.querySelector("#hero-navbar");
    const btnMenu = document.querySelector("#toggleButton");
    if (!sideMenu.contains(e.target) && !btnMenu.contains(e.target)) {
        $("#hero-navbar").addClass("hidden");
        // $("#content-btn-toggle button").removeClass("relative group");
    }
});

const openListNavbar = (id) => {
    $(`.${id}`).toggle("show");
};
