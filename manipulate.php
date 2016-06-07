<?php
require_once("datebase.php");
require_once("action.php");
$link = db_connect();
$name = $_POST['NameForm'];
$hels = $_POST['Hels'];
$damage = $_POST['damage'];
$weapon = $_POST['wepon'];
##$armor = $_POST[''];
$inventory = array();
$inventory[0] = $_POST['slot1'];
$inventory[1] = $_POST['slot2'];
$inventory[2] = $_POST['slot3'];
echo "$name, $hels, $damage, $weapon ";
create_person($link, $_POST['NameForm'], $_POST['Hels'], $_POST['damage'], $_POST['wepon']);




?>