<?php 


function check_ingredient_match( $recipe ,$inventory){

     $abscentIngredient = []; 

     $uniqueArry= array_unique($recipe);

     $needed = count($uniqueArry);

    
    
   

    foreach( $recipe as $content ) {
      if (!in_array($content, $inventory,true)) {
        $abscentIngredient[] = $content ;

      }


    $availableIngredient = $needed -(count($abscentIngredient));
    $percentage = (float)(($availableIngredient/$needed) * 100 );


   }

  return [$percentage,$abscentIngredient];

}




?>