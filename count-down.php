<?php   


function countdown_to_start (){
   $numbers = 1 ;

   for($i=10; $i>=$numbers; $i--) {

        if($i==1) {
             print $i."..."."flight" . '<br>';
        } else {
            
           echo $i . '...' ;

        }
   }
}

countdown_to_start()





?>