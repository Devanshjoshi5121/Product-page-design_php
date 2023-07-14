<?php
	session_start();

	// var_dump($_SESSION); 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">	
	<link rel="stylesheet" href="css/styles.css">

	<script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="js/app.js"></script>
</head>
<body>
	<div class="container">
		<div class="wrapper-stock">
			<h2>Update Product Info:</h2>
			<form action="process.php" method="post">
				<input type="hidden" name="action" value="save">
				<input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
				<div class="row">
					<div class="form-group">
						<label class="col-xs-12 col-md-2">Product Name:</label>
						<input class="col-xs-12 col-md-2" type="text" name="productName" value="<?= $_SESSION['change']['productName'] ?>" required>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<label class="col-xs-12 col-md-2">Quantity:</label>
						<input class="col-xs-12 col-md-2" type="number" name="quantity" value="<?= $_SESSION['change']['quantity'] ?>"  required>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<label class="col-xs-12 col-md-2">Price per item:</label>
						<input class="col-xs-12 col-md-2" type="number" step="0.01" min=0 name="price" value="<?= $_SESSION['change']['price'] ?>"  required>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="tstr col-xs-12 col-md-2 col-md-offset-2">
							<input class="btn btn-default" type="submit" value="SAVE">
							<a href="index.php" class="btn btn-default" role="button">CANCEL</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>	
</body>
</html>