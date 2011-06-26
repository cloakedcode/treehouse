<?php
preg_match('|dribbble.com/([^/]+)|i', $service['url'], $matches);
$dribbble_account = $matches[1];
?>
<script type='text/javascript'>
$(function() {
    $.getJSON('http://api.dribbble.com/players/<?php echo $dribbble_account ?>/shots?callback=?', function(resp) {
        if (resp.shots.length > 0) {
            $('#dribbble-shots').append('<ul></ul>');

            $.each(resp.shots.reverse(), function(i, val) {
                $('#dribbble-shots > ul').prepend(
                    '<li><a href="'+val['url']+'">'+val['title']+'</a><div><img src="'+val['image_url']+'" /></div></li>'
                );
            });
        }
        else {
            $('#dribbble-shots').append('<p>No shots.</p>');
        }
    });
});

</script>

<h2><a href='<?php echo $service['url'] ?>'><?php echo $dribbble_account ?>'s</a> Shots</h2>
<div id='dribbble-shots'>
</div>
