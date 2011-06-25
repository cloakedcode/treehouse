<script type='text/javascript' src='ba-linkify.min.js'></script>
<script type='text/javascript' src='jquery.twitter.min.js'></script>
<script type='text/javascript'>
$(function() {
    $('#tweets').twitter({from: '<?php echo $user->twitter ?>', replies: false, limit: 5, notFoundText: "No tweets found."});
});
</script>

<div id='tweets'>
<p>Loading tweets...</p>
</div>
