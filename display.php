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

<div id="tabs">
    <ul>
        <li><a href='#bio'>Bio</a></li>
<?php if (empty($services) === FALSE) : ?>
    <?php foreach ($services as $id => $s) : ?>
        <?php if (isset($s['file'])) : ?>
            <li><a href='#<?php echo $id ?>'><?php echo $s['name'] ?></a></li>
        <?php else : ?>
            <?php $misc[] = $s ?>
        <?php endif ?>
    <?php endforeach ?>
<?php endif ?>
    <?php if (isset($misc)) : ?>
        <li><a href='#misc'>Misc.</a></li>
    <?php endif ?>
    </ul>

    <div id='bio'>
        <?php echo $user->bio ?>
    </div>

<?php if (empty($services) === FALSE) : ?>
    <?php foreach ($services as $id => $service) : ?>
        <?php if (isset($service['file'])) : ?>
            <div id='<?php echo $id ?>'>
            <?php include("inc/{$id}.php") ?>
            </div>
        <?php endif ?>
    <?php endforeach ?>
<?php endif ?>

<?php if (isset($misc)) : ?>
    <div id='misc'>
        <ul>
        <?php foreach ($misc as $s) : ?>
            <li><a href='<?php echo $s['url'] ?>'><?php echo $s['name'] ?></a></li>
        <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>
</div>
