(function(){
    // toggle search
    $('.toggle-search').click(function(){
        $('.search').toggleClass('hidden');
    });

    // mark a post as your favorite
    var requestInProgress = [];
    $('.dopeable').click(function() {
        var button = this;
        var objectType = $(this).attr('data-object-type');
        var objectId = $(this).attr('data-object-id');
        var postURI = '/' + objectType + '/toggle-favorite/' + objectId;

        if ( requestInProgress[objectId] !== true ) {
            requestInProgress[objectId] = true;
            $.post(postURI, function(data) {
                if ($(button).hasClass('dopped')) {
                    $(button)
                        .removeClass('dopped')
                        .find('span')
                        .remove();

                } else {
                    $(button)
                        .addClass('dopped')
                        .append($('<span>dope</span>').hide().fadeIn(250));
                }

                $('#dope-count-' + objectId).text(parseInt(data.count));

            }).fail(function() {
                console.log('unable to save favorite');

            }).always(function() {
                requestInProgress[objectId] = false;
            });
        }

    });

})();