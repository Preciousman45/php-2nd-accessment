<?php


require 'inventoryFunctions.php'; 
$filename = './inventory.csv';


 $allArray = [];
  
 $nameDelete;
 

 print_r($filename);
$name = readline("=== Inventory Manager ===
1. View all items
2. Add item
3. Search item
4. Update quantity
5. Delete item
6. Total stock value
7. Exit
Choose an option:");
  








if($name){


if ($name == 1){

ViewAll();




} elseif ($name == 2) {

 $AddValue = readline("ADD ITEM IN THE FOLLOWING ORDER:\n   Name, Quantity, Price ");

    if($AddValue) {
    $newContent = explode(',', $AddValue);
    $file = fopen($filename,'a');
     fputcsv($file, $newContent);
    fclose($file);
    ViewAll();


 } else {
    echo "you can not add epmty element to file";
 }






} elseif ($name == 3) {
$f = fopen($filename, 'r+');
$found ;

$search = readline("SEARCH FOR AN ITEM BY NAME:");

while (($row = fgetcsv($f)) !== false) {
    if (in_array($search, $row)) {
       $found = $row ;
    }
}

closing($found);
fclose($f);
   # code...





   } elseif ($name == 4) {
   $update =  readline("SEARCH THE NAME OF THE QUANTITY YOU WANT TO UPDATE:");
   $updatedQuantity =  readline("NEW QUANTITY:");
  $f = fopen($filename, 'r+');

   while (($row = fgetcsv($f)) !== false) {
    if (in_array($update, $row)) {
       $row[1] = $updatedQuantity ;
    }
    $allArray []= $row;

}
   fclose($f);
    

 $newOpen = fopen($filename, 'w');
  foreach ($allArray as $content) {
   fputcsv($newOpen, $content);
  }

 fclose($newOpen);

viewALL();




} elseif ($name == 5) {
$nameDelete =  readline("WHAT ITEM DO YOU WANT TO DELETE:");
$newOpen = fopen($filename, 'r+');
openingCSV();
 fclose($newOpen);

$newOpen = fopen($filename, 'w');
  foreach ($allArray as $key => $content) {
  if(in_array($nameDelete,$content)){
      unset($allArray[$key]);
      continue;
   }
   fputcsv($newOpen, $content);
//      # code...
  }
 fclose($newOpen);

ViewAll();




} elseif ($name == 6) {

$total =  readline("DO YOU WANT THE PRICE OF THE TOTAL STOCK OR A PARTICULAR STOCK:\n YES/NO");
if($total == 'YES'){

$particularStock = readline("WHAT IS THE NAME OF THE STOCK YOU ARE REQUESTING FOR:");
$newOpen = fopen($filename, 'r+');

openingCSV($newOpen);
 fclose($newOpen);

  foreach ($allArray as $key => $content) {
  if(in_array($particularStock,$content)){
      $content[4] = $content[1]*$content[2];
       closing($content);
      continue;
   };

  };




  } elseif ($total == 'NO') {

$newOpen = fopen($filename, 'r+');

openingCSV();
fclose($newOpen);

  foreach ($allArray as $key => $content) {
  $content[3] = $content[1] * $content[2];
  closing($content);
      continue;
   };
  };
};
 



   };
   



?>