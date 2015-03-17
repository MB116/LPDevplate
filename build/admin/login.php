<?php
include_once "../config.php";

if( isset($_POST['login']) && isset($_POST['password']) ){

	$login    = $_POST['login'];
	$password = $_POST['password'];
	$password = md5($password);
	$match    = md5($admin_password);

	if($login === 'admin' && $password === $match){

		$login = $_POST['login'];
		$password = md5($_POST['password']);

		setcookie('error', null, -1);
		setrawcookie('login', $login, time()+3600);
		setrawcookie('password', $password, time()+3600);

	}else{
		setrawcookie('error', true, time()+3600);
		setcookie('login', null, -1);
		setcookie('password', null, -1);
	}

}else{
	setrawcookie('error', true, time()+3600);
	setcookie('login', null, -1);
	setcookie('password', null, -1);
}
header('Location: index.php');
exit;
?>
