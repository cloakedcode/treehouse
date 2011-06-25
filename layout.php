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
    No copyright.
</div>

</body>

</html>
