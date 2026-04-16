<?php

    function addIntoArvhive(){
        freezeOrder($_GET['id']);
        $customer = get_orderId($_GET['id']);
        $_SESSION['message'] = 'Заказ на имя '.$customer['customer']." тел. ".$customer['phone'].' добавлен в архив';
        header("Location: ".FOLDER."/_admin?item=orders");
    }

    function popOfArchive(){
        readdOrder($_GET['id']);
        $customer = get_orderId($_GET['id']);
        $_SESSION['message'] = 'Заказ на имя '.$customer['customer']." тел. ".$customer['phone'].' восстановлен';
        header("Location: ".FOLDER."/_admin?item=orders");
    }

    if(isset($_GET['item']) && $_GET['item'] == 'orders'){
        if(isset($_GET['action'])){
            switch($_GET['action']){
                case "success":
                    addIntoArvhive();
                    break;

                case "readd":
                    popOfArchive();
                    break;
            }
        }else if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
            include 'includes/modalmessage.php';
            unset($_SESSION['message']);
        }
    }
?>
<script src = "js/emptymodal.js"></script>