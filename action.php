<?php
include "datebase.php";
include "index2.php";
$link = db_connect();

##функция создания нового персонажа с записью в базу
function create_person($name,$hels,$damage,$gun){
    $name=trim($name);
    $hels=trim($hels);
    $demage=trim($damage);
##Запилить проверку на числа и отрицательные значения. Возможно просто перепилить поле в счётчик.
##Проверка на пустые строки.
    $person_cr="INSERT INTO persons (name, hels, damage) VALUES('%s','%s','%s')";
    $query=sprintf($person_cr,mysqli_real_escape_string($link, $name), mysqli_real_escape_string($link, $hels), mysqli_real_escape_string($link, $damage));
$result = mysqli_query($link, $query);
    if(!$result)
        die(mysqli_error($link));
return true;
}
/*
функция вывода текста в лог
function writetext($text){
    echo $text."<br />";    
}

функция выбора персонажа из базы
функция редактирования персонажа руками с записью в базу
функция удаления персонажа из базы
функция коррекции данных персонажа в базе без участия рук
функция взаимодействия двух персонажей







*/
/*
$name = $_POST('NameForm');
$hels = $_POST('Hels');
$damage = $_POST('damage');
$weapon = $_POST('');
$armor = $_POST('');
$inventory = array();
$inventory[0] = $_POST('slot1');
$inventory[1] = $_POST('slot2');
$inventory[2] = $_POST('slot3');
print_r ($name. $hels. $damage. $weapon. $armor) 
*/
?>