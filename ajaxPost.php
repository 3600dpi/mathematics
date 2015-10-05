<?php
session_start();
require_once 'db.php';
$mysqli = db::getObject();
$name = $_SESSION['login'];
$table = $_SESSION['room'];
$message = $_POST['messages'];
$res = $mysqli->query("INSERT INTO $table(message,name) VALUES('$message', '$name')");
echo '<b>' . $name . '</b> ' . $message . $del;
