<html>  
    <head>  
        <title>CUSTOMER</title>  
		<link rel="stylesheet" href="jquery-ui.css">
        <link rel="stylesheet" href="bootstrap.min.css" />
		<script src="jquery.min.js"></script>  
		<script src="jquery-ui.js"></script>
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
			padding: 20px;
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
		body{
			background-color:DarkGrey;
		}
		h1{
			color:Gold;
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
			
			<h3 align="center">CUSTOMER</a></h3><br />
			<br />
			<div class="table-responsive" id="user_data">
				
			</div>
			<br />
		</div>
		
		<div id="user_dialog" title="Add Data">
			<form method="post" id="user_form">
				<div class="form-group">
					<label>Enter Customer Name</label>
					<input type="text" name="customer_name" id="customer_name" class="form-control" />
					<span id="error_customer_name" class="text-danger"></span>
				</div>
				<div class="form-group">	
					<label>Enter Customer Mobile</label>
					<input type="text" name="customer_mobile" id="customer_mobile" class="form-control" />
					<span id="error_customer_mobile" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Customer Email</label>
					<input type="text" name="customer_email" id="customer_email" class="form-control" />
					<span id="error_customer_email" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Customer Dob</label>
					<input type="Date" name="customer_dob" id="customer_dob" class="form-control" />
					<span id="error_customer_dob" class="text-danger"></span>
				</div>
				<div class="form-group">
					<input type="hidden" name="action" id="action" value="insert" />
					<input type="hidden" name="hidden_id" id="hidden_id" />
					<input type="submit" name="form_action" id="form_action" class="btn btn-info" value="Insert" />
				</div>
			</form>
		</div>
		
		<div id="action_alert" title="Action">
			
		</div>
		
		<div id="delete_confirmation" title="Confirmation">
		<p>Are you sure you want to Delete this data?</p>
		</div>
		
    </body>  
</html>  




<script>  
$(document).ready(function(){  

	load_data();
    
	function load_data()
	{
		$.ajax({
			url:"fetchcustomer.php",
			method:"POST",
			success:function(data)
			{
				$('#user_data').html(data);
			}
		});
	}
	
	$("#user_dialog").dialog({
		autoOpen:false,
		width:400
	});
	
	$('#add').click(function(){
		$('#user_dialog').attr('title', 'Add Data');
		$('#action').val('insert');
		$('#form_action').val('Insert');
		$('#user_form')[0].reset();
		$('#form_action').attr('disabled', false);
		$("#user_dialog").dialog('open');
	});
	
	$('#user_form').on('submit', function(event){
		event.preventDefault();
		var error_customer_name = '';
		var error_customer_mobile = '';
		var error_customer_email='';
		var error_customer_id='';
		if($('#customer_name').val() == '')
		{
			error_customer_name = 'Customer Name is required';
			$('#error_customer_name').text(error_customer_name);
			$('#customer_name').css('border-color', '#cc0000');
		}
		else
		{
			error_customer_name = '';
			$('#error_customer_name').text(error_customer_name);
			$('#customer_name').css('border-color', '');
		}
		if($('#customer_mobile').val() == '')
		{
			error_customer_mobile = 'Customer Mobile is required';
			$('#error_customer_mobile').text(error_customer_mobile);
			$('#customer_mobile').css('border-color', '#cc0000');
		}
		else
		{
			error_customer_mobile = '';
			$('#error_customer_mobile').text(error_customer_mobile);
			$('#customer_mobile').css('border-color', '');
		}
		if($('#customer_email').val() == '')
		{
			error_customer_email = 'Customer Email is required';
			$('#error_customer_email').text(error_customer_email);
			$('#customer_email').css('border-color', '#cc0000');
		}
		else
		{
			error_customer_email = '';
			$('#error_customer_email').text(error_customer_email);
			$('#customer_email').css('border-color', '');
		}
		if($('#customer_dob').val() == '')
		{
			error_customer_dob = 'Customer DOB is required';
			$('#error_customer_dob').text(error_customer_dob);
			$('#customer_dob').css('border-color', '#cc0000');
		}
		else
		{
			error_customer_dob = '';
			$('#error_customer_dob').text(error_customer_dob);
			$('#customer_dob').css('border-color', '');
		}
		
		if(error_customer_name != '' || error_customer_mobile != '' || error_customer_email != ''|| error_customer_dob != '')
		{
			return false;
		}
		else
		{
			$('#form_action').attr('disabled', 'disabled');
			var form_data = $(this).serialize();
			$.ajax({
				url:"actioncustomer.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					$('#user_dialog').dialog('close');
					$('#action_alert').html(data);
					$('#action_alert').dialog('open');
					load_data();
					$('#form_action').attr('disabled', false);
				}
			});
		}
		
	});
	
	$('#action_alert').dialog({
		autoOpen:false
	});
	
	$(document).on('click', '.edit', function(){
		var id = $(this).attr('id');
		var action = 'fetch_single';
		$.ajax({
			url:"actioncustomer.php",
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#customer_name').val(data.customer_name);
				$('#customer_mobile').val(data.customer_mobile);
				$('#customer_email').val(data.customer_email);
				$('#customer_dob').val(data.customer_dob);
				$('#user_dialog').attr('title', 'Edit Data');
				$('#action').val('update');
				$('#hidden_id').val(id);
				$('#form_action').val('Update');
				$('#user_dialog').dialog('open');
			}
		});
	});
	
	$('#delete_confirmation').dialog({
		autoOpen:false,
		modal: true,
		buttons:{
			Ok : function(){
				var id = $(this).data('id');
				var action = 'delete';
				$.ajax({
					url:"actioncustomer.php",
					method:"POST",
					data:{id:id, action:action},
					success:function(data)
					{
						$('#delete_confirmation').dialog('close');
						$('#action_alert').html(data);
						$('#action_alert').dialog('open');
						load_data();
					}
				});
			},
			Cancel : function(){
				$(this).dialog('close');
			}
		}	
	});
	
	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		$('#delete_confirmation').data('id', id).dialog('open');
	});
	
});  
</script>