<?php

     //initialize variables

     $store_name="";
     $store_address="";
     $store_id=0;
     $edit_state=false;
    //connect to database
   
     $db=mysqli_connect('localhost','root','','brahmastore');

     //if save button is click
     if  (isset($_POST['save'])){
     	$store_name=$_POST['store_name'];
     	$store_address=$_POST['store_address'];
     	echo "$store_name";
     	echo "$store_address";
     	$query="INSERT INTO store(store_name,store_address) VALUES('$store_name','$store_address')";
     	mysqli_query($db,$query);
     	header('location: first.php');  //redirect to index page after inserting

     }

      //update record
     if (isset($_POST['update'])){

     		$store_name=mysqli_real_escape_string($db,$_POST['store_name']);
     		$store_address=mysqli_real_escape_string($db,$_POST['store_address']);
     		$store_id=mysqli_real_escape_string($db,$_POST['store_id']);
     		mysqli_query($db,"UPDATE store SET store_name='$store_name',store_address='$store_address' WHERE store_id=$store_id");
               header('location: first.php');


     		}
     //delete records
               if(isset($_GET['del'])){
                    $store_id=$_GET['del'];
                    mysqli_query($db,"DELETE FROM  store WHERE store_id=$store_id");
                    header('location:first.php');

               }

     //retrive result
     $results=mysqli_query($db,"SELECT * FROM   store");
?>
