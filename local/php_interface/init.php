<?php

if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/lib/vendor/autoload.php')) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/lib/vendor/autoload.php');
}

\App\CustomProperties\Register::register();