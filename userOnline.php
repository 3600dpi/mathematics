<?php
session_start();
$id_session = session_id(); //уникальный id сессии
$name = $_SESSION['login'];

require_once 'db.php';
$mysqli = db::getObject();

$userOnline = $mysqli->query("SELECT * FROM online WHERE id_session='$id_session'");
$Online = $mysqli->assoc($userOnline);

//если пользователь есть обновляем последнее время его посещения
if(isset($Online['id_session'])) {
    $mysqli->query("UPDATE online SET putda=NOW(), user='$name' WHERE id_session='$id_session'");
} else {
    $mysqli->query("INSERT INTO online(putda, user, id_session) VALUES( NOW(), '$name', '$id_session')");
}
$res = $mysqli->query("SELECT * FROM online");

$data = array();
while ($myrow = $mysqli->assoc($res))
{
    $data[] = $myrow;
}
foreach ($data as $key => $value) {
    echo '<div>'. $value['user'] . ' </div>';
}