<?php

if (empty($_GET['f']) === false)
{
    $root = dirname(dirname(__FILE__));
    require($root.'/css/lessphp/lessc.php');
    $input = $root.'/css/'.$_GET['f'].'.less';
    $output = $root.'/cache/'.$_GET['f'].'.css';

    try {
        lessc::ccompile($input, $output);
    }
    catch (exception $ex) {
        exit($ex->getMessage());
    }

    header('Content-type: text/css');

    readfile($output);
}
