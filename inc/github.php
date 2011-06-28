<?php
preg_match('|github.com/([^/]+)|i', $service['url'], $matches);
$github_account = $matches[1];
?>
<script type='text/javascript' src='jquery.sort-1.1.js'></script>
<script type='text/javascript'>
$(function() {
    $.getJSON('https://api.github.com/users/<?php echo $github_account ?>/repos?callback=?', function(resp) {
        if (resp.data.length > 0) {
            $('#github-repos').append('<ul></ul>');

            $.each($(resp.data).sort('pushed_at', 'desc'), function(i, val) {
                $('#github-repos > ul').append(
                    '<li><a href="'+val['html_url']+'">'+val['name']+'</a><p>'+((val['description'].length > 0) ? val['description'] : '(No description.)')+'</p></li>'
                );
            });
        }
        else {
            $('#github-repos').append('<p>No public repositories.</p>');
        }
    });
});
</script>

<h2><a href='<?php echo $service['url'] ?>'><?php echo $github_account ?>'s</a> Repositories</h2>
<div id='github-repos'>
</div>
