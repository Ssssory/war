<?php

include "index2.php";


##функция создания нового персонажа с записью в базу
function create_person($link, $name, $hels, $damage, $gun){
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
##Функция просмотра всех имеющихся персонажей
function look_all($link){
    $query = "SELECT * FROM persons ORDER BY id DESC";
    $result = mysqli_query($link, $query);
        if(!$result){
            die(mysqli_error($link));
        }
    $n = mysqli_num_rows($result);
    $person_window = array();
    
    for ($i=0; $i<$n; $i++){
        $row = mysqli_fetch_assoc($result);
        $person_window[] = $row;
    }
    return $person_window;
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

?>