<?php   


function countdown_to_start (){
  $numbers = 1;

for ($i = 10; $i >= $numbers; $i--) {
    if ($i == 1) {
        print "$i....fligh\n"; 
    } else {
        // Added <br> here to force a new line after each number
        echo "$i....\n";
    }
}

}

countdown_to_start()





?>