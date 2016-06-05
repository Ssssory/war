<?php

 class person{
    public $hels = 10;
    public $damag = 2;
    public $life = 1;
    public $ganDamag = 0;
    public $gun = "перочиный ножик";
    public function shoot(){
        $d = $this->ganDamag + $this->damag;
        return $d;
    }
    public function damagSelf($d){
        $this->hels -= $d;
        echo $d;
        if ($this->hels <= 0){
            $this->life = 0;
            echo ("персонаж погиб;( ");
        }
    }
}

$pers1 = new person;
$pers2 = new person;
##print_r($pers1);
##print_r($pers2);
/*
while ($pers1->life != 0 or $pers2->life != 0){
    echo ("выстрел");
    $d = $pers1->shoot();
    $pers2->damagSelf($d);
    echo ("ответный выстрел");
    $d = $pers2->shoot();
    $pers1->damagSelf($d);
}
*/

?>