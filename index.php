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

    $user->bio = (preg_match('/^\s+$/i', $user->bio) ? "(No bio.)" : htmlspecialchars_decode(str_ireplace('/people/', '/forrst/', $user->bio)));
    $user->is_a = ucwords($user->is_a);

    $matches = array();
    $me = file_get_contents('http://forrst.me/'.$user->username);
    if (preg_match('/social">(.*?)<\/div/s', $me, $matches))
    {
        preg_match_all('/<a title="(?P<name>[\w|\s]+)".*?class="(?P<id>\w+)" href="(?P<url>.+)">/', $matches[1], $matches);
        $services = array();

        for ($i = 0; $i < count($matches[0]); $i++)
        {
            $id = $matches['id'][$i];

            if ($id === 'forrst')
            {
                continue;
            }

            $services[$id] = array(
                'name' => $matches['name'][$i],
                'url' => $matches['url'][$i],
            );

            $file = "inc/{$id}.php";

            if (file_exists($file))
            {
                $services[$id]['file'] = $file;
            }
        }
    }

    $file = 'display.php';
}

include('layout.php');
