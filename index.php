<?php

if (empty($_GET['u']))
{
    header('HTTP/1.1 404 Not found');
    exit;
}

require('forrst-canopy.php');

$user = ForrstCanopyUser::info($_GET['u']);

if (empty($user))
{
    $file = 'notfound.php';
}
else
{
    $user = $user->resp;

    $matches = array();
    $me = file_get_contents('http://forrst.me/'.$user->username);
    if (preg_match('/social">(.*?)<\/div/s', $me, $matches))
    {
        preg_match_all('/<a title="(?P<name>\w+)".*?class="(?P<id>\w+)" href="(?P<url>.+)">/', $matches[1], $matches);
        $services = array();

        for ($i = 0; $i < count($matches[0]); $i++)
        {
            $services[$matches['id'][$i]] = array(
                'name' => $matches['name'][$i],
                'url' => $matches['url'][$i],
            );
        }
    }

    $file = 'display.php';
}

include('layout.php');
