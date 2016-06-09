<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Options</title>
</head>
<body>
   <?php
    require_once('action.php');
    require_once('datebase.php');
    $link=db_connect();
    $person_window = look_all($link);
    ?>
    <table border="1" width='100%'>
      <caption>Все созданные персонажи <a href="battlePerson.php">Назад</a></caption>
       <tbody>
            <tr>
                <td>имя</td>
                <td>здоровье</td>
                <td>урон</td>
                <td>оружие</td>
                <td>коррекция</td>
                <td>удаление</td><!--Добавить подтверждение на джава скрипте-->
            </tr>
            <?php
           foreach($person_window as $a):
           ?>
            <tr>
                <td><?php echo $a['name']?></td>
                <td><?php echo $a['hels']?></td>
                <td><?php echo $a['damage']?></td>
                <td><?php echo $a['id']?></td>
                <td><a href='manipulate.php?way=edit&id=<?php $a['id']?>'>изменить</a></td>
                <td><a href='manipulate.php?way=delete&id=<?php $a['id']?>'>удалить</a></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>