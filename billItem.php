<?php	

$conn = mysqli_connect("localhost", "root", "", "brahmastore");

	if (isset($_POST["addInvoice"]))
	{
		$bill_number = $_POST["bill_number"];
		$bill_datetime = $_POST["bill_datetime"];
		$customer_name = $_POST["customer_name"];
		$customer_mobile = $_POST["customer_mobile"];
		$customer_email = $_POST["customer_email"];
		$customer_dob = $_POST["customer_dob"];
		if($bill_number == ''){		
			$message = "Please provide Bill Number";	
			echo "<script type='text/javascript'>alert('$message');</script>";
		} 	
		else if($_POST["bill_datetime"] == ''){
			$message = "Please Enter the Bill Datetime";	
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else if($_POST["customer_name"] == ''){
			$message = "Please Enter the Customer Name";	
			echo "<script type='text/javascript'>alert('$message');</script>";
		}	
		else if($_POST["customer_mobile"] == ''){
			$message = "Please Enter the Customer Mobile";	
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else if($_POST["customer_email"] == ''){
			$message = "Please Enter the Customer Email";	
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else if($_POST["customer_dob"] == ''){
			$message = "Please Enter the Customer Dob";	
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else if($_POST["stores"] == ''){
			$message = "Please select ateast one store";	
			echo "<script type='text/javascript'>alert('$message');</script>";
		}

		else {
		$store_id = $_POST["stores"];
	
		$query = "
		INSERT INTO customer (customer_name, customer_mobile,customer_email,customer_dob) VALUES ('".$_POST["customer_name"]."', '".$_POST["customer_mobile"]."','".$_POST["customer_email"]."', '".$_POST["customer_dob"]."')";
		mysqli_query($conn, $query);
		$customer_id= mysqli_insert_id($conn);

		$sql= "INSERT INTO bill (bill_number,bill_datetime,customer_id,store_id) VALUES ('$bill_number','$bill_datetime','$customer_id','$store_id')";
		mysqli_query($conn,$sql);
		$bill_id= mysqli_insert_id($conn);

		for ($a = 0; $a < count($_POST["bill_item_product_name"]); $a++)
		{
			$sql = "INSERT INTO bill_item (bill_id,bill_item_product_name,bill_item_price,bill_item_quantity,bill_item_amount) VALUES ('$bill_id', '" . $_POST["bill_item_product_name"][$a] . "', '" . $_POST["bill_item_price"][$a] . "', '" . $_POST["bill_item_quantity"][$a] . "', '" . $_POST["bill_item_amount"][$a] . "')";
			mysqli_query($conn, $sql);
		}

		echo "<p>Invoice has been added.</p>";
	}
}
?>
<html>
<head>
	<title>Bill Details</title>
		<link rel="stylesheet" href="jquery-ui.css">
		<script src="jquery.min.js"></script>  
		<script src="jquery-ui.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
</head>

<style>
			
		.san1
		{
			background-color: DarkBlue;
			text-align:center;
		}
		.san1 ul
		{
			display: inline-flex;
			list-style: none;
			color:white;
			text-align: right;
		}
		.san1 ul li
		{
			width: 120px;
			margin: 10px;
			padding: 10px;
		}
		.san1 ul li a
		{
			text-decoration:none;
			color:#fff;
		}
		.san1 ul li:hover{
			background-color:  black;
			border-radius: 3px;
		}
		.san1 .fa{
			margin-right: 8px;
		}
		.form-group label{
			width:115px;
			display:inline-block;
	        padding:6px;
		}
		button{
			background-color:Green;
		}
		body{
			background-color:DarkGrey;
		}
		h1{
			color:Gold;
		}
		span{
			color:Red;
		}
		<p>{
			color:Green;
		}

	
	</style> 
    <body>      
	<div class="san1">
		<h1 ><b>BRAHMA STORE</b></h1>
		<ul>
			<li class="active"><a href="second.php"></i>Home</a></li>
			<li class="active"><a href="store.php"></i>Store</a></li>
			<li class="active"><a href="customer.php"></i>Customer</a></li>
		     <li><a href="billItem.php"></i>Bill Detail</a></li>
			 <li><a href="logout.php"></i>
Logout</a></li>
		</ul>
	</div> 
        <div class="container">
			<br />
			
			<h3 align="center">BILL  DETAIL</a></h3><br />
			<br />
<body>	
<form method="POST" action="billItem.php" id="user_form">
            <div class="form-group">
				<div class="col-sm-4">
				<label for="StoreNameType"style="width: 115px" store_id="preinput">StoreName : </label>
					<select class="form-control" id="stores" name="stores">
						<option selected="" disabled="">Select Store</option>
						<?php 
							require 'data.php';
							$stores = loadStores();
							foreach ($stores as $store) {
								echo "<option id='".$store['store_id']."' value='".$store['store_id']."'>".$store['store_name']."</option>";
							}
							?>
					</select>
					<span id="error_stores" class="text-danger"></span>
				</div>

            </div>
	<div class="form-group">
		<label>Bill Number :</label>
		<input type="text" name="bill_number" id="bill_number">
		<span id="error_bill_number" class="text-danger"></span>
		<label>Bill Date :</label>
		<input type="datetime-local" name="bill_datetime" id="bill_datetime">
		<span id="error_bill_datetime" class="text-danger"></span>
	</div>
	<div class="form-group">
		<label>Customer Name</label>
		<input type="text" name="customer_name" id="customer_name" class="form-control" />
		<span id="error_customer_name" class="text-danger"></span>	
		<label>Customer Mobile</label>
		<input type="text" name="customer_mobile" id="customer_mobile" class="form-control" />
		<span id="error_customer_mobile" class="text-danger"></span>
	</div>
	<div class="form-group">
		<label>Customer Email</label>
		<input type="text" name="customer_email" id="customer_email" class="form-control" />
		<span id="error_customer_email" class="text-danger"></span>
		<label>Customer Dob</label>
		<input type="Date" name="customer_dob" id="customer_dob" class="form-control" />
	</div>

	<table>
		<tr>
			<th>S.No</th>
			<th>Item Name</th>
			<th>Item Price</th>
			<th>Item Quantity</th>
			<th>Item Amount</th>
		</tr>

		<tbody id="tbody"></tbody>
	</table>

	<p>
		<button type="button" onclick="addItem();">Add Item</button>
		<span id="error_add_item" class="text-danger"></span>
	</p>
<p>
	<input type="submit" name="addInvoice"  value="Add Invoice">
	</p>
</form>
</body>
</html>

<style type="text/css">
	table {
		width: 75%;
		border-collapse: collapse;
	}
	table tr td,
	table tr th {
		border: 1px solid black;
		padding: 10px;
	}
	p input{
		background-color:LightGreen;
	}
</style>
<script>
	var items = 0;
	function addItem() {
		items++;

		var html = "<tr>";
			html += "<td>" + items + "</td>";
			html += "<td><input type='text' name='bill_item_product_name[]'></td>";
			html += "<td><input type='text' name='bill_item_price[]'></td>";
			html += "<td><input type='number' name='bill_item_quantity[]'></td>";
			html += "<td><input type='text' name='bill_item_amount[]'></td>";
		html += "</tr>";

		var row = document.getElementById("tbody").insertRow();
		row.innerHTML = html;
	}
</script>