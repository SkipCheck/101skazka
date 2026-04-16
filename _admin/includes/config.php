<?php
    $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $dsn = "mysql:host=localhost;dbname=skazkadb;charset=UTF8";
    try {
         $pdo = new \PDO($dsn, 'root', '', $options);
    } catch (\PDOException $e) {
         throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

    $id = '';

    define("FOLDER", "/101skazka");
?>
