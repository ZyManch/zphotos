/**
 * Created with PhpStorm.
 * User: ZyManch
 * Date: 14.09.14
 * Time: 8:44
 */
$(document).ready(function() {
    var $cutaway = $('.cutaway'),
        $cutawayImage = $cutaway.find('.cutaway-side'),
        margin = parseInt($cutaway.css('paddingLeft'),10),
        cutawayData = {},
        cutawayIndex,
        cutawayElementIndex,
        zoom = $('#zoom').val(),
        width = parseInt($cutaway.css('width'),10),
        modelId = $('#model_id').val(),
        cutawayElements,
        cutawayElement;
    function moveImages() {
        for (cutawayIndex in cutawayData) {
            cutawayElements = cutawayData[cutawayIndex];
            for (cutawayElementIndex in cutawayElements) {
                cutawayElement = cutawayElements[cutawayElementIndex];
                if (cutawayElementIndex == 'image') {
                    cutawayElement.css('left',cutawayElements.x.val()*zoom + margin+'px');
                    cutawayElement.css('top',cutawayElements.y.val()*zoom + margin+'px');
                }
            }
        }
    }
    $cutaway.find('.cutaway-text').each(function() {
        var cutawayTextId = $(this).data('cutaway-text');
        cutawayData[cutawayTextId] = {};
        $('[data-cutaway-text='+cutawayTextId+']').each(function() {
            var $this = $(this),
                cutawayAttr = $this.data('cutaway-attr');
            cutawayData[cutawayTextId][cutawayAttr] = $this;
        });
    });
    moveImages();
    for (cutawayIndex in cutawayData) {
        cutawayElements = cutawayData[cutawayIndex];
        for (cutawayElementIndex in cutawayElements) {
            cutawayElement = cutawayElements[cutawayElementIndex];
            if (cutawayElementIndex == 'image') {
                cutawayElement.mousedown(function(event) {
                    event.stopPropagation();
                    var $this = $(this),
                        startPageX = event.pageX,
                        startPageY = event.pageY,
                        cutawayTextId = $this.data('cutaway-text'),
                        cutawayElement = cutawayData[cutawayTextId],
                        startX = parseInt(cutawayElement.x.val(),10),
                        startY = parseInt(cutawayElement.y.val(),10),
                        newX,
                        newY,
                        maxX = ($cutawayImage.width()-cutawayElement.image.width())/zoom,
                        maxY = ($cutawayImage.height()-cutawayElement.image.height())/zoom;
                    var mouseMove = function (event) {
                        newX = Math.round(startX + (event.pageX - startPageX)/zoom);
                        newY = Math.round(startY + (event.pageY - startPageY)/zoom);
                        if (newX < 0) {
                            newX = 0;
                        }
                        if (newX > maxX) {
                            newX = maxX;
                        }
                        if (newY < 0) {
                            newY = 0;
                        }
                        if (newY > maxY) {
                            newY = maxY;
                        }
                        cutawayElement.x.val(newX);
                        cutawayElement.y.val(newY);
                        moveImages();
                    };
                    var mouseUp = function() {
                        $(document).unbind('mousemove',mouseMove);
                        $(document).unbind('mouseup',mouseUp);
                        $.ajax({
                            url: "/cutaway/changeFields?id="+cutawayTextId,
                            type: "post",
                            data: {attrs: {x: cutawayElement.x.val(),y: cutawayElement.y.val()}},
                            error: function(json) {
                                alert(json.responseText);
                            }
                        });
                    }
                    $(document).mousemove(mouseMove);
                    $(document).mouseup(mouseUp);
                    return false;
                });
            } else {
                var changeFunction = function() {
                    var $this = $(this),
                        cutawayTextId = $this.data('cutaway-text'),
                        attr = $this.data('cutaway-attr'),
                        value = $this.val();
                    cutawayData[cutawayTextId].image.attr(
                        'src',
                        '/cutaway/previewText?cutaway_width='+width+'&id='+cutawayTextId+'&attr='+attr+'&value='+encodeURIComponent(value)
                    );
                };
                if (cutawayElementIndex == 'label') {
                    cutawayElement.keyup(changeFunction);
                }  else {
                    cutawayElement.change(changeFunction);
                }
            }
        }

    }
    $('.font-index').change(function() {
        var cutawayTextId = $(this).data('cutaway-text');
        cutawayData[cutawayTextId].font_id.val($(this).val());
        cutawayData[cutawayTextId].font_id.trigger('change');
    });
});