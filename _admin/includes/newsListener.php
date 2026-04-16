<?php
    function addNewsArvhive(){
        freezeNews($_GET['id']);
        $_SESSION['message'] = 'Новость добавлена в архив';
        header("Location: ".FOLDER."/_admin?item=news");
    }

    function popNews(){
        readdNews($_GET['id']);
        $_SESSION['message'] = 'Новость успешно восстановлена';
        header("Location: ".FOLDER."/_admin?item=news");
    }

    function updateNews(){
        if(isset($_SESSION['id'])){ 
            unset($_SESSION['id']);
            unset($_SESSION['prevImage']);
        }
        $_SESSION['message'] = 'Список новостей успешно обновлен';
        header("Location: ".FOLDER."/_admin?item=news");
    }

    function clearArchive(){
        clearNews();
        header("Location: ".FOLDER."/_admin?item=news");
    }

    function cancelNews(){
        unset($_SESSION['id']);
        header("Location: ".FOLDER."/_admin?item=news");
    }

    function initOnSessionNews(){
        $_SESSION['id'] = $_GET['id'];
    }

    if(isset($_GET['item']) && $_GET['item'] == 'news'){
        if(isset($_GET['action'])){
            switch($_GET['action']){
                case "readd":
                    popNews();
                    break;

                case "clear":
                    clearArchive();    
                    break;
                
                case "remove":
                    addNewsArvhive();
                    break;

                case "cancel":
                    cancelNews();
                    break;

                case "update":
                    updateNews();
                    break;

                case "edit":
                    initOnSessionNews();
                    break;
            }
        }else if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
            include 'includes/modalmessage.php';
            unset($_SESSION['message']);
        }
    }
?>
<script src = "js/emptymodal.js"></script>