<?php

namespace App\Inventory;



class InventoryClass {

public  $filename;
public $UpdateArray;


public function __construct($filename,$UpdateArray = []) {
   
    $this->filename = $filename;
    $this->UpdateArray = $UpdateArray;
}

public function headerOfDisplay(){
   
print_r("\n+----+------------------+----------+--------+
| ID | Name             | Quantity | Price  |
+----+------------------+----------+--------+\n");

}

  public function footerOfDisplay(){
  echo "+----+------------------+----------+--------+";

}


public function openingCSV (string $mode){
    
   $this->UpdateArray=[];
   $file = fopen($this->filename, $mode);
   while (($fileContent = fgetcsv($file)) !== false) {
   $this->UpdateArray []= $fileContent;
}
fclose($file); 
}
  


public function closing($value){
  $this->headerOfDisplay();
echo "\n";
echo implode(" | ", $value) . "\n";

$this->footerOfDisplay();
}



public function findItem( $SearchItem) {
    foreach ($this->UpdateArray as $index => $content) {
        if (in_array($SearchItem, $content)) {
            return ['index' => $index, 'content' => $content];
        }
    }
    return null;
}




public function ViewALL() {
    $file = fopen($this->filename, 'r');
    
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



public function AddItem($NewStock){
  $this->UpdateArray = [];
  if($NewStock) {
      $this->openingCSV ('r');
    $lastindex = count($this->UpdateArray) - 1;
    $NewStockArray = explode(',', $NewStock);
    $NewID = $lastindex + 1 ;
    array_unshift($NewStockArray, $NewID);
    $file = fopen($this->filename,'a');
    fputcsv($file, $NewStockArray);
    fclose($file);
   $this->ViewALL();
}

}


public function SearchItem($DesiredItem){
$file = fopen($this->filename, 'r+');
$foundItem = [] ;
while (($fileContent = fgetcsv($file)) !== false) {
    if (in_array($DesiredItem, $fileContent)) {
       $foundItem = $fileContent ;
    }
}
$this->closing($foundItem);
fclose($file);
}


public function UpdateQuantity($StockToUpdate,$NewQuantityOfStock ){ //price...wednesday
  $file = fopen($this->filename, 'r');
   while (($fileContent = fgetcsv($file)) !== false) {
    if (in_array($StockToUpdate, $fileContent)) {
       $fileContent[2] = $NewQuantityOfStock ;
    }
    $this->UpdateArray []= $fileContent;
}
   fclose($file);
 $NewFile = fopen($this->filename, 'w');
  foreach ($this->UpdateArray as $content) {
   fputcsv($NewFile, $content);
  }
 fclose($NewFile);
$this->ViewALL();

}


public function DeleteItem($StockToDelete){
$this->UpdateArray = []; 
$this->openingCSV('r');
$NewFile = fopen($this->filename, 'w');
$result = $this->findItem( $StockToDelete);
unset($this->UpdateArray[$result['index']]);
foreach ($this->UpdateArray as $content) {
    fputcsv($NewFile, $content);
}
fclose($NewFile);
$this->ViewALL();

}


public function TotalStock($DesiredStockTotal){
if($DesiredStockTotal == 'YES'){ //
$DesiredStock = readline("WHAT IS THE NAME OF THE STOCK YOU ARE REQUESTING FOR:");
$this->openingCSV('r');
$result = $this->findItem($DesiredStock);
$result['content'][4]= $result['content'][2] * $result['content'][3];
$this->closing($result['content']);

  } elseif ($DesiredStockTotal == 'NO') {
$this->openingCSV('r+');
  foreach ($this->UpdateArray as $key => $content) {
  $content[4] = $content[2] * $content[3];
 $this->closing($content);
      continue;
   };
  };

}


}
 

?>