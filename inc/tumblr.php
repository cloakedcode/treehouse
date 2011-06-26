<div id='tumblr-profile'>
</div>

<div id='tumblr-posts'>
    <h2>Latest Post</h2>
    <div id='tumblr-first-post'>
    </div>
</div>

<script type="text/javascript">
$(function() {
    $.getScript("<?php echo $service['url'] ?>/api/read/json", function() {
        renderProfile(tumblr_api_read['tumblelog']);

        posts = tumblr_api_read['posts'];

        if (posts.length > 0) {
            renderPost(posts[0]);
        }
        else {
            $('#tumblr-posts').append('<p>No posts, yet.</p>');
        }
    });
});

function renderPost(p)
{
    display = $('#tumblr-first-post');

    switch (p['type']) {
        case 'audio':
            display.append(p['audio-player']);
            display.append(p['audio-caption']);
            break;
        case 'photo':
            display.append('<img src="'+p['photo-url-500']+'" />');
            display.append(p['photo-caption']);
            break;
        case 'regular':
            display.append('<h3>'+p['regular-title']+'</h3>');
            display.append(p['regular-body']);
            break;
        case 'video':
            display.append(p['video-player']);
            display.append(p['video-caption']);
            break;
        case 'answer':
            display.append(p['question']);
            display.append(p['answer']);
            break;
        case 'conversation':
            display.append(p['conversation-title']);
            display.append(p['conversation-text']);
            break;
        case 'link':
            display.append('<a href="'+p['link-url']+'">'+p['link-text']+'</a>');
            break;
        case 'quote':
            display.append(p['quote-text']);
            break;
        default:
            alert('Unknown tumblr post type: '+p['type']);
    }
}

function renderProfile(tlog)
{
    cname = tumblr_api_read['tumblelog']['cname']
    url = (cname) ? 'http://'+cname : '<?php echo $service['url'] ?>';

    $('#tumblr-profile').append('<h1><a href="'+url+'">'+tumblr_api_read['tumblelog']['title']+'</a>');
}

</script>
