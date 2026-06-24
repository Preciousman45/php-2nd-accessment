<?php


require 'inventoryFunctions.php'; 
$filename = './inventory.csv';


 $UpdateArray = [];
  

 

 
 






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

ViewALL();




} elseif ($stockOptions == 2) {
    

AddItem();
   

  } elseif ($stockOptions == 3) {

  SearchItem();




   } elseif ($stockOptions == 4) {
      
   UpdateQuantity();



} elseif ($stockOptions == 5) {

DeleteItem();




} elseif ($stockOptions == 6) {

TotalStock();



} elseif ($stockOptions == 7) {
   echo "EXITED";
  
}

}



?>