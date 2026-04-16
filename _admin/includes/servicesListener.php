<?php
    function addIntoArvhive(){
        freezeService($_GET['id']);
        $_SESSION['message'] = 'Услуга "'.get_serviceID($_GET['id'])['title'].'" добавлена в архив';
        header("Location: ".FOLDER."/_admin?item=services");
    }

    function popOfArchive(){
        readdService($_GET['id']);
        $_SESSION['message'] = 'Услуга "'.get_serviceID($_GET['id'])['title'].'" успешно восстановлена';
        header("Location: ".FOLDER."/_admin?item=services");
    }

    function updateServices(){
        if(isset($_SESSION['id'])){unset($_SESSION['id']);}
        $_SESSION['message'] = 'Список услуг успешно обновлен';
        header("Location: ".FOLDER."/_admin?item=services");
    }

    function cancelAction(){
        unset($_SESSION['id']);
        header("Location: ".FOLDER."/_admin?item=services");
    }

    function clearArchiveServices(){
        clearServices();
        header("Location: ".FOLDER."/_admin?item=services");
    }

    function initOnSession(){
        $_SESSION['id'] = $_GET['id'];
    }

    if(isset($_GET['item']) && $_GET['item'] == 'services'){
        if(isset($_GET['action'])){
            switch($_GET['action']){
                case "readd":
                    popOfArchive();
                    break;

                case "clear":
                    clearArchiveServices();
                    break;

                case "remove":
                    addIntoArvhive();
                    break;

                case "cancel":
                    cancelAction();
                    break;

                case "update":
                    updateServices();
                    break;

                case "edit":
                    initOnSession();
                    break;
            }
        }else if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
            include 'includes/modalmessage.php';
            unset($_SESSION['message']);
        }
    }
?>
<script src = "js/emptymodal.js"></script>