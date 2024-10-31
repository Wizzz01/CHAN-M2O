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
<button onclick="document.location='salesDatabase.php'">Return</button>
<form action="../core/handleForms.php" method ="POST">
        <p><Label for = "customerName">Customer name: </Label> <input type "text" name ="customerName"></p>
        <p><Label for = "customerEmail">Customer email: </Label> <input type "text" name ="customerEmail"></p>
        <p><Label for = "customerAddress">Customer address: </Label> <input type "text" name ="customerAddress"></p>
        <p><Label for = "itemsPurchased">No. of items purchased: </Label> <input type "number" name ="itemsPurchased"></p>
        <p><Label for = "purchaseTotal">Purchase total: </Label> <input type "number" name ="purchaseTotal"></p>
        <input type="submit" name="submitBtn" value="submit" onclick="alert('Updated purchase history!')""> 
    </form>
</body>
</html>