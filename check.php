<?php
session_start();
if (isset($_POST['login'])) { 
	$login = $_POST['login']; 
		if ($login == '') { 
			unset($login);
		} 
} 
if (isset($_POST['password'])) { 
	$password=$_POST['password']; 
		if ($password =='') { 
			unset($password);
		} 
}
if (isset($_POST['room'])) { 
	$room=$_POST['room']; 
		if ($room =='') { 
			unset($room);
		}
}
    
if(empty($login) or empty($password)) {
	exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}       
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
	$login = trim($login);
	
	$password = stripslashes($password);
    $password = htmlspecialchars($password);
	$password = trim($password);
	$password = md5($password);          
	$password = strrev($password);

    require_once 'db.php';
    $mysqli = db::getObject();

if($login == 'admin') {
	$res = $mysqli->query("SELECT * FROM admin WHERE login='$login'");
	$myrow = $mysqli->assoc($res);
} else {
		$res = $mysqli->query("SELECT * FROM users WHERE login='$login'");
		$myrow = $mysqli->assoc($res);
		}

if (empty($myrow['password'])) {
    exit ("Извините, введённый вами login или пароль неверный.");
} else {
		if ($myrow['password']==$password) {
				header("Location: index.php");
				$_SESSION['login']=$myrow['login'];
				$_SESSION['id']=$myrow['id'];
				$_SESSION['room']=$room;
		} else {
				exit ("Извините, введённый вами login или пароль неверный.");
				}
		}
?>