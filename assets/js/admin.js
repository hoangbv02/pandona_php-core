(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($("#spinner").length > 0) {
                $("#spinner").removeClass("show");
            }
        }, 1);
    };
    spinner();

    // Back to top button
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $("#back-to-top").fadeIn();
            } else {
                $("#back-to-top").fadeOut();
            }
        });
        // scroll body to 0px on click
        $("#back-to-top").click(function () {
            $("body,html").animate(
                {
                    scrollTop: 0,
                },
                400
            );
            return false;
        });
    });

    // Sidebar Toggler
    $(".sidebar-toggler").click(function () {
        $(".sidebar, .content").toggleClass("open");
        return false;
    });
})(jQuery);
