<?php
	session_start();

	if(!isset($_SESSION['cust_email'])){
		include('customer/customer_login.php');
	}
	else{
		include('payment.php');
	}
?>