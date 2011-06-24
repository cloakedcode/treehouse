<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js'></script>

<div id='avatar'>
    <img src="<?php echo $user->photos->xl_url ?>" />
</div>

<h1><?php echo $user->name ?></h1>

<div id='bio'>
<p><?php echo $user->bio ?></p>
</div>

<div id='social'>
    <ul>
        <?php foreach ($services as $s) : ?>
            <li><a href='<?php echo $s['url'] ?>'><?php echo $s['name'] ?></a></li>
        <?php endforeach ?>
    </ul>
</div>

<?php if (isset($services['tumblr'])) : ?>
<div id='tumblr'>
    <a id='tumblr-post' href='#'>Most recent Tumblr post</a>

    <script type="text/javascript">
    // The variable "tumblr_api_read" is now set.
    $(document).ready(function() {
        $.getScript("<?php echo $services['tumblr']['url'] ?>/api/read/json", function() {
            $('#tumblr-post').attr('href', tumblr_api_read['posts'][0]['url-with-slug']);
        });
    });
    </script>
</div>
<?php endif ?>

<?php if (empty($user->twitter) === FALSE) : ?>
<h2>Tweets</h2>
<div id='tweets'>
</div>

<script type='text/javascript' src='jquery.twitter.min.js'></script>
<script type='text/javascript'>
$(document).ready(function() {
    $('#tweets').twitter({from: '<?php echo $user->twitter ?>', replies: false, limit: 5});
});
</script>
<? endif ?>
