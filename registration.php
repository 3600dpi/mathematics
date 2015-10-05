<!DOCTYPE html>
<html lang="ru">
<head>
<title>Регистрация</title>
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
				<form action="saveUser.php" method="post" class="form-horizontal">
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
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" name="submit" class="btn btn-default" value="Зарегистрироваться">
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