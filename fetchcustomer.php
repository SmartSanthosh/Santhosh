<?php

//fetch.php

include("database_connection.php");

$query = "SELECT * FROM customer";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '
<table class="table table-striped table-bordered">
	<tr>
		<th>Customer Name</th>
		<th>Customer Mobile</th>
		<th>Customer Email</th>
		<th>Customer Dob</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
';
if($total_row > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td width="40%">'.$row["customer_name"].'</td>
			<td width="40%">'.$row["customer_mobile"].'</td>
			<td width="40%">'.$row["customer_email"].'</td>
			<td width="40%">'.$row["customer_dob"].'</td>
			<td width="10%">
				<button type="button" name="edit" class="btn btn-primary btn-xs edit" id="'.$row["customer_id"].'">Edit</button>
			</td>
			<td width="10%">
				<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["customer_id"].'">Delete</button>
			</td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="4" align="center">Data not found</td>
	</tr>
	';
}
$output .= '</table>';
echo $output;
?>