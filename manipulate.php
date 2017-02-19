<?php
require_once("datebase.php");
require_once("action.php");
$link = db_connect();


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
    if($_POST['way'] == 'clear_state'){
        update_to_null_statistic($link);
        header('Location: battlePerson.php');
    }
    ##вызов окна создания персонажа
    if($_POST['way'] == 'correct'){
        header('Location: options_g.php');
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
