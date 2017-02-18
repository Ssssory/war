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
    public $battles = 0;
    public $win = 0;
    public $lose = 0;

    function __construct($arr){
        $this->gun = $arr['name_wepon'];
        $this->id = $arr['id'];
        $this->name = $arr['name'];
        $this->hels = $arr['hels'];
        $this->minDamag = $arr['damage_min'];
        $this->maxDamag = $arr['damage_max'];
        $this->battles = $arr['battles'];
        $this->win = $arr['win'];
        $this->lose = $arr['lose'];
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
$arrFirstPerson = Array(
  "id" => $all_of_them[$a]['id'],
  "name" => $all_of_them[$a]['name'],
  "hels" => $all_of_them[$a]['hels'],
  "damage_min" => $arrWepon[$all_of_them[$a]['id_w']]['damage_min'],
  "damage_max" => $arrWepon[$all_of_them[$a]['id_w']]['damage_max'],
  "name_wepon" => $arrWepon[$all_of_them[$a]['id_w']]['name_wepon'],
  "battles" => $all_of_them[$a]['count_battle'],
  "win" => $all_of_them[$a]['count_win'],
  "lose" => $all_of_them[$a]['count_lose'],
);
$arrSecondPerson = Array(
  "id" => $all_of_them[$b]['id'],
  "name" => $all_of_them[$b]['name'],
  "hels" => $all_of_them[$b]['hels'],
  "damage_min" => $arrWepon[$all_of_them[$b]['id_w']]['damage_min'],
  "damage_max" => $arrWepon[$all_of_them[$b]['id_w']]['damage_max'],
  "name_wepon" => $arrWepon[$all_of_them[$b]['id_w']]['name_wepon'],
  "battles" => $all_of_them[$b]['count_battle'],
  "win" => $all_of_them[$b]['count_win'],
  "lose" => $all_of_them[$b]['count_lose'],
);
$pers1 = new person( $arrFirstPerson);
$pers2 = new person( $arrSecondPerson);
// переделать в функцию и вызывать по нажатию кнопки
$text_rez = new write_text;

//просчитать арену
$count = 0;
while ($pers1->life || $pers2->life != 0){
    $count++;
    $text_rez->set_t("<br>------- Round $count -------<br>");
    $text_rez->set_t("$pers1->name осталось здоровья $pers1->hels / $pers2->name осталось здоровья $pers2->hels<br> <br>");
    $d = $pers1->shoot();
    $text_rez->set_t("$pers1->name атака: ".$d." <br>");
    $pers2->damagSelf($d);
    if ($pers2->life == 0){
        $text_rez->set_t( "персонаж ". $pers2->name ." потерпел поражение ");
        break;
    }
    if($pers2->life == 1){
        $d = $pers2->shoot();
        $text_rez->set_t("$pers2->name атака: ".$d."<br>");
        $pers1->damagSelf($d);
        if ($pers1->life == 0){
            $text_rez->set_t( "персонаж ". $pers1->name ." потерпел поражение ");
            break;
        }
    }
   }

?>
