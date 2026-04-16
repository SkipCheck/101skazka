<?php

    function addIntoArvhive(){
        freezeFeedback($_GET['id']);
        $customer = get_feedbackId($_GET['id']);
        $_SESSION['message'] = 'Заявка на имя '.$customer['name']." тел. ".$customer['phone'].' добавлен в архив';
        header("Location: ".FOLDER."/_admin?item=feedback");
    }

    function popOfArchive(){
        readdfeedback($_GET['id']);
        $customer = get_feedbackId($_GET['id']);
        $_SESSION['message'] = 'Заявка на имя '.$customer['name']." тел. ".$customer['phone'].' восстановлена';
        header("Location: ".FOLDER."/_admin?item=feedback");
    }

    if(isset($_GET['item']) && $_GET['item'] == 'feedback'){
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