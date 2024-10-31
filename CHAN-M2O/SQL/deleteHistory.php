<?php require_once '../core/dbConfig.php';?>
<?php require_once '../core/handleForms.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button onclick="document.location='salesDatabase.php'">Return</button>
    <h1>Are you sure you want to remove this purchase history?</h1>
	<?php $getById = getById($pdo, $_GET['customer_id']); ?>
	<form action="../core/handleForms.php?customer_id=<?php echo $_GET['customer_id']; ?>" method="POST">

		<div class="historyContainer" style="border-style: solid; 
		font-family: 'Arial';">
			<p>Customer name: <?php echo $getById['customer_name']; ?></p>
			<p>Customer email: <?php echo $getById['customer_email']; ?></p>
			<p>Customer address: <?php echo $getById['customer_address']; ?></p>
			<p>No. of items purchased: <?php echo $getById['items']; ?></p>
			<p>Purchase total: <?php echo $getById['purchase_total']; ?></p>
			<input type="submit" name="deleteBtn" value="Delete">
		</div>
	</form>
</body>
</html>