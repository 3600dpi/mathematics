<?php
session_start();
$table = $_SESSION['room'];
$id = $_POST['id'];
require_once 'db.php';
$mysqli = db::getObject();
$mysqli->query("DELETE FROM $table WHERE `id` = '$id'");