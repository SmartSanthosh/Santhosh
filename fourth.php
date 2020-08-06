<?php include('sever fourth.php');

//fetch the record to the update

  if(isset($_GET['edit'])){
  	$customer_id=$_GET['edit'];
  	$edit_state=true;

  	$rec=mysqli_query($db,"SELECT * FROM   customer  WHERE customer_id =$customer_id ");
  	$record=mysqli_fetch_array($rec);
  	$customer_name=$record['customer_name'];
  	$customer_mobile=$record['customer_mobile'];
  	$customer_email=$record['customer_email'];
  	$customer_dob=$record['customer_dob'];
  	$customer_id=$record['customer_id'];
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>customer</title>
		<link rel="stylesheet" type="text/css" href="style3.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
<body>
     <div class="san1">
		<h1 ><b>BRAHMA STORE</b></h1>
		<ul>
			<li class="active"><a href="second.php"></i>Home</a></li>
			<li class="active"><a href="first.php"></i>Store</a></li>
			<li class="active"><a href="fourth.php"></i>Customer</a></li>
		     <li><a href="five.php"></i>Bill Detail</a></li>
		</ul>
	</div>

	<div class="san2">
			<h2 >Customer Detail</h2>
		</div>

	    <form method="post" action="sever fourth.php">

	       <input type="hidden" name="customer_id"value="<?php echo $customer_id; ?>">	
	    	<div class="input-group">
	    		<label>Customer Name</label>
	    		<input type="text" name="customer_name"value="<?php echo $customer_name;?>">
	    	</div>

	    	<div class="input-group">
	    		<label>Customer Mobil</label>
	    		<input type="text" name="customer_mobile"value="<?php echo $customer_mobile; ?>">
	    	</div>

	    	<div class="input-group">
	    		<label>Customer Email</label>
	    		<input type="email" name="customer_email"value="<?php echo $customer_email;?>">
	    	</div>

	    	<div class="input-group">
	    		<label>Customer Dob</label>
	    		<input type="date"name="customer_dob" value="<?php echo $customer_dob;?>">
	    	</div>
	       
	        
			<div class="input-group">

		   	<?php if($edit_state==false): ?>
		   		 	<button type="submit" name="save"class="btn">Save</button>
		   	<?php else: ?>
		   		 	<button type="submit" name="update"class="btn">Update</button>
		   	<?php endif ?>	
		   </div>
		</form>
		<table>
			<thead>
				<tr class="s">
					<th>Customer Name</th>
					<th>Customer Mobile</th>
					<th>Customer Email</th>
					<th>Customer Dob</th>
					<th colspan="2">   Actions</th>
				</tr>
			</thead>
			<tbody>
	                                                                              
			<?php while ($row=mysqli_fetch_array($results)) { ?>
			<tr>
				<td><?php echo $row['customer_name'];?></td>
				<td><?php echo $row['customer_mobile'];?></td>
				<td><?php echo $row['customer_email'];?></td>
				<td><?php echo $row['customer_dob'];?></td>
				<td>
					<a class="edit_btn" href="fourth.php?edit=<?php echo $row['customer_id'];?>">Edit</a>
				</td>
				<td>
					<a class="del_btn" href="sever fourth.php?del=<?php echo $row['customer_id'];?>">Delete</a>
				</td>
			</tr>
		<?php  } ?>
			</tbody>
		</table>

	</body>
</html>