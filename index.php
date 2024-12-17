<?php
// boilerplate index

require_once('./functions.php');
require_once('./db.php');
$current_page = isset($_GET['page']) ? $_GET['page'] : '';

session_start();

$flash = [];
if (isset($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаптопи</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
    <script>
        $(function() {
            $(document).on('click', '.add-favorite', function() {
                let btn = $(this);
                let productId = btn.data('product');

                $.ajax({
                    url: 'ajax/add_favorite.php',
                    method: 'POST',
                    data: {
                        product_id: productId
                    },
                    success: function(response) {
                        let res = JSON.parse(response);
                        if (res.success) {
                            alert('Продуктът беше добавен в любими');
                            let removeBtn = $('<button class="btn btn-sm btn-danger remove-favorite" data-product="' + productId + '">Премахни от любими</button>');
                            btn.replaceWith(removeBtn);
                        } else {
                            alert('Възникна грешка: ' + res.error);
                        }
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });

            $(document).on('click', '.remove-favorite', function() {
                let btn = $(this);
                let productId = btn.data('product');
                $.ajax({
                    url: 'ajax/remove_favorite.php',
                    method: 'POST',
                    data: {
                        product_id: productId
                    },
                    success: function(response) {
                        let res = JSON.parse(response);
                        if (res.success) {
                            alert('Продуктът беше премахнат от любими');
                            let addBtn = $('<button class="btn btn-sm add-favorite" data-product="' + productId + '">Добави в любими</button>');
                            btn.replaceWith(addBtn);
                        } else {
                            alert('Възникна грешка: ' + res.error);
                        }
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark py-3 d-flex" style="background-color: #8c2f39;">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="#">JewelleryStore</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php
                                if (isset($_GET['page']) && mb_strlen($_GET['page']) > 0 && $_GET['page'] == 'home') {
                                    echo '<a class="nav-link active" aria-current="page" href="?page=home">Начало</a>';
                                } else {
                                    echo '<a class="nav-link" aria-current="page" href="?page=home">Начало</a>';
                                }
                            ?>
                        </li>
                        <li class="nav-item">
                            <?php
                                $active = ((isset($_GET['page']) && mb_strlen($_GET['page']) > 0 && $_GET['page'] == 'products') ? 'active' : ''); 
                                echo'<a class="nav-link ' . $active . '" href="?page=products">Продукти</a>';
                            ?>
                        </li>
                        <li class="nav-item">
                            <?php 
                                echo '<a class="nav-link ' . ($current_page == 'contacts' ? 'active' : '') . '" href="?page=contacts">Контакти</a>';
                            ?>
                        </li>
                        <li class="nav-item">
                            <?php
                                echo '<a class="nav-link ' . ($current_page == 'add_product' ? 'active' : '') . '" href="?page=add_product">Добави продукт</a>';
                            ?>
                        </li>
                    </ul>
                    
                </div>
                <div class="d-flex flex-row gap-3 align-items-center">
                        <?php
                            if (isset($_SESSION['user_name'])) {
                                echo '
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <p class="text-white mb-0">Здравейте, ' . $_SESSION['user_name'] . '</p>
                                    
                                </div>
                                <form action="handlers/handle_logout.php" method="POST">
                                        <button type="submit" class="btn btn-outline-light">Изход</button>
                                    </form>
                                ';
                            } else {
                                echo '<a href="?page=login" class="btn btn-outline-light">Вход</a>';
                                echo '<a href="?page=register" class="btn btn-outline-light">Регистрация</a>';
                            }

                        ?>
                    </div>
            </div>
        </nav>
    </header>
    <main style="min-height:80vh; background: rgb(189,177,195);
background: linear-gradient(90deg, rgba(189,177,195,0.17979691876750703) 0%, rgba(121,9,81,0.09576330532212884) 35%, rgba(252,244,247,1) 100%);">
        <div class="container py-4"> 
            <?php
            if (isset($flash['message'])) {
                echo '
                    <div class="alert alert-' . $flash['message']['type'] . '">
                        '. $flash['message']['text'] . '
                    </div>
                ';
            }

            $page = $_GET['page'] ?? 'home';
            if (file_exists('./pages/' . $page . '.php')) {
                require_once('./pages/' . $page . '.php');
            } else {
                require_once('./pages/not_found.php');
            }
        ?>
        </div> 
    </main>
    <footer class="text-center py-2 mt-auto" style="background-color: #f5cac3;">
        <div class="container">
            <span>JewelleryStore © 2024 All rights reserved</span>
        </div>
    </footer>
</body>
</html>