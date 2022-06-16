<!DOCTYPE html>
<html>

<head>
	<title>Звонки</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<?php
	error_reporting(0);
	$connect = mysqli_connect('localhost', 'root', '', 'itroom');
	$str_add_calls = "INSERT INTO `calls`(`id`, `company`, `phys`, `phone`, `comment`) VALUES (NULL,'$_POST[company]','$_POST[face]','$_POST[phone]','$_POST[comment]')";
	if ($_POST['send']) {
		if ($_POST['face'] && $_POST['phone'] && $_POST['comment']) {
			$run_add_calls = mysqli_query($connect, $str_add_calls);
			header("location: calls.php");
		}
	}
	?>
</head>

<body>
	<div class="wrapper">
		<nav>
			<a href="index.php">
				<div class="logo">
					<div class="logo_img"></div>
					<div class="text"><b>АЙТИРУМ</b></div>
				</div>
			</a>
			<a href="office.php">
				<div class="office nav_block">
					<div class="boll">
						<div class="icon_office"></div>
					</div>
					<div class="text">Личный кабинет</div>
				</div>
			</a>
			<a href="calls.php">
				<div class="client nav_block">
					<div class="boll">
						<div class="icon_client"></div>
					</div>
					<div class="text">Звонки</div>
				</div>
			</a>
			<a href="chat.php">
				<div class="chat nav_block">
					<div class="boll">
						<div class="icon_chat"></div>
					</div>
					<div class="text">Мессенджер</div>
				</div>
			</a>
			<a href="project.php">
				<div class="project nav_block">
					<div class="boll">
						<div class="icon_project"></div>
					</div>
					<div class="text">Все проекты</div>
				</div>
			</a>
			<a href="#">
				<div class="project_plus nav_block">
					<div class="boll">
						<div class="icon_plus"></div>
					</div>
					<div class="text">Создать проект</div>
				</div>
			</a>
			<a href="#">
				<div class="exit">
					<div class="icon_exit"></div>
					<div class="text_exit">Выход</div>
				</div>
			</a>
		</nav>
		<content>
			<h1>Звонки</h1>
			<span></span>

			<form method="POST">
				<input class="text_block" type="text" name="company" placeholder="Название компании">
				<input class="text_block" type="text" name="face" placeholder="Физ.лицо">
				<input class="text_block" type="text" name="phone" placeholder="Номер телефона">
				<input class="text_block" type="text" name="comment" placeholder="комментарий">
				<input class="button" type="submit" name="send">
			</form>
			<?php
			$str_out_calls = "SELECT * FROM `calls` ORDER BY `calls`.`id` DESC";
			$run_out_calls = mysqli_query($connect, $str_out_calls);
			$num_rows_calls = mysqli_num_rows($run_out_calls);

			if ($num_rows_calls > 0) {
				echo "<table>
                         <tr>
                             <th>Название компании
                             <th>Физ. Лицо
                             <th>Телефон
                             <th>Комментарий
                         </tr>
                     ";
				while ($out_calls = mysqli_fetch_array($run_out_calls)) {
					echo "<tr>
                                 <td>$out_calls[company]</td>
                                 <td>$out_calls[phys]</td>
                                 <td>$out_calls[phone]</td>
                                 <td>$out_calls[comment]</td>
                               </tr>";
				}
				echo "</table>";
			}

			?>
		</content>
	</div>
</body>

</html>