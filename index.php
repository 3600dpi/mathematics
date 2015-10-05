<?php
session_start();
require_once 'db.php';
$mysqli = db::getObject();
$res = $mysqli->query("SELECT * FROM room");
$data = array();
while ($myrow = $mysqli->assoc($res))
{
	$data[] = $myrow;
}
?>
﻿<!DOCTYPE html>
<html lang="ru">
<head>
<title>Чат</title>
	<meta charset='UTF-8' />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript">
	$.noConflict();
	jQuery(document).ready(function($) {
		$("#messages").load('ajaxLoad.php');
		$("#userOnline").load('userOnline.php');
			
		$("#userArea").submit(function() { 
        $.post('ajaxPost.php', $('#userArea').serialize(), function(data) { 
            $("#messages").append('<div>'+data+'</div>'); 
        });
        return false;
		});
		
	   $('#userArea').on('submit', function(){
			this.reset();
		});
		
		$("#userArea").click(function(){
			$("#messages").scrollTop(90000);
		});
		
		setInterval(function() {
			$("#messages").load('ajaxLoad.php');
		},1500);

		$("#notUser").click(function(){
			$("#notUser").load('notUser.php');
		});
	});
	</script>
</head>
<body>
	<div class="container">
		<div class="row" id="marginTop">
			<!--Пользователи  онлайн-->
			<div class="col-sm-3">
				<?php if(!empty($_SESSION['login'])): ?>
					<h4><ins>Онлайн</ins></h4>
					<div id="userOnline"></div>
				<?php endif; ?>
			</div>
			<!--Вывод сообщений-->
			<div class="col-sm-6">
				<?php if(!empty($_SESSION['login'])): ?>
					<div class="row">
						<div class="col-sm-12" id="messages">

						</div>
					</div>
			<!--Форма отправки-->
			<form id="userArea">
				<div class="form-group">
				  <label></label>
				  <input type="text" name="messages"id="disabledTextInput" class="form-control" placeholder="Введите сообщение ...">
				</div>
				<input type="submit" class="btn btn-default" value="Отправить" />
			</form>
			<!--Если не зарег.-->
			<?php else: ?>
				<p>Зарегистрируйся и общайся в чате!</p>
			<?php endif; ?>
			</div>
			<!--Форма рег.-->
			<div class="col-sm-3">
			<?php if(!empty($_SESSION['login'])): ?>
				<?php echo 'Привет <b>' . $_SESSION['login'] . "</b><a href='exit.php' id='notUser'> Выход</a>"; ?>
			<?php else: ?>
				<form action="check.php" method="post" class="form-horizontal">
				  <div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label" id='left'>Login</label>
					<div class="col-sm-10">
					  <input type="text" name="login" class="form-control" id="exampleInputName2" placeholder="Логин">
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label" id='left'>Password</label>
					<div class="col-sm-10">
					  <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Пароль">
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-sm-10">
						<input type="submit" name="submit" class="btn btn-default" value="Войти">
					</div>
				  </div>
					<a href="registration.php">Регистрация</a>
					<div class="form-group">
						<h4><ins>Комнаты</ins></h4>
						<?php foreach ($data as $key => $value): ?>
							<?php echo '<div class="radio"><label><input type="radio" name="room" id="optionsRadios1" value="' .  $value['enName'] .'" checked>' . $value['rusName'] . '</label></div>'; ?>
						<?php endforeach; ?>
					</div>
				</form>

			<?php endif; ?>
			
			<?php if($_SESSION['login'] == 'admin'): ?>
				<?php echo '<br />Создать' . ' ' . "<a href='newRoom.php'> комнату</a>"; ?>
			<?php endif; ?>
			</div>
		</div>
	</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>