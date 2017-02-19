<?php

##функция создания нового персонажа с записью в базу
function create_person($link, $name, $hels, $damage, $gun){
    $name=trim($name);
    $hels=trim($hels);
    $demage=trim($damage);
##Запилить проверку на числа и отрицательные значения. Возможно просто перепилить поле в счётчик.
##Проверка на пустые строки.
    $person_cr="INSERT INTO persons (name, hels, damage, id_w) VALUES('%s','%s','%s','%s')";
    $query=sprintf($person_cr,mysqli_real_escape_string($link, $name), mysqli_real_escape_string($link, $hels), mysqli_real_escape_string($link, $damage),(int)$gun);
$result = mysqli_query($link, $query);
    if(!$result)
        die(mysqli_error($link));
return true;
}
##функция изменения свойства персонажа. передавать battle/win/lose
function update_battle_win_lose($link, $property, $value, $id){
    $update_property = "UPDATE persons SET count_".$property."=\"".++$value."\" WHERE id=%d";
    $query=sprintf($update_property, (int)$id);
$result = mysqli_query($link, $query);
    if(!$result)
        die(mysqli_error($link));
return true;
}
##функция статистики персонажей. передавать
function update_to_null_statistic($link){
    $upnull_property = "UPDATE persons SET count_battle = 0, count_win = 0, count_lose = 0";
$result = mysqli_query($link, $upnull_property);
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
function wepon_chenge($link, $id_w = false){
  if ($id_w) {
    $query = sprintf("SELECT * FROM wepon WHERE id_w=%d", (int)$id_w);
  }else{
    $query = ("SELECT * FROM wepon");
  }

    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    $chenge_w = array();
    $chenge_w = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $chenge_w;
}
//функция выбора персонажа из базы

//функция удаления персонажа из базы
function delete_person($link, $id){
	$query = sprintf("DELETE FROM persons WHERE id=%d", (int)$id);
	$result = mysqli_query($link, $query);

	if (!$result)
            die(mysqli_error($link));
	return $result;
}

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
    function result_save($txt){
        $this->text = $txt;
        //пишем результат в базу
        clear_t();
    }
}
/*

функция редактирования персонажа руками с записью в базу

функция коррекции данных персонажа в базе без участия рук
функция взаимодействия двух персонажей

*/

?>
