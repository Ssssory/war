<?php
include_once("action.php");
require_once('datebase.php');
    $link=db_connect();
//выбор двух случайных персонажей из базы
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
//----------------------------------
$all_wepon = wepon_chenge($link);
foreach ($all_wepon as $key) {
  $arrWepon[$key['id_w']] = Array();
  $arrWepon[$key['id_w']]['name_wepon'] = $key["name_wepon"];
  $arrWepon[$key['id_w']]['damage_min'] = $key["damage_min"];
  $arrWepon[$key['id_w']]['damage_max'] = $key["damage_max"];
}
//-----------------------------------
//прототип класса персонажа
class person{
    public $id = 0;
    public $hels = 10;
    public $damag = 2;
    public $life = 1;
    public $minDamag = 0;
    public $maxDamag = 0;
    public $gun = "перочиный ножик";
    function __construct($id, $name, $hels, $damag, $wep){
        $this->gun = $wep['name_wepon'];
        $this->id = $id;
        $this->name = $name;
        $this->hels = $hels;
        $this->damag = $damag;
        $this->minDamag = $wep['damage_min'];
        $this->maxDamag = $wep['damage_max'];
    }
    public function shoot(){
        $d = rand($this->minDamag,$this->maxDamag);
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
$pers1 = new person($all_of_them[$a]['id'], $all_of_them[$a]['name'], $all_of_them[$a]['hels'], $all_of_them[$a]['damage'], $arrWepon[$all_of_them[$a]['id_w']]);
$pers2 = new person($all_of_them[$b]['id'], $all_of_them[$b]['name'], $all_of_them[$b]['hels'], $all_of_them[$b]['damage'], $arrWepon[$all_of_them[$b]['id_w']]);
// переделать в функцию и вызывать по нажатию кнопки
$text_rez = new write_text;

//просчитать арену
$count = 0;
while ($pers1->life || $pers2->life != 0){
    $count++;
    $text_rez->set_t("<br>------- Round $count -------<br> <br>");
    $d = $pers1->shoot();
    $text_rez->set_t("атака1 ".$d." <br>");
    $pers2->damagSelf($d);
    if ($pers2->life == 0){
        $text_rez->set_t( "персонаж ". $pers2->name ." потерпел поражение ");
        break;
    }
    if($pers2->life == 1){
        $d = $pers2->shoot();
        $text_rez->set_t("атака2 ".$d."<br>");
        $pers1->damagSelf($d);
        if ($pers1->life == 0){
            $text_rez->set_t( "персонаж ". $pers1->name ." потерпел поражение ");
            break;
        }
    }
   }

?>
