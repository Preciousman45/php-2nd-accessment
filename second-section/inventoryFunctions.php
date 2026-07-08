<?php

 function headerOfDisplay(){
   
print_r("\n+----+------------------+----------+--------+
| ID | Name             | Quantity | Price  |
+----+------------------+----------+--------+\n");

}

 function footerOfDisplay(){
  echo "+----+------------------+----------+--------+";

}


 function openingCSV ($filename,&$UpdateArray, string $mode){
   $file = fopen($filename, $mode);
   while (($fileContent = fgetcsv($file)) !== false) {
   $UpdateArray []= $fileContent;
}
fclose($file); 
}

 function closing($value){
  headerOfDisplay();
echo "\n";
echo implode(" | ", $value) . "\n";

footerOfDisplay();
}


function findItem(&$UpdateArray, $SearchItem) {
    foreach ($UpdateArray as $index => $content) {
        if (in_array($SearchItem, $content)) {
            return ['index' => $index, 'content' => $content];
        }
    }
    return null;
}




function ViewALL($filename) {
    $file = fopen($filename, 'r');
    
    // column widths
    $w = [4, 18, 10, 8];
    
    $border = "+----+------------------+----------+--------+";
    $header = "| " . str_pad("ID", $w[0]) . "| " . str_pad("Name", $w[1]) . "| " . str_pad("Quantity", $w[2]) . "| " . str_pad("Price", $w[3]) . "|";
    
    echo $border . "\n";
    echo $header . "\n";
    echo $border . "\n";
    
    while (($row = fgetcsv($file)) !== false) {
        echo "| " . str_pad($row[0], $w[0]) . "| " . str_pad($row[1], $w[1]) . "| " . str_pad($row[2], $w[2]) . "| " . str_pad($row[3], $w[3]) . "|\n";
    }
    
    echo $border . "\n";
    fclose($file);
}



 function AddItem($filename,$NewStock,$UpdateArray){

    
    if($NewStock) {
      openingCSV ($filename,$UpdateArray,'r');
    $lastindex = count($UpdateArray) - 1;
    $NewStockArray = explode(',', $NewStock);
    $NewID = $lastindex + 1 ;
    array_unshift($NewStockArray, $NewID);
    $file = fopen($filename,'a');
    fputcsv($file, $NewStockArray);
    fclose($file);
   ViewALL($filename);
}

}


 function SearchItem($filename,$DesiredItem){
$file = fopen($filename, 'r+');
$foundItem = [] ;
while (($fileContent = fgetcsv($file)) !== false) {
    if (in_array($DesiredItem, $fileContent)) {
       $foundItem = $fileContent ;
    }
}
closing($foundItem);
fclose($file);
}


 function UpdateQuantity($filename,&$UpdateArray,$StockToUpdate,$NewQuantityOfStock ){
  $file = fopen($filename, 'r');
   while (($fileContent = fgetcsv($file)) !== false) {
    if (in_array($StockToUpdate, $fileContent)) {
       $fileContent[2] = $NewQuantityOfStock ;
    }
    $UpdateArray []= $fileContent;
}
   fclose($file);
 $NewFile = fopen($filename, 'w');
  foreach ($UpdateArray as $content) {
   fputcsv($NewFile, $content);
  }
 fclose($NewFile);
ViewALL($filename);

}


function DeleteItem($filename,$UpdateArray, $StockToDelete){
$UpdateArray = []; 
openingCSV($filename,$UpdateArray,'r');
$NewFile = fopen($filename, 'w');
$result = findItem($UpdateArray, $StockToDelete);
unset($UpdateArray[$result['index']]);
foreach ($UpdateArray as $content) {
    fputcsv($NewFile, $content);
}
fclose($NewFile);
ViewALL($filename);

}


function TotalStock($filename,$UpdateArray,$DesiredStockTotal){
if($DesiredStockTotal == 'YES'){
$DesiredStock = readline("WHAT IS THE NAME OF THE STOCK YOU ARE REQUESTING FOR:");
openingCSV($filename,$UpdateArray,'r');
$result = findItem($UpdateArray,$DesiredStock);
$result['content'][4]= $result['content'][2] * $result['content'][3];
closing($result['content']);

  } elseif ($DesiredStockTotal == 'NO') {
openingCSV($filename,$UpdateArray,'r+');
  foreach ($UpdateArray as $key => $content) {
  $content[4] = $content[2] * $content[3];
 closing($content);
      continue;
   };
  };

}



?>