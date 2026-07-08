<?php 

namespace App\Management;

require_once 'App/Inventory/inventory.php'; 


use App\Inventory\InventoryClass;


class InventoryManager extends InventoryClass {
	

	public function __construct($filename,$UpdateArray = []) {
		parent::__construct($filename, $UpdateArray);
	}

	public function viewAllItems() {
		$this->ViewALL();
	}

	public function addItems( $NewStock) {
		$this->AddItem($NewStock);
	}

	public function searchItems($DesiredItem) {
		$this->SearchItem( $DesiredItem);
	}

	public function updateQuantitys($StockToUpdate, $NewQuantityOfStock) {
		$this->UpdateQuantity($StockToUpdate, $NewQuantityOfStock);
	}

	public function deleteItems( $StockToDelete) {
		$this->DeleteItem($StockToDelete);
	}

	public function totalStockValues($DesiredStockTotal) {
		$this->TotalStock( $DesiredStockTotal);
	}
}








?>