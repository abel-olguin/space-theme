<?php
/**
 * @package space
 */


use Abolch\App\Space;
use Abolch\App\Menu;
use Abolch\App\Pages;
use Abolch\App\ThemeSupport;

define('IMG_DIR', get_template_directory_uri().'/src/img');
define('JSON_DIR', get_template_directory_uri().'/src/json');
require_once( __DIR__ . '/App/WpHelper.php' );
require_once(__DIR__ . '/App/Space.php');
require_once( __DIR__ . '/App/ThemeSupport.php' );
require_once( __DIR__ . '/App/Pages.php' );
require_once( __DIR__ . '/App/Menu.php' );

new Space();
new Menu();
new ThemeSupport();
new Pages();

