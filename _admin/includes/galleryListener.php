<?php

    function removeable(){
        global $pdo;
        $query = $pdo->prepare('DELETE FROM `gallery` WHERE id = :id');
        $query->execute(["id" => $_GET['id']]);
        header("Location: ".FOLDER."/_admin?item=gallery");
    }

    if(isset($_GET['item']) && $_GET['item'] == 'gallery'){
        if(isset($_GET['action'])){
            switch($_GET['action']){
                case "remove":
                    removeable();
                    break;
            }
        }else if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
            include 'includes/modalmessage.php';
            unset($_SESSION['message']);
        }
    }
?>
<script src = "js/emptymodal.js"></script>