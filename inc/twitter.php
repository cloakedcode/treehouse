<script type='text/javascript' src='ba-linkify.min.js'></script>
<script type='text/javascript' src='jquery.twitter.min.js'></script>
<script type='text/javascript'>
$(function() {
    $('#tweets').twitter({from: '<?php echo $user->twitter ?>', replies: false, limit: 5, notFoundText: "No recent tweets. Visit their Twitter page."});
});
</script>

<h1><a href='http://twitter.com/<?php echo $user->twitter ?>'>@<?php echo $user->twitter ?></a></h1>
<div id='tweets'>
<p>Loading tweets...</p>
</div>
