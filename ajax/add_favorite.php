<?php
require_once('../functions.php');
require_once('../db.php');

$response = [
    'success' => true,
    'data' => [],
    'error' => ''
];

session_start();

$product_id = intval($_POST['product_id'] ?? 0);

if ($product_id < 0) {
    $response['success'] = false;
    $response['error'] = 'Невалиден продукт';
} else {
    
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO favorite_jewellery_users (product_id, user_id) VALUES (:product_id, :user_id)";
    $stmt = $pdo->prepare($query);
    $params = [
        ':product_id' => $product_id,
        ':user_id' => $user_id
    ];

    

    if (!$stmt->execute($params)) {
        $response['success'] = false;
        $response['error'] = 'Грешка при добавяне в любими';
    }
}

echo json_encode($response);
exit;

?>