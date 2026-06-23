<?php


require 'inventoryFunctions.php'; 
$filename = './inventory.csv';


 $UpdateArray = [];
  
 $nameDelete;
 

 print_r($filename);
 
$stockOptions = readline("=== Inventory Manager ===
1. View all items
2. Add item
3. Search item
4. Update quantity
5. Delete item
6. Total stock value
7. Exit
Choose an option:");
  








if($stockOptions){


if ($stockOptions == 1){

option1();




} elseif ($stockOptions == 2) {
    

option2();
   

  } elseif ($stockOptions == 3) {

  option3();




   } elseif ($stockOptions == 4) {
      
   option4();



} elseif ($stockOptions == 5) {

option5();




} elseif ($stockOptions == 6) {

option6();


} elseif ($stockOptions == 7) {
   echo 'Exited';
}
 
};

   



?>