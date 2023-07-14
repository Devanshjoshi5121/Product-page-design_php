<?php
	session_start();
// 	if (isset($_SESSION))
// {
//     unset($_SESSION);
//     session_unset();
//     session_destroy();
// }

$_SESSION['productList'] = json_decode(file_get_contents("data.json"), true);
	// session_start();
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
		<h1>PRODUCT DISPLAY PAGE</h1>

		<?php
			if(isset($_SESSION['errors'])) {
				foreach($_SESSION['errors'] as $error) {
					echo "<p class='error'>" . $error .  "</p>";
				}
				unset($_SESSION['errors']);
			}

			if(isset($_SESSION['success_message'])) {
				echo "<p class='success'>" . $_SESSION['success_message'] . "</p>";;
				unset($_SESSION['success_message']);
			}
		?>

		<form action="process.php" method="post">
			<h3>Add New Product:</h3>
			<input type="hidden" name="action" value="add">
			<div class="row">
				<div class="form-group">
					<label class="col-xs-12 col-md-2">Product Name:</label>
					<input class="col-xs-12 col-md-2" type="text" name="productName" required>
				</div>
			</div>
			<div class="row">
				<div class="form-group">
					<label class="col-xs-12 col-md-2">Quantity:</label>
					<input class="col-xs-12 col-md-2" type="number" name="quantity"  required>
				</div>
			</div>
			<div class="row">
				<div class="form-group">
					<label class="col-xs-12 col-md-2">Price per item:</label>
					<input class="col-xs-12 col-md-2" type="number" step="0.01" min=0 name="price"  required>
				</div>
			</div>
			<div class="row">
				<div class="form-group">
					<div class="tstr col-xs-12 col-md-2 col-md-offset-2">
						<input class="btn btn-success" type="submit" value="submit">
					</div>
				</div>
			</div>
		</form>

		<div class="wrapper-stock">
			<h3>Product Listing:</h3>
			<table class="table">
				<thead>
					<tr>
						<th>Product Name</th>
						<th>Quantity Available</th>
						<th>Price per item</th>
						<th>Date/Time Submitted/Updated</th>
						<th>Total Value</th>
					</tr>
				</thead>
				<tbody>
<?php
					$i=0;
					foreach ($_SESSION['productList'] as $product) {
?>
						<tr>
							<td><?=$product['productName']?></td>
							<td><?=$product['quantity']?></td>
							<td><?='$'.number_format($product['price'], 2, '.', ',')?></td>
							<td><?=$product['date']['date']?></td>
							<td><?='$'.number_format($product['quantity']*$product['price'], 2, '.', ',')?></td>
						</tr>
						<tr>
							<td>
								<form class="frm-tool" action="process.php" method="post">
									<input type="hidden" name="id" value="<?=$i?>">
									<input class="btn btn-success" type="submit" name="action" value="delete">
									<input class="btn btn-success" type="submit" name="action" value="update">
								</form>
							</td>
						</tr>
<?php						
						$i++;
					}
?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>