/**
 * Created with PhpStorm.
 * User: ZyManch
 * Date: 21.06.14
 * Time: 11:27
 */
$(document).ready(function() {

    var $document = $(document),
        $image = $('.image'),
        $inputMarginLeft = $('#image-left'),
        $inputMarginRight = $('#image-right'),
        $inputMarginTop = $('#image-top'),
        $inputMarginBottom = $('#image-bottom'),
        $blockMarginLeft = $image.children('.block-left'),
        $blockMarginRight = $image.children('.block-right'),
        $blockMarginTop = $image.children('.block-top'),
        $blockMarginBottom = $image.children('.block-bottom'),
        width = $image.width(),
        height = $image.height(),
        originalWidth = parseInt($('#image-width').html().split(',').join(''), 10),
        zoom = width / originalWidth,
        ratio = parseFloat($('#image-ratio').attr('ratio')),
        $panelTop = $image.children('.block-top'),
        fillMarginInputs = function(width, left, top) {

        },
        updateImageByInputs = function() {
            $blockMarginTop.css({
                height: Math.round($inputMarginTop.val()*zoom)+'px',
                left:   Math.round($inputMarginLeft.val()*zoom)+'px',
                right:  Math.round($inputMarginRight.val()*zoom)+'px'
            });
            $blockMarginBottom.css({
                height: Math.round($inputMarginBottom.val()*zoom)+'px',
                left:   Math.round($inputMarginLeft.val()*zoom)+'px',
                right:  Math.round($inputMarginRight.val()*zoom)+'px'
            });
            $blockMarginLeft.css('width', Math.round($inputMarginLeft.val()*zoom)+'px');
            $blockMarginRight.css('width', Math.round($inputMarginRight.val()*zoom)+'px');
        };
    Math.between = function(value, min, max) {
        if (value < min) {
            return min;
        } else if (value > max) {
            return max;
        }
        return value;
    }
    updateImageByInputs();
    $inputMarginLeft.change(updateImageByInputs);
    $inputMarginRight.change(updateImageByInputs);
    $inputMarginTop.change(updateImageByInputs);
    $inputMarginBottom.change(updateImageByInputs);
    $image.mousedown(function(e) {
        var moving,
            startScreenY = e.pageY,
            startScreenX = e.pageX,
            startMarginLeft = parseInt($inputMarginLeft.val(), 10),
            startMarginTop = parseInt($inputMarginTop.val(), 10),
            startMarginBottom = parseInt($inputMarginBottom.val(), 10),
            startMarginRight = parseInt($inputMarginRight.val(), 10);

        if (e.srcElement.tagName.toLowerCase() == 'img' ) {
            // moving
            moving = function(e) {
                $inputMarginLeft.val(Math.between(startMarginLeft + e.pageX - startScreenX, 0, width));
                $inputMarginRight.val(Math.between(startMarginRight - e.pageX + startScreenX,0,width));
                $inputMarginTop.val(Math.between(startMarginTop + e.pageY - startScreenY,0,height));
                $inputMarginBottom.val(Math.between(startMarginBottom - e.pageY + startScreenY,0,height));
                updateImageByInputs();
            }
        } else {
            // resizing
            $panelTop.css('height', e.offsetY+'px');
        }
        $document.mousemove(moving);
        $document.mouseup(function() {
            $document.unbind('mousemove');
            $document.unbind('mouseup');
        });
        return false;
    });

});