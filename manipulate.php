<?php
require_once("datebase.php");
require_once("action.php");
$link = db_connect();

/*
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
*/
if(isset($_POST['way'])){
    ##Вызов окна настроек    
    if($_POST['way'] == 'option'){
        header('Location: ops.php');
    }
    if($_POST['way'] == 'delete'){
        delete_person($link, $_POST['id']);
        echo "Удалён";
    }
        
    
    ##вызов окна создания персонажа
    if($_POST['way'] == 'new_p'){
        header('Location: createPerson.php');
    }
    ##Запрос в базу на создание
    if($_POST['way'] == 'new_p_cr'){
        create_person($link, $_POST['NameForm'], $_POST['Hels'], $_POST['damage'], $_POST['wepon']);
        header('Location: createPerson.php');
    }
    
}
else{
    header('Location: index.php');
}
##

?>