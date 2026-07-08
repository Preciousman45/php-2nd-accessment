<?php

require_once 'App/Management/InventoryManagerClass.php';
$filename = './inventory.csv';


use App\Management\InventoryManager;

 $UpdateArray = [];
  

$inventoryManager = new InventoryManager($filename,$UpdateArray);


while(true){

$stockOptions = readline("=== Inventory Manager ===
1. View all items
2. Add item
3. Search item
4. Update quantity
5. Delete item
6. Total stock value
7. Exit
Choose an option:");


switch ($stockOptions) {
	case 1 :
		$inventoryManager->viewAllItems();
		break;
	case 2 :
		$NewStock = readline("ADD ITEM IN THE FOLLOWING ORDER:\n   Name, Quantity, Price ");
      $inventoryManager->addItems($NewStock);
		break;
	case 3 :
		$DesiredItem = readline("SEARCH FOR AN ITEM BY NAME:");
      $inventoryManager->searchItems($DesiredItem);
		break;
	case 4  :
		$StockToUpdate =  readline("SEARCH THE NAME OF THE QUANTITY YOU WANT TO UPDATE:");
      $NewQuantityOfStock =  readline("NEW QUANTITY:");
      $inventoryManager->updateQuantitys($StockToUpdate, $NewQuantityOfStock);
		break;
   case 5 :
		$StockToDelete =  readline("WHAT ITEM DO YOU WANT TO DELETE:");
      $inventoryManager->deleteItems($StockToDelete);
		break;
	case 6 :
		$DesiredStockTotal =  readline("DO YOU WANT THE PRICE OF THE TOTAL STOCK OR A PARTICULAR STOCK:\n YES(DESIRED STOCK)/NO(TOTAL STOCK)");
      $inventoryManager->totalStockValues($DesiredStockTotal);
		break;
	case 7 :
		echo "EXITED";
		exit;
	
};


}





?>