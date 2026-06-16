<?php 

function enchant_and_attack(int $target_health,int $damage,string $weapon){

     
        $result = [];
        $enchanted_damage = $damage + 10;
        $enchanted_weapon = "enchanted ".$weapon;
        $new_health = $target_health - ($damage + 10) ;
        $result=[$enchanted_weapon , $new_health ];


        return $result ;


}
;
?>