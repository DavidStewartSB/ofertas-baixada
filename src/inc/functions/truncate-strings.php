<?php
// Truncar strings
function truncate($string, $length = 100, $append = "&hellip;")
{
    $string = trim($string);

    if (strlen($string) > $length) {
        $string = wordwrap($string, $length);
        $string = explode("\n", $string, 2);
        $string = $string[0] . $append;
    }

    return $string;
}

function ignorePosts()
{
    global $ignorePosts;
    $ignorePosts = [];
}
add_action('after_setup_theme', 'ignorePosts');
