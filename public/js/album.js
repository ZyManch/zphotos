$(document).ready(function() {
    $('.image-preview .btn').click(function(event) {
        event.stopPropagation();
        var $this = $(this),
            $container = $this.parents('.image-preview '),
            group = $this.data('group'),
            $buttonsFromGroup = $container.find('[data-group='+group+']'),
            originalUrl = $container.data('url'),
            $slices = $container.find('.slice'),
            addUrl = $this.attr('href'),
            removeUrl = $this.data('remove-url'),
            alreadyActive = $this.hasClass('active');
        $buttonsFromGroup.removeClass('active');
        if (!alreadyActive) {
            $this.addClass('active');
        }
        $.post(
            alreadyActive ? removeUrl : addUrl,
            {},
            function() {
                $slices.css('background-image','url('+originalUrl+')');
            }
        );
        return false;
    });
});