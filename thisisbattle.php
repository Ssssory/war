<?php
include_once"action.php";
require_once('datebase.php');
    $link=db_connect();

$all_of_them = array();
$all_of_them = look_all($link);
print_r($all_of_them); //удалить после отладки
$n = count($all_of_them);
$a = rand(0,$n-1);
$b = rand(0,$n-1);
if ($a == $b){
    while($a==$b) {
        $b = rand(0,$n);
    }
}
echo "<br>$a , $b <br>";

//прототип класса персонажа
class person{
    public $id = 0;
    public $hels = 10;
    public $damag = 2;
    public $life = 1;
    public $ganDamag = 0;
    public $gun = "перочиный ножик";
    function __construct($id, $name, $hels, $damag){
        $this->id = $id;
        $this->name = $name;
        $this->hels = $hels;
        $this->damag = $damag;
    }
    public function shoot(){
        $d = $this->ganDamag + $this->damag;
        return $d;
    }
    public function damagSelf($d){
        $this->hels -= $d;
        //echo $d;
        if ($this->hels <= 0){
            $this->life = 0;
            echo "персонаж ". $this->name ." погиб;( "; // с этим надо что-то делать.
        }
    }
}

//загоняем выборку в классы
$pers1 = new person($all_of_them[$a]['id'], $all_of_them[$a]['name'], $all_of_them[$a]['hels'], $all_of_them[$a]['damage']);
$pers2 = new person($all_of_them[$b]['id'], $all_of_them[$b]['name'], $all_of_them[$b]['hels'], $all_of_them[$b]['damage']);
// переделать в функцию и вызывать по нажатию кнопки
$text = '';
//просчитать арену
while ($pers1->life != 0 or $pers2->life != 0){
    $text = $text . "выстрел<br>";
    $d = $pers1->shoot();
    $pers2->damagSelf($d);
    $text = $text . "ответный выстрел<br>";
    $d = $pers2->shoot();
    $pers1->damagSelf($d);
}
//вывести результат
echo($text);

?>