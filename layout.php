<html>
<head>
    <title></title>

    <link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/base/jquery-ui.css' />
    <link rel='stylesheet' type='text/css' href='css/style.css' />
</head>

<body>

<div id='content'>
<?php
if (isset($file))
{
    include($file);
}
?>
</div>
<div id='footer'>
    <?php if ($file !== 'home.php') : ?>
    The person whose picture you see up there, has a copyright on this material, unless otherwise stated.
    <br/>
    <?php endif ?>
    Tree House made by <a href='/cloakedcode'>Cloaked Code</a>.
</div>

</body>

</html>
