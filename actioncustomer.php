<?php

//action.php

include('database_connection.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == "insert")
	{
		$query = "
		INSERT INTO customer (customer_name, customer_mobile,customer_email,customer_dob) VALUES ('".$_POST["customer_name"]."', '".$_POST["customer_mobile"]."','".$_POST["customer_email"]."', '".$_POST["customer_dob"]."')";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Inserted...</p>';
	}
	if($_POST["action"] == "fetch_single")
	{
		$query = "
		SELECT * FROM customer WHERE customer_id  = '".$_POST["id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['customer_name'] = $row['customer_name'];
			$output['customer_mobile'] = $row['customer_mobile'];
			$output['customer_email'] = $row['customer_email'];
			$output['customer_dob'] = $row['customer_dob'];
		}
		echo json_encode($output);
	}
	if($_POST["action"] == "update")
	{
		$query = "
		UPDATE customer 
		SET customer_name = '".$_POST["customer_name"]."' ,
		customer_mobile = '".$_POST["customer_mobile"]."' ,
		customer_email = '".$_POST["customer_email"]."', 
		customer_dob = '".$_POST["customer_dob"]."' 
		WHERE customer_id  = '".$_POST["hidden_id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Updated</p>';
	}
	if($_POST["action"] == "delete")
	{
		$query = "DELETE FROM customer WHERE customer_id = '".$_POST["id"]."'";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Deleted</p>';
	}
}

?>