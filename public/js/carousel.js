$(document).ready(function() {
    $("#autosCarousel").on("slide.bs.carousel", function(e) {
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 3;
        var totalItems = $("#autosCarousel .carousel-item").length;

        if (idx >= totalItems - (itemsPerSlide - 1)) {
        var it = itemsPerSlide - (totalItems - idx);

        for (var i = 0; i < it; i++) {   
            // append slides to end
            if (e.direction == "left") {
            $("#autosCarousel .carousel-item")
                .eq(i)
                .appendTo("#autosCarousel .carousel-inner");
            } else {
            $(".carousel-item")
                .eq(0)
                .appendTo($(this).find(".carousel-inner"));
            }
            
        }
        }
    });
});