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
    <button onclick="document.location='index.php'">Return</button>
    <button onclick="document.location='addCustomer.php'">New purchase</button>
    <?php $seeAllRecords = seeAllRecords($pdo); ?>
<table style="border-collapse: collapse;">
    <tr style="border: 2px solid black;">
        <th style="border: 2px solid black; padding: 1rem;">Customer ID</th>
        <th style="border: 2px solid black; padding: 1rem;">Customer Name</th>
        <th style="border: 2px solid black; padding: 1rem;">Number of Items</th>
        <th style="border: 2px solid black; padding: 1rem;">Purchase Total</th>
        <th style="border: 2px solid black; padding: 1rem;">Purchase Date</th>
        <th style="border: 2px solid black; padding: 1rem;">Actions</th>
    </tr>

    <?php foreach($seeAllRecords as $row) { ?>
    <tr style="border: 2px solid black;">
        <td style="border: 2px solid black; padding: 1rem;"><?php echo $row['customer_id']; ?></td>
        <td style="border: 2px solid black; padding: 1rem;"><?php echo $row['customer_name']; ?></td>
        <td style="border: 2px solid black; padding: 1rem;"><?php echo $row['items']; ?></td>
        <td style="border: 2px solid black; padding: 1rem;"><?php echo $row['purchase_total']; ?></td>
        <td style="border: 2px solid black; padding: 1rem;"><?php echo $row['purchase_date']; ?></td>
        <td style="border: 2px solid black; padding: 1rem;">
            <a href="editHistory.php?customer_id=<?php echo $row['customer_id']; ?>">Edit</a> | 
            <a href="deleteHistory.php?customer_id=<?php echo $row['customer_id']; ?>">Delete</a>
        </td>
    </tr>
    <?php } ?> 
</table>
</body>
</html>