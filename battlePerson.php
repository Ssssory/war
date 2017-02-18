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
    include_once "thisisbattle.php";
    ?>
    <container>
        <div class="head_part"><h1>Заготовка под визуальное оформление</h1></div>
        <div class="window">
            <div class="left">
                <p>Окно первого персонажа <?php echo $all_of_them[$a]['name'] ?></p>
            <ul>
                <li>Здоровье <ltext><?php echo $all_of_them[$a]['hels']?></ltext></li>
                <li>Поразительная сила <ltext><?php echo $arrWepon[$all_of_them[$a]['id_w']]['damage_min']." - ".$arrWepon[$all_of_them[$a]['id_w']]['damage_max']?></ltext></li>
                <li>Наличие отсутствия <ltext><?php echo $pers1->gun?></ltext></li>
                <li>Всего <ltext><?php echo $pers1->battles?></ltext></li>
                <li>Победы <ltext><?php echo $pers1->win?></ltext></li>
                <li>Поражения <ltext><?php echo $pers1->lose?></ltext></li>
            </ul>
            </div>
            <div class="buttons">
               <form action="manipulate.php" method='post'>
                    <button <?php ##name='way' value='start'?>>Запуск</button>
                    <button name='way' value='option'>Настройки</button>
                    <button name='way' value='new_p'>Создать</button>
                    <button <?php ##name='way' value='correct'?>>Изменить</button>
                </form>
            </div>
            <div class="right"><p>Окно второго персонажа <?php echo $all_of_them[$b]['name'] ?></p>
            <ul>
                <li>Здоровье <ltext><?php echo $all_of_them[$b]['hels']?></ltext></li>
                <li>Сила <ltext><?php echo $arrWepon[$all_of_them[$b]['id_w']]['damage_min']." - ".$arrWepon[$all_of_them[$b]['id_w']]['damage_max']?></ltext></li>
                <li>Наличие отсутствия <ltext><?php echo $pers2->gun?></ltext></li>
                <li>Всего <ltext><?php echo $pers2->battles?></ltext></li>
                <li>Победы <ltext><?php echo $pers2->win?></ltext></li>
                <li>Поражения <ltext><?php echo $pers2->lose?></ltext></li>
            </ul>                </div>
        </div>
        <div class="log">
        <p>лог происходящего</p><hr />
        <?php $text_rez->write_t(); ?>
        </div>
    </container>
    <div class="foter"><p>Какая-нибудь навигация</p></div>
</body>
</html>
