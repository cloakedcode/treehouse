<?php

if (empty($_GET['u']))
{
    $file = 'home.php';
    include('layout.php');
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

    $user->name = charset_decode_utf_8($user->name);
    $user->bio = (preg_match('/^\s+$/i', $user->bio) ? "(No bio.)" : charset_decode_utf_8(str_ireplace('/people/', '/forrst/', $user->bio)));
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

/**
 * Grabbed this from a comment: http://us2.php.net/manual/en/function.utf8-decode.php#85034
 * Comes from Squirrelmail.
 */
function charset_decode_utf_8 ($string) {
    /* Only do the slow convert if there are 8-bit characters */
    /* avoid using 0xA0 (\240) in ereg ranges. RH73 does not like that */
    if (! preg_match("/[\200-\237]/", $string) and ! preg_match("/[\241-\377]/", $string))
        return $string;

    // decode three byte unicode characters
    $string = preg_replace("/([\340-\357])([\200-\277])([\200-\277])/e",       
            "'&#'.((ord('\\1')-224)*4096 + (ord('\\2')-128)*64 + (ord('\\3')-128)).';'",   
            $string);

    // decode two byte unicode characters
    $string = preg_replace("/([\300-\337])([\200-\277])/e",
            "'&#'.((ord('\\1')-192)*64+(ord('\\2')-128)).';'",
            $string);

    return $string;
} 
