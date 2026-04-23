<?php

     $options = [
     \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
     \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
     \PDO::ATTR_EMULATE_PREPARES   => false,
     ];

     // Поддержка Docker и локального запуска
     $host = getenv('DB_HOST') ?: 'localhost';
     $dbname = getenv('DB_NAME') ?: 'skazkadb';
     $user = getenv('DB_USER') ?: 'root';
     $password = getenv('DB_PASSWORD') ?: '';

     $dsn = "mysql:host=$host;dbname=$dbname;charset=UTF8";

     try {
     $pdo = new \PDO($dsn, $user, $password, $options);
     } catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
     }

     date_default_timezone_set('Asia/Yekaterinburg');

?>