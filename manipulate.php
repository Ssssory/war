<?php
require_once("datebase.php");
require_once("action.php");
$link = db_connect();

if(isset($_GET['action']))
    $action = $_GET['action'];
else
    header('battlePerson.php');

echo $action;
##if($action == "create01")





?>