<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 8-5-2018
 * Time: 9:57
 */
include 'functies.php';
$location = 'index';
session_start();
logout();
redirect($location);
?>