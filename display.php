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
<div id='info'>
    <p><?php echo $user->is_a ?></p>
    <p><a href='<?php echo $user->homepage_url ?>'><?php echo $user->homepage_url ?></a></p>
</div>

<div id='bio'>
    <?php echo $user->bio ?>
</div>

<?php if (empty($services) === FALSE) : ?>
<div id="tabs">
    <ul>
    <?php foreach ($services as $id => $s) : ?>
        <li><a href='#<?php echo $id ?>'><?php echo $s['name'] ?></a></li>
    <?php endforeach ?>
        <li><a href='#misc'>Misc.</a></li>
    </ul>

    <?php foreach ($services as $id => $service) : ?>
        <?php if (file_exists("inc/{$id}.php")) : ?>
            <div id='<?php echo $id ?>'>
            <?php include("inc/{$id}.php") ?>
            </div>
        <?php else : ?>
            <?php $misc[] = $service ?>
        <?php endif ?>
    <?php endforeach ?>

    <div id='misc'>
        <ul>
            <?php foreach ($misc as $s) : ?>
                <li><a href='<?php echo $s['url'] ?>'><?php echo $s['name'] ?></a></li>
            <?php endforeach ?>
        </ul>
    </div>
</div>
<?php endif ?>
