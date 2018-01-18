<?php
//Duong dan dia chi goc
//          o   /virtual-directory/: Chay bang thu muc ao (Virtual Directory)
//          o   /                  : Chay bang domain

define('CONST_DB_SERVER_ADDRESS', 'localhost');
define('CONST_DB_DATABASE_NAME', 'chat');
define('CONST_DB_USER_NAME', 'root');
define('CONST_DB_USER_PASSWORD', 'root');
define('SITE_ROOT','/ReactJs/');

if (defined('CLI') == false)
{
    if (!preg_match('/^http:/', SITE_ROOT) OR ! preg_match('/^https:/', SITE_ROOT))
    {
        if (empty($_SERVER['HTTPS']))
        {
            define('FULL_SITE_ROOT', 'http://' . $_SERVER['HTTP_HOST'] . SITE_ROOT);
        }
        else
        {
            define('FULL_SITE_ROOT', 'https://' . $_SERVER['HTTP_HOST'] . SITE_ROOT);
        }
    }
    else
    {
        define('FULL_SITE_ROOT', SITE_ROOT);
    }
}
