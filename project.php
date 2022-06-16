<!DOCTYPE html>
<html>

<head>
	<title>Проекты</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">

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
			<h1>Проекты</h1>
			<span></span>

			<form method="POST">
				<input class="text_block" type="text" name="project" placeholder="Название проекта">
				<input class="text_block" type="text" name="date" placeholder="Сроки выполнения">
				<input class="text_block" type="text" name="participants" placeholder="Участвующие в проектке">
				<input class="text_block" type="text" name="status" placeholder="Статус проекта">
				<input class="button" type="submit" name="send">
			</form>
			<?php
			error_reporting(0);
			$connect = mysqli_connect('localhost', 'root', '', 'itroom');
			$str_add_project = "INSERT INTO `project`(`id`, `project`, `date`, `participants`, `status`) VALUES (NULL,'$_POST[project]','$_POST[date]','$_POST[participants]','$_POST[status]')";
			if ($_POST['send']) {
				if ($_POST['project'] && $_POST['date'] && $_POST['participants'] && $_POST['status']) {
					$run_add_project = mysqli_query($connect, $str_add_project);
					header("location: project.php");
				}
			}
			$str_out_project = "SELECT * FROM `project` ORDER BY `project`.`id` DESC";
			$run_out_project = mysqli_query($connect, $str_out_project);
			$num_rows_project = mysqli_num_rows($run_out_project);

			if ($num_rows_project > 0) {
				echo "<table>
                         <tr>
                             <th>Название проекта
                             <th>Сроки выполнения
                             <th>Участвующие в проекте
                             <th>Статус проекта
                         </tr>
                     ";
				while ($out_project = mysqli_fetch_array($run_out_project)) {
					echo "<tr>
                                 <td>$out_project[project]</td>
                                 <td>$out_project[date]</td>
                                 <td>$out_project[participants]</td>
                                 <td>$out_project[status]</td>
                               </tr>";
				}
				echo "</table>";
			}
			?>
		</content>
	</div>
</body>

</html>