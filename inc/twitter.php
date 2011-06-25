<h2>Twitter</h2>
<div id='tweets'>
</div>

<script type='text/javascript' src='jquery.twitter.min.js'></script>
<script type='text/javascript'>
$(function() {
    $('#tweets').twitter({from: '<?php echo $user->twitter ?>', replies: false, limit: 5});
});
</script>
