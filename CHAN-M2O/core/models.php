<?php

require_once 'dbConfig.php';

function addCustomerAndPurchase($pdo, $customerData, $purchaseData) {
   
    $checkCustomer = "SELECT customer_id FROM Customers WHERE customer_email = ?";
    $stmt = $pdo->prepare($checkCustomer);
    $stmt->execute([$customerData['customer_email']]);
    $customerId = $stmt->fetchColumn();
    
    if (!$customerId) {
        $insertCustomer = "INSERT INTO Customers (customer_name, customer_email, customer_address) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($insertCustomer);
        $stmt->execute([$customerData['customer_name'], $customerData['customer_email'], $customerData['customer_address']]);
        $customerId = $pdo->lastInsertId(); 
    }
    
    $insertPurchase = "INSERT INTO Purchase_history (customer_id, items, purchase_total, purchase_date) VALUES (?, ?, ?, NOW())";
    $stmt = $pdo->prepare($insertPurchase);
    $stmt->execute([$customerId, $purchaseData['items'], $purchaseData['purchase_total']]);
    
    return $pdo->lastInsertId(); 
}


function seeAllRecords($pdo){
    $sql = "SELECT 
                c.customer_id, 
                c.customer_name,
                p.items, 
                p.purchase_total, 
                p.purchase_date
            FROM 
                Customers c
            JOIN 
                Purchase_history p ON c.customer_id = p.customer_id;
";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();
    if ($executeQuery) {
        return $stmt->fetchAll();
}
}

function getById($pdo, $customer_id){
    $sql = "SELECT c.customer_name, c.customer_email, c.customer_address, p.items, p.purchase_total 
            FROM Customers c 
            JOIN Purchase_history p ON c.customer_id = p.customer_id 
            WHERE c.customer_id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$customer_id])){
        return $stmt->fetch();
    }
}

function updateCustomerAndPurchase($pdo, $customer_id, $customer_name, $customer_email, $customer_address, $items, $purchase_total) {
    $sql = "UPDATE Customers 
            SET customer_name = ?, 
                customer_email = ?, 
                customer_address = ? 
            WHERE customer_id = ?"; 

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$customer_name, $customer_email, $customer_address, $customer_id]);

    $sqlPurchase = "UPDATE Purchase_history 
                    SET items = ?, 
                        purchase_total = ? 
                    WHERE customer_id = ?";
    $stmtPurchase = $pdo->prepare($sqlPurchase);
    $executeQueryPurchase = $stmtPurchase->execute([$items, $purchase_total, $customer_id]);

    return $executeQuery && $executeQueryPurchase;
}

function deleteHistory($pdo, $customer_id){
    $sqlPurchase = "DELETE FROM Purchase_history WHERE customer_id = ?";
    $stmtPurchase = $pdo->prepare($sqlPurchase);
    $deletePurchase = $stmtPurchase->execute([$customer_id]);

    $sqlCustomer = "DELETE FROM Customers WHERE customer_id = ?";
    $stmtCustomer = $pdo->prepare($sqlCustomer);
    $deleteCustomer = $stmtCustomer->execute([$customer_id]);

    return $deletePurchase && $deleteCustomer;
}
