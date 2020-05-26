(function ($) {
    'use strict';
    initializedLightGallery();
})(jQuery);

function initializedLightGallery() {
    if ($("#lightgallery").length) {
        $("#lightgallery").lightGallery();
    }

    if ($(".lightgallery-without-thumb").length) {
        $(".lightgallery-without-thumb").lightGallery({
            thumbnail: true,
            animateThumb: false,
            showThumbByDefault: false
        });
    }

    if ($("#video-gallery").length) {
        $("#video-gallery").lightGallery();
    }
}