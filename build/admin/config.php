<?php
// Main vars
	$address1 = "klienty.kz@gmail.com";
	$address2 = "";
	//$address3 = "dev4@prodengi.kz";
	// $address4 = "dev4@prodengi.kz";
	// $address5 = "dev4@prodengi.kz";

	$is_smtp = true;
	$from_server = "cp17.skilltex.kz";
	$pass = "click2015";

	$success_url = '../thanks.php';


	$site = str_replace('www.', '', $_SERVER['HTTP_HOST']);
	$mailfrom = "info@".$site;
?>
