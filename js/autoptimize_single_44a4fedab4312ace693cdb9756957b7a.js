(function($) {
    function drags(dragElement, resizeElement, container) {
        dragElement.on('mousedown.ba-events touchstart.ba-events', function(e) {
            dragElement.addClass('ba-draggable');
            resizeElement.addClass('ba-resizable');
            var startX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;
            var dragWidth = dragElement.outerWidth(),
                posX = dragElement.offset().left + dragWidth - startX,
                containerOffset = container.offset().left,
                containerWidth = container.outerWidth();
            minLeft = containerOffset;
            maxLeft = containerOffset + containerWidth - dragWidth;
            dragElement.parents().on("mousemove.ba-events touchmove.ba-events", function(e) {
                var moveX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;
                leftValue = moveX + posX - dragWidth;
                if (leftValue < minLeft) {
                    leftValue = minLeft;
                } else if (leftValue > maxLeft) {
                    leftValue = maxLeft;
                }
                widthValue = (leftValue + dragWidth / 2 - containerOffset) * 100 / containerWidth + '%';
                $('.ba-draggable').css('left', widthValue);
                $('.ba-resizable').css('width', widthValue);
            }).on('mouseup.ba-events touchend.ba-events touchcancel.ba-events', function() {
                dragElement.removeClass('ba-draggable');
                resizeElement.removeClass('ba-resizable');
                $(this).off('.ba-events');
            });
            e.preventDefault();
        });
    }
    $.fn.beforeAfter = function() {
        var cur = this;
        var width = cur.width() + 'px';
        cur.find('.resize img').css('width', width);
        drags(cur.find('.handle'), cur.find('.resize'), cur);
        $(window).resize(function() {
            var width = cur.width() + 'px';
            cur.find('.resize img').css('width', width);
        });
    }
}(jQuery));