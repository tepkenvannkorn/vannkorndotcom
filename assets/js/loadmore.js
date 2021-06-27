jQuery(function(jQuery) { // use jQuery code inside this to avoid "jQuery is not defined" error
    jQuery('.loadmore').click(function() {

        var button = jQuery(this),
            data = {
                'action': 'loadmore',
                'query': vannkorn_loadmore_params.posts,
                'page': vannkorn_loadmore_params.current_page
            };

        jQuery.ajax({ // jQuery.post can also be used here
            url: vannkorn_loadmore_params.ajaxurl, // AJAX handler
            data: data,
            type: 'POST',
            beforeSend: function(xhr) {
                button.text('Loading...'); // change the button text
            },
            success: function(data) {
                if (data) {
                    button.text('Load More').prev().after(data); // insert new posts
                    vannkorn_loadmore_params.current_page++;

                    if (vannkorn_loadmore_params.current_page == vannkorn_loadmore_params.max_page)

                        button.remove(); // if last page, remove the button

                    // you can also fire the "post-load" event here if you use a plugin that requires it
                    // jQuery( document.body ).trigger( 'post-load' );
                } else {
                    button.remove(); // if no data, remove the button as well
                }
            }
        });
    });
});