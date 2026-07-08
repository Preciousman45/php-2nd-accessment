<?php 

namespace App;

require_once 'inventoryFunctions.php'; 





class InventoryManager {
	public $filename;
	public $UpdateArray;

	public function __construct($filename) {
		$this->filename = $filename;
		$this->UpdateArray = [];
	}

	public function viewAllItems() {
		ViewALL($this->filename);
	}

	public function addItem($NewStock) {
		AddItem($this->filename, $NewStock, $this->UpdateArray);
	}

	public function searchItem($DesiredItem) {
		SearchItem($this->filename, $DesiredItem);
	}

	public function updateQuantity($StockToUpdate, $NewQuantityOfStock) {
		UpdateQuantity($this->filename, $this->UpdateArray, $StockToUpdate, $NewQuantityOfStock);
	}

	public function deleteItem($StockToDelete) {
		DeleteItem($this->filename, $this->UpdateArray, $StockToDelete);
	}

	public function totalStockValue($DesiredStockTotal) {
		TotalStock($this->filename, $this->UpdateArray, $DesiredStockTotal);
	}
}








?>