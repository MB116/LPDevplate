<?php
	//DB initialize
	require_once "initialize.php";
	$match = md5($admin_password);
	$error = false;
?>
<!DOCTYPE html>
<html lang="rus">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Список заявок</title>
	<meta name="description" content="Description">
	<meta name="keywords" content="Keywords">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="admin/css/bootstrap.css">
	<link rel="stylesheet" href="admin/css/style.css">
</head>
<body>
	<header>
		<div class="container">
			<div class="col-md-3">
				<img src="img/logo.png" height="49" width="150" alt="">
			</div>
		</div>
	</header>
	<div class="container">
		<div class="row">

			<?php if(($_COOKIE['login'] === 'admin') && ($_COOKIE['password'] === $match)){ ?>
				
				<div class="col-md-12">
					<h1>Список заявок:</h1>
					<a class='export' href='export.php'><img width="25" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAZCAYAAABQDyyRAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAEbgAABG4B0KOyaAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAHwSURBVEiJxZY7axVRFIW/lVwhaLBRgiBYKkEu2GhhYWNlI8GkEkGFkEbSalDB1sI/IKiIIFiIhRCrQKwSH2mUoBYGk6BiE5uIjxhdFncCw3jOuefGiVmwmcfec9bajzMzsk3dkHQRGLf9ol1sV+3sLewFnkga2SwBAD3AdUl3JfVuhoA1nARmJDVDzoakY8BlYEdikd/AmO2H6xSxD3gqadT2zapzHnDCVoEztgkZ0A9cAm4AE8BbYCWx3h1gW+n5JPl3YCBCfBR4VFQntUbIXgH7baPixhquAIul61nbM+VySWoU2Z5OFr09vgLnqhU4ECt1kfVWYHwdGceqO9ypgHs1kS8AB0MzEBUADEQW+wV8pNXXKVpzMZ8gnwB2xoYwKADoBt6X4n4URMNAXyD+doT8KtBdjm1EBqSKI8Du4vwdcNz2bOazAMu0tvKDqiNXwGBxfAwM2V7qgPw1cML2m1hAsgWAgA/ANLAlNaSBFtwHelOxOd+CQ8B24JTtn5lZrwLnbQ/Z/pIKzGlBExi1PZdJDnAht005Ap7ZftkBOSFySXuAFdufyvfbtqBT8hAkHQaeA7uqvg3/H5B0FpgE+kL+3G34L7iVclYFNCX1bKCYIOr4uOTaX++ZLuDz/8kTx7hGgKWI4rrsG3At9Cb8AykjAYwb315MAAAAAElFTkSuQmCCcc7436bba4e98206156b2160f63524b7"/> Экспорт в Excel</a>
					<?php	
						if($_GET['showhidden']){
							echo "<a class='show-list' href='?showhidden=0'>&larr; Вернуться</a>";
							echo Database::GetHidden();
						}else{
							echo "<a class='show-list' href='?showhidden=1'>Показать скрытые &rarr;</a>";
							echo Database::Get();
						}
					?>
				</div>

			<?php  } else { ?>

				<div class="col-md-4 col-md-offset-4">
					<form action="login.php" role="form" method="POST">
						<?php if($_COOKIE['error']){ ?><p class="error">Неверный пароль и/или email</p><?php } ?>
						<div class="form-group">
							<label for="exampleInputEmail1">Логин:</label>
							<input type="text" name="login" placeholder="Логин" class="form-control">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Пароль:</label>
							<input type="password" name="password" placeholder="Пароль" class="form-control">
						</div>
						<input type="submit" value="Войти" class="btn btn-primary col-md-12">
					</form>
				</div>

			<?php } ?>
		</div>
	</div>

	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script>window.jQuery || document.write('<script src="../js/jquery.1.11.1.min.js"><\/script>')</script>
	<script src="js/script.js"></script>
</body>
</html>