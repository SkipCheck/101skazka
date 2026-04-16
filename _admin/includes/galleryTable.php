<?php
    if(isset($_GET['action']) && $_GET['action'] == "add"){
        include "galleryform.php";
    }
?>
<div class="table table-hover gallery-table">
    <?php
        $gallery = get_gallery();
        foreach($gallery as $row){
    ?>
    <div class="image-block">
       <img src="../<?=$row['path']?>" class="photo" alt=""> 
       <a href="?item=gallery&action=remove&id=<?=$row['id']?>" class="remove-button"><img src="img/gallery-x.svg" alt=""></a>
    </div>
    <?php } ?>
    <a class="image-block add-button">
        <img src="img/plus.svg" alt="">
    </a>
</div>
<script src="js/galleryscript.js"></script>
