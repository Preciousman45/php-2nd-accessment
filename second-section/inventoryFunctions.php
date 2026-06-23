<?php

function initial(){
   
print_r("+----+------------------+----------+--------+
| ID | Name             | Quantity | Price  |
+----+------------------+----------+--------+");

};





function footer(){
   print_r("+----+------------------+----------+--------+");
};










function openingCSV ($file){
   global $UpdateArray;
   while (($fileContent = fgetcsv($file)) !== false) {
   $UpdateArray []= $fileContent;
};
};


function closing($value){
   initial();
echo "\n";
echo implode(" | ", $value) . "\n";

footer();
};



function ViewALL (){
   global $filename;
   $file = fopen($filename, 'r');
// 
            initial();
            while(( $fileContent = fgetcsv($file))!== false){
              echo implode(" | ", $fileContent) . "\n";  
            };

            print_r ($fileContent) ;
            footer();

        fclose($file);
};



function AddItem(){
   global $filename;
   $NewStock = readline("ADD ITEM IN THE FOLLOWING ORDER:\n   Name, Quantity, Price ");

    if($NewStock) {
    $NewStockArray = explode(',', $NewStock);
    $file = fopen($filename,'a');
     fputcsv($file, $NewStockArray);
    fclose($file);
    option1();
}

}






function SearchItem(){
   global $filename ;
$file = fopen($filename, 'r+');
$found ;

$DesiredItem = readline("SEARCH FOR AN ITEM BY NAME:");

while (($fileContent = fgetcsv($file)) !== false) {
    if (in_array($DesiredItem, $fileContent)) {
       $foundItem = $fileContent ;
    }
}

closing($foundItem);
fclose($file);
}









function UpdateQuantity(){

global $filename;
global $UpdateArray;
   $StockToUpdate =  readline("SEARCH THE NAME OF THE QUANTITY YOU WANT TO UPDATE:");
   $NewQuantityOfStock =  readline("NEW QUANTITY:");
  $file = fopen($filename, 'r+');

   while (($fileContent = fgetcsv($file)) !== false) {
    if (in_array($StockToUpdate, $fileContent)) {
       $fileContent[1] = $NewQuantityOfStock ;
    }
    $UpdateArray []= $fileContent;

}
   fclose($file);
    

 $NewFile = fopen($filename, 'w');
  foreach ($UpdateArray as $content) {
   fputcsv($NewFile, $content);
  }

 fclose($NewFile);

option1();

}






function DeleteItem(){

global $filename;
global $UpdateArray;
   $StockToDelete =  readline("WHAT ITEM DO YOU WANT TO DELETE:");
$file = fopen($filename, 'r+');
openingCSV($file);
fclose($file);

$NewFile = fopen($filename, 'w');
  foreach ($UpdateArray as $key => $content) {
  if(in_array($StockToDelete,$content)){
      unset($$UpdateArray[$key]);
      continue;
   }
   fputcsv($NewFile, $content);
//      # code...
  }
 fclose($NewFile);

option1();

}






function TotalStock(){
  global $filename;
  global $UpdateArray;
   $DesiredStockTotal =  readline("DO YOU WANT THE PRICE OF THE TOTAL STOCK OR A PARTICULAR STOCK:\n YES(DESIRED STOCK)/NO(TOTAL STOCK)");
if($DesiredStockTotal == 'YES'){

$DesiredStock = readline("WHAT IS THE NAME OF THE STOCK YOU ARE REQUESTING FOR:");
$file = fopen($filename, 'r+');

openingCSV($file);
 fclose($file);

  foreach ($UpdateArray as $key => $content) {
  if(in_array($DesiredStock,$content)){
      $content[3] = $content[1]*$content[2];
       closing($content);
      continue;
   };

  };

  } elseif ($DesiredStockTotal == 'NO') {

$file = fopen($filename, 'r+');

openingCSV($file);
fclose($file);

  foreach ($UpdateArray as $key => $content) {
  $content[3] = $content[1] * $content[2];
  closing($content);
      continue;
   };
  };

}


?>