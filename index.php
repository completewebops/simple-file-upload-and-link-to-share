<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
	<title>File Upload App</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<form method="post" enctype="multipart/form-data">
			<input type="file" name="file" required>
			<input type="submit" value="Upload File">
			<?php if(isset($link)) { echo $link; } ?>
		</form>
	</div>
</body>
</html>

