<?php
preg_match('|vimeo.com/([^/]+)|i', $service['url'], $matches);
$vimeo_account = $matches[1];
?>
<script type='text/javascript'>
$(function() {
    $.getJSON('http://vimeo.com/api/v2/<?php echo $vimeo_account ?>/videos.json?callback=?', function(data) {
        if (data.length > 0) {
            $('#vimeo-videos').append('<ul></ul>');

            $.each(data.reverse(), function(i, val) {
                if (i >= data.length - 5) {
                    $.getJSON('http://www.vimeo.com/api/oembed.json?url='+val['url']+'&width=640&callback=?', function(video) {
                        $('#vimeo-videos > ul').prepend(
                            '<li><a href="'+val['url']+'">'+val['title']+'</a><div>'+unescape(video['html'])+'</div><p>'+((val['description'].length > 0) ? val['description'] : '(No description.)')+'</p></li>'
                        );
                    });
                }
                else {
                    $('#vimeo-videos > ul').prepend(
                        '<li><a href="'+val['url']+'">'+val['title']+'</a><div><a href="'+val['url']+'"><img src="'+unescape(val['thumbnail_large'])+'" /></a></div><p>'+((val['description'].length > 0) ? val['description'] : '(No description.)')+'</p></li>'
                    );
                }
            });
        }
        else {
            $('#vimeo-videos').append('<p>No public videos.</p>');
        }
    });
});
</script>

<h2><a href='<?php echo $service['url'] ?>'><?php echo $vimeo_account ?>'s</a> Videos</h2>
<div id='vimeo-videos'>
</div>
