<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>Tasks</title>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
		<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="/assets/css/main.css" rel="stylesheet">
		<script src="/assets/js/main.js"></script>
	</head>
	<body>
		<?php include 'app/views/_header.php' ?>
		<div class="container">
			<div class="row">
				<div class="col">
					<?php include 'app/views/'.$content_view; ?>
				</div>
			</div>
		</div>
	</body>
</html>
