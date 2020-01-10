$(function() {
    $("a").tooltip();
    $(".box-title > a").click(function() {
        // console.log("clicked.");
        $(this)
            .find("i")
            .toggleClass("fa-plus fa-minus")
            .closest(".panel")
            .siblings(".panel")
            .find("i")
            .removeClass("fa-minus")
            .addClass("fa-plus");
    });
});
