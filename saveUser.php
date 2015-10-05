<?php
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
    
if (empty($login) or empty($password)) {
    exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
//добавляем проверку на длину логина и пароля
if(strlen($login) < 3 or strlen($login) > 15) {
	exit    ("Логин должен состоять не менее чем из 3 символов и не более чем из    15.");
}
if(strlen($password) < 3 or strlen($password) > 15) {
	exit("Пароль должен состоять не менее чем из 3 символов и не более чем из    15.");
}       

    $login = stripslashes($login);
    $login = htmlspecialchars($login);
	$login = trim($login);
	
	$password = stripslashes($password);
    $password = htmlspecialchars($password);
	$password = trim($password);
	$password = md5($password);//шифруем пароль          
	$password = strrev($password);// для надежности добавим реверс 

 // подключаемся к базе
    require_once 'db.php';
 // проверка на существование пользователя с таким же логином
	$mysqli = db::getObject();
	$res = $mysqli->query("SELECT id FROM users WHERE login='$login'");
	$myrow = $mysqli->assoc($res);
	
if (!empty($myrow['id'])) {
	exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
 // если такого нет, то сохраняем данные
    $result2 = $mysqli->query("INSERT INTO users (login,password) VALUES('$login','$password')");
// Проверяем, есть ли ошибки
if ($result2=='TRUE') {
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
}
else {
    echo "Ошибка! Вы не зарегистрированы.";
	}
?>