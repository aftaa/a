<?php

spl_autoload_register(function($class) {
    $class = str_replace('\\', '/', $class);
    $class = "$_SERVER[DOCUMENT_ROOT]/$class";
    $class .= '.php';
    try {
        include_once  $class;
    } catch (Exception $e) {
    }
});
