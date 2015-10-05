<?php
session_start();
require_once 'db.php';
$table = $_SESSION['room'];
$name = $_SESSION['login'];

$mysqli = db::getObject();
$res = $mysqli->query("SELECT * FROM $table");

$data = array();
while ($myrow = $mysqli->assoc($res)) {
	$data[] = $myrow;
}

foreach ($data as $key => $value) {
    if($name == 'admin') {
        $del = "<a href='#' class='delete' rel=" . $value['id'] . ">Delete</a>";
    }
	echo '<div><b>'. $value['name'] .'</b> '. $value['message'] . ' ' . $del . ' </div>' ;
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $.noConflict();
    jQuery(document).ready(function($) {
        $(".delete").click(function(){
            var item = $(this).parent();
            var id = $(this).attr('rel');
            $.post('ajaxDelete.php', {'id' : id}, function(data){
                $(item).hide();
            });
        });
    });
</script>