<?php
if (isset($_POST['rusName'])) { 
	$rusName = $_POST['rusName']; 
		if ($rusName == '') { 
			unset($rusName);
		} 
} 

if (isset($_POST['enName'])) { 
	$enName=$_POST['enName']; 
	if ($enName =='') { 
		unset($enName);
	} 
}
    
if (empty($rusName) or empty($enName)) {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}

if(strlen($rusName) < 6 or strlen($rusName) > 30) {
	exit("Заголовок должен содержать от 3 до 15 букв");
}
if(strlen($enName) < 3 or strlen($enName) > 15) {
	exit("Заголовок должен содержать от 3 до 15 букв");
}  	
	require_once 'db.php';
	$mysqli = db::getObject();
	$room = $mysqli->query("SELECT id FROM room WHERE enName='$enName'");
	$myrow = $mysqli->assoc($room);

if(preg_match("/[А-Яа-яЁё]/", $rusName) && preg_match("/[A-Za-z]/", $enName)) {
	if(empty($myrow['id'])) {
		$mysqli->query("INSERT INTO room (enName,rusName) VALUES('$enName','$rusName')");
		$mysqli->query("
						CREATE TABLE $enName(
						id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
						message VARCHAR(255),
						name VARCHAR(255)
						)
						");
		header("Location: index.php");
	} else {
		echo 'не пашет';
			}
} else {
	exit ("Несоответсвие требованиям. Проверте названия комнат!");
		}
?>
