<?php

ob_start();
session_start();
//session_destroy();
/*
defined("DS")?null:define("DS",DIRECTORY_SEPARATOR);

defined("TEMPLATE_FRONT")?null:define("TEMPLATE_FRONT",__DIR__.DS."templates/front");

defined("TEMPLATE_BACK")?null:define("TEMPLATE_BACK",__DIR__.DS."templates/back");

defined("DB_HOST")?null:define("DB_HOST",__DIR__.DS."localhost");
defined("DB_USER")?null:define("DB_USER",__DIR__.DS."root");
defined("DB_PASS")?null:define("DB_PASS",__DIR__.DS."");
defined("DB_NAME")?null:define("DB_NAME",__DIR__.DS."ecom");
*/

$host="localhost";
$user="root";
$pass="";
$dbname="ecom";
$connection=mysqli_connect($host,$user,$pass,$dbname);
require_once("functions.php");

 ?>
