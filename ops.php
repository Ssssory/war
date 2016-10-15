<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Options</title>
    <script src="js/js-jquery-1.7.2.min.js"></script>
</head>
<body>
    <script>
        function num_id(id){             
            temp_post = "way=delete&id="+id;
            $.ajax({
                    url: 'manipulate.php',
                    type: "POST",
                    data:  temp_post,
                    success: function(data){
                        alert(data);
                    }
                    
        });
    }
        </script>
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
               $temp_name = $a['name'];
           ?>
            <tr>
                <td><?php echo $temp_name?></td>
                <td><?php echo $a['hels']?></td>
                <td><?php echo $a['damage']?></td>
                <td><?php echo $a['id_w']?></td>
                <td><a href='manipulate.php?way=edit&id=<?php echo $a['id']?>'>изменить</a></td>
                <td><a href='/war/ops.php' id_res="<?php echo $a["id"] ?>" onclick="num_id(<?php echo $a["id"] ?>) ">удалить</a></td>
                <!--<td><a href='manipulate.php?way=delete&id=<?php echo $a['id']?>'>удалить</a></td>-->
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>