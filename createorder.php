<?php
    include "includes/header.php";
    $serviceId = $_POST['serviceid'];
    $namecustomer = $_POST['namecustomer'];
    $phone = $_POST['phone'];

    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO orders (customer, phone, id_service, date) VALUES (:customer, :phone, :id_service, :date)";
    $query = $pdo->prepare($sql);
    $query->execute(['customer' => $namecustomer, "phone" => $phone, "id_service" => $serviceId, "date" => $date]);
    $_SESSION['success'] = 1;
    header("Location: ".$_SERVER['HTTP_REFERER']);
?>