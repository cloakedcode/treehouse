<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js'></script>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>

<script type='text/javascript'>
$(function() {
    $('#tabs').tabs();
});
</script>

<div id='avatar'>
    <img src="<?php echo $user->photos->xl_url ?>" />
</div>

<h1><?php echo $user->name ?></h1>

<div id='bio'>
<p><?php echo $user->bio ?></p>
</div>

<div id="tabs">
    <ul>
    <?php foreach ($services as $id => $s) : ?>
        <li><a href='#<?php echo $id ?>'><?php echo $s['name'] ?></a></li>
    <?php endforeach ?>
    </ul>

    <?php if (isset($services['tumblr'])) : ?>
    <div id='tumblr'>
        <a id='tumblr-post' href='#'>Most recent Tumblr post</a>

        <script type="text/javascript">
        // The variable "tumblr_api_read" is now set.
        $(function() {
            $.getScript("<?php echo $services['tumblr']['url'] ?>/api/read/json", function() {
                $('#tumblr-post').attr('href', tumblr_api_read['posts'][0]['url-with-slug']);
            });
        });
        </script>
    </div>
    <?php endif ?>

    <?php if (isset($services['twitter'])) : ?>
    <div id='twitter'>
        <h2>Twitter</h2>
        <div id='tweets'>
        </div>

        <script type='text/javascript' src='jquery.twitter.min.js'></script>
        <script type='text/javascript'>
        $(function() {
            $('#tweets').twitter({from: '<?php echo $user->twitter ?>', replies: false, limit: 5});
        });
        </script>
    </div>
    <?php endif ?>
</div>
