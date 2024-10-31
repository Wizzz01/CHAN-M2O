<?php
require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['submitBtn'])) {
    $customerData = [
        'customer_name' => $_POST['customerName'],
        'customer_email' => $_POST['customerEmail'],
        'customer_address' => $_POST['customerAddress'],
    ];

    $purchaseData = [
        'items' => $_POST['itemsPurchased'], 
        'purchase_total' => $_POST['purchaseTotal']
    ];

    $query = addCustomerAndPurchase($pdo, $customerData, $purchaseData);

    if ($query) {
        header("Location: ../sql/salesDatabase.php");
    } else {
        echo "Query Failed";
    }
}


if (isset($_POST['editBtn'])) {
    $customer_id = $_GET['customer_id']; 
    $customer_name = $_POST['customerName'];  
    $customer_email = $_POST['customerEmail'];   
    $customer_address = $_POST['customerAddress'];
    $items = $_POST['itemsPurchased']; 
    $purchase_total = $_POST['purchaseTotal'];  

    $query = updateCustomerAndPurchase($pdo, $customer_id, $customer_name, $customer_email, $customer_address, $items, $purchase_total);

    if ($query) {
        header("Location: ../sql/salesDatabase.php");
    } else {
        echo "Update Failed";
    }    
}


if(isset($_POST['deleteBtn'])){
    $id = $_GET['customer_id'];  
    $query = deleteHistory($pdo, $id);

    if ($query) {
        header("Location: ../sql/salesDatabase.php");
    } else {
        echo "Delete Failed";
    }    
}

