<?php

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
//функция выбора оружия из базы
function wepon_chenge($link, $id_w){
    $query = sprintf("SELECT * FROM wepon WHERE id_w=%d", (int)$id_w);
    $result = mysqli_query($link, $query);
    
    if (!$result)
        die(mysqli_error($link));
    
    $chenge_w = array();   
    $chenge_w = mysqli_fetch_assoc($result);   
    return $chenge_w;
}
//функция выбора персонажа из базы



//функция вывода текста в лог
class write_text{
    public $text = "";
    function set_t($txt){
        $this->text = $this->text . $txt;
    }
    function write_t(){
        echo $this->text;
    return ($this->text);    
    }
    function clear_t(){
        $this->text = '';
    }
}
/*

функция редактирования персонажа руками с записью в базу
функция удаления персонажа из базы
функция коррекции данных персонажа в базе без участия рук
функция взаимодействия двух персонажей

*/

?>