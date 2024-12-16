<?php
    $products = [];
    $search = '';
    $where_search = '';
    $params = [];

    if (isset($_GET['search']) && mb_strlen($_GET['search']) > 0) {
       $search = $_GET['search'];
       $where_search = 'WHERE title LIKE :search';
       $params = [':search' => '%' . $search . '%'];

       setcookie('last_search', $search, time() + 3600, '/', 'localhost', false, false);
    }

    $query = "
        SELECT *
        FROM jewellery
        $where_search
    ";
    if ($query !== null && $pdo) {
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        while ($row = $stmt->fetch()) {
            $fav_query = "SELECT id FROM `favorite_jewellery_users` WHERE user_id = :user_id AND product_id = :product_id";
            $fav_stmt = $pdo->prepare($fav_query);
            $fav_stmt->execute([
                ':user_id' => $_SESSION['user_id'] ?? 0,
                ':product_id' => $row['id']
            ]);
            $fav_product = $fav_stmt->fetch();
            $row['is_favorite'] = $fav_product ? 1 : 0;
            $products[] = $row;
        }
    }
    

 
?>

<div class="row d-flex justify-content-end align-items-end me-3">
    <form class="col-6 mb-4" method="GET">
        <div class="input-group">
            <input type="hidden" name="page" value="products">
            <input type="text" class="form-control" name="search" placeholder="Търси продукт" value="<?php echo $search ?>">
            <button class="btn text-white" type="submit" style="background-color: #b23a48;">Търсене</button>
        </div>
    </form>

    <?php
        if (isset($_COOKIE['last_search'])) {
            echo '<p>Последно търсене: ' . $_COOKIE['last_search'] . '</p>';
        }
    ?>
</div>
<div class="d-flex flex-wrap justify-content-evenly">
    <?php
        foreach ($products as $product) {
            $fav_button = '';
            
            if (isset($_SESSION['user_name'])) {
                if ($product['is_favorite'] == '1') {
                    $fav_button = '
                        <div class="card-footer">
                            <button class="btn btn-sm btn-danger remove-favorite" data-product="' . htmlspecialchars($product['id']) . '">Премахни от любими</button>
                        </div>
                    ';
                } else {
                    $fav_button = '
                        <div class="card-footer">
                            <button class="btn btn-sm add-favorite" style="background-color: #ffcad4;" data-product="' . htmlspecialchars($product['id']) . '">Добави в любими</button>
                        </div>
                    ';
                }   
            }

            echo '
                <div class="card mb-4" style="width: 18rem; box-shadow: 5px 10px 20px 6px #E8E8E8;">
                    <img src="uploads/' . htmlspecialchars($product['image']) . '" class="card-img-top" alt="Product Image">
                    <div class="card-body d-flex gap-2 justify-content-between" style="background-color: #f2e9e4;">
                        <div>
                         <h5 class="card-title">' . htmlspecialchars($product['title']) . '</h5>
                        <p class="card-text">' . htmlspecialchars($product['price']) . '</p>
                        </div>
                        <div class="d-flex flex-column align-items-end gap-3">
                        <a class="btn btn-sm" href="?page=edit_product&product_id=' . $product['id'] . '" style="background-color: #f4d58d;">Редактирай</a>
                        <form method="POST" action="./handlers/handle_delete_product.php">
                            <input type="hidden" name="product_id" value="' . $product['id'] . '">
                            <button class="btn btn-sm text-white" type="submit" style="background-color: #b23a48;">Изтрий</button>
                        </form>
                        </div>
                       
                    </div>
                    ' . $fav_button . '
                </div>
            ';
        }

    ?>
</div>