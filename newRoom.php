<?php
session_start();
if(!($_SESSION['login'] == 'admin')) {
	exit ("Доступ на эту страницу разрешен только зарегистрированным пользователям. Если вы    зарегистрированы, то войдите на сайт под своим логином и паролем<br><a    href='index.php'>Главная    страница</a>");
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<title>Добавить комнату</title>
	<meta charset='UTF-8' />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="container">
		<div class="row" id="marginTop">
			<div class="col-sm-offset-3 col-sm-3">
				<form action="saveRoom.php" method="post" class="form-horizontal">
				  <div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">Rus</label>
					<div class="col-sm-10">
					  <input type="text" name="rusName" class="form-control" id="exampleInputName2" placeholder="Название на русском">
					</div>
				  </div>
				  <div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">En</label>
					<div class="col-sm-10">
					  <input type="text" name="enName" class="form-control" id="exampleInputName2" placeholder="Название на английском">
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" name="submit" class="btn btn-default" value="Создать комнату">
					</div>
				  </div>
				</form>
				<a href="index.php">На главную</a>
			</div>
		</div>
	</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>