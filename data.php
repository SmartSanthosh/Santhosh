<?php 
	require 'DbConnect.php';

    
	function loadStores() {
		$db = new DbConnect;
		$conn = $db->connect();
		$stmt = $conn->prepare("SELECT * FROM store");
		$stmt->execute();
		$stores = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $stores;
	}
	//function loadCustomers() {
	//	$db = new DbConnect;
	//	$conn = $db->connect();

	//	$stmt = $conn->prepare("SELECT * FROM customer");
	//	$stmt->execute();
	//	$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
	//	return $customers;
	//}



 ?>