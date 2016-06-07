<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Lets battle!</title>
</head>
<body>
   <?php
    include_once "action.php";
    ?>
    <container>
        <div class="head_part"><h1>Заготовка под визуальное оформление</h1></div>
        <div class="window">
            <div class="left">
                <p>Окно первого персонажа NAME</p>
            <ul>
                <li>Здоровье <ltext><?php echo $pers1->hels?></ltext></li>
                <li>Сила <ltext><?php echo $pers1->damag?></ltext></li>
                <li>Наличие отсутствия <ltext><?php echo $pers1->gun?></ltext></li>
            </ul>                
            </div>
            <div class="buttons">               
               <form action="manipulate.php" method='post'>
                    <button name='way' value='start'>Запуск</button>
                    <button name='way' value='opsion'>Настройки</button>
                    <button name='way' value='new_p'>Создать</button>
                    <button name='way' value='correct'>Изменить</button>
                </form>
            </div>
            <div class="right"><p>Окно второго персонажа NAME</p>
            <ul>
                <li>Здоровье <ltext><?php echo $pers2->hels?></ltext></li>
                <li>Сила <ltext><?php echo $pers2->damag?></ltext></li>
                <li>Наличие отсутствия <ltext><?php echo $pers2->gun?></ltext></li>
            </ul>                </div>
        </div>
        <div class="log">
        <p>лог происходящего</p><hr />
        <?php 
            echo "gggg";
                  
            ?>
        </div>                
    </container>
    <div class="foter"><p>Какая-нибудь навигация</p></div>
</body>
</html>