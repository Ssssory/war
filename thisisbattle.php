<?php
include_once("action.php");
require_once('datebase.php');
    $link=db_connect();

$all_of_them = array();
$all_of_them = look_all($link);
$n = count($all_of_them);
$n -= 1;
$a = rand(0,$n);
$b = rand(0,$n);
if ($a == $b){
    while($a==$b) {
        $b = rand(0,$n);
    }
}
//echo "<br>$a , $b <br>"; отладочная строка

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
        if ($this->hels <= 0){
            $this->life = 0;             
        }
    }
}

//загоняем выборку в классы
$pers1 = new person($all_of_them[$a]['id'], $all_of_them[$a]['name'], $all_of_them[$a]['hels'], $all_of_them[$a]['damage']);
$pers2 = new person($all_of_them[$b]['id'], $all_of_them[$b]['name'], $all_of_them[$b]['hels'], $all_of_them[$b]['damage']);
// переделать в функцию и вызывать по нажатию кнопки
$text_rez = new write_text;

//просчитать арену
$count = 0;
while ($pers1->life || $pers2->life != 0){
    $count++;
    $text_rez->set_t("Round $count <br>");
    $text_rez->set_t("атака <br>");
    $d = $pers1->shoot();
    $pers2->damagSelf($d);
    if ($pers2->life == 0){
        $text_rez->set_t( "персонаж ". $pers2->name ." потерпел поражение "); 
        break;
    }
    if($pers2->life == 1){
        $text_rez->set_t("ответная атака <br>");
        $d = $pers2->shoot();
        $pers1->damagSelf($d);
        if ($pers1->life == 0){
            $text_rez->set_t( "персонаж ". $pers1->name ." потерпел поражение ");
            break;
        }
    }
   }
    
?>