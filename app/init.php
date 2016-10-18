<?php
/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 12-10-2016
 * Time: 12:22
 */

require realpath(__DIR__ . '/config.php');

/*
 *  Require all vendor classes (from composer)
 *
 * */

require realpath(__DIR__ . '/../vendor/autoload.php');

/*
 * Require all classes
 *
 * */

spl_autoload_register(function($class){
    if(file_exists(__DIR__ . '/classes/' . $class . '.php')){
        require realpath(__DIR__ . '/classes/' . $class . '.php');
    }
});