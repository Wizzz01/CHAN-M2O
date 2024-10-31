<?php require_once '../core/dbConfig.php';?>
<?php require_once '../core/handleForms.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <body>
    <button onclick="document.location='salesDatabase.php'">Return</button>

    <?php $getById = getById($pdo, $_GET['customer_id']); ?>
    <form action="../core/handleForms.php?customer_id=<?php echo $_GET['customer_id']; ?>" method="POST">
    <p>
        <label for="customerName">Customer name: </label>
        <input type="text" name="customerName" value="<?php echo $getById['customer_name'];?>">
    </p>
    <p>
        <label for="customerEmail">Customer email: </label>
        <input type="text" name="customerEmail" value="<?php echo $getById['customer_email'];?>">
    </p>
    <p>
        <label for="customerAddress">Customer address: </label>
        <input type="text" name="customerAddress" value="<?php echo $getById['customer_address'];?>">
    </p>
    <p>
        <label for="itemsPurchased">No. of items purchased: </label>
        <input type="number" name="itemsPurchased" value="<?php echo $getById['items'];?>">
    </p>
    <p>
        <label for="purchaseTotal">Purchase total: </label>
        <input type="number" name="purchaseTotal" value="<?php echo $getById['purchase_total'];?>">
    </p>
    <a href="../salesDatabase.php"><input type="submit" name="editBtn" value="Edit" onclick="document.location='../salesDatabase.php'"> </a>
</form>
</body>
</html>