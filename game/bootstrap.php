<?php
set_include_path(get_include_path() . PATH_SEPARATOR .
		dirname(__DIR__) . '/library' . PATH_SEPARATOR . 
		dirname(__DIR__) . '/modules');

spl_autoload_register(function($class) {
    $class_name = str_replace('\\', '/', $class);
    return spl_autoload($class_name);
});
