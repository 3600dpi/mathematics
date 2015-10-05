<?php
session_start();
$name = $_SESSION['login'];

require_once 'db.php';
$mysqli = db::getObject();

$mysqli->query("DELETE FROM online WHERE user='$name'");