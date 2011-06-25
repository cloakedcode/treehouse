<div id='tumblr-posts'>
</div>

<script type="text/javascript">
// The variable "tumblr_api_read" is now set.
$(function() {
    $.getScript("<?php echo $service['url'] ?>/api/read/json", function() {
        posts = tumblr_api_read['posts'];

        if (posts.length > 0) {
            $('#tumblr-post').attr('href', posts[0]['url-with-slug']);
        }
        else {
            $('#tumblr-posts').append('<p>No posts, yet.</p>');
        }
    });
});
</script>
