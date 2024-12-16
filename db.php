<?php

try {
    $host = '127.0.0.1';
    $db   = 'deliveries';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // как да се връщат грешките
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // как да се връщат резултатите
        PDO::ATTR_EMULATE_PREPARES   => false, // как да се подготвят заявките преди изпращане
    ];
    $pdo = new PDO($dsn, $user, $pass, $options);

} catch (PDOException  $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    exit;
}

?>