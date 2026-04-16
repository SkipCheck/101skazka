<?php
    if(isset($_GET['delete'])){
        removePhoto($_GET['id'], $_GET['delete']);
        header("Location: ".FOLDER."/_admin?item=".$_GET['item']."&action=".$_GET['action']."&id=".$_GET['id']);
    }
?>
<div class="modal _active service-modal" id="modal-1">
    <div class="modal__wrapper">
        <div class="modal__content">
            <?php 
                if(isset($_SESSION['id'])){
                    $service = get_serviceID($_SESSION['id']);
                    $imageCount = 0;
                }
            ?>
            <h3 class="modal__title"><?php echo isset($service) ? "Редактирование услуги" : "Новая услуга" ?></h1>
            <p class="modal__description">
            <form class="container mt-5" action="createService.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="mb-3">
                        <label for="titleInput" class="form-label">Название</label>
                        <input type="text" class="form-control" id="titleInput" name="title" value="<?=(isset($service['title']) ? $service['title'] : "")?>">
                    </div>
                    <div class="mb-3">
                        <label for="contentInput" class="form-label">Описание</label>
                        <textarea type="text" class="form-control input-description" id="contentInput" name="description"><?=(isset($service['description']) ? $service['description'] : "")?></textarea>
                    </div>
                    <div class="mb-3">
                        <div class="details">
                            <div>
                                <label for="formFile" class="form-label">Стоимость услуги</label>
                                <input type="number" class="form-control price-field" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="priceInput" name="price" value="<?=(isset($service['price']) ? $service['price'] : "")?>">
                            </div>
                            <div>
                                <label for="formFile" class="form-label">Минимальное время</label>
                                <input type="text" class="form-control price-field"  id="priceInput" name="units" value="<?=(isset($service['units']) ? $service['units'] : "")?>">
                            </div>
                            <div>
                                <label for="formFile" class="form-label">Минимальный возраст</label>
                                <input type="number" class="form-control ages-field" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="priceInput" name="minages" value="<?=(isset($service['minages']) ? $service['minages'] : "")?>">
                            </div>
                            <div>
                                <label for="formFile" class="form-label">Максимальный возраст</label>
                                <input type="number" class="form-control ages-field" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="priceInput" name="maxages" value="<?=(isset($service['maxages']) ? $service['maxages'] : "")?>">
                            </div>
                        </div>
                    </div>
                    <div class="select-category">
                        <label for="categories">Категория</label>
                        <select id="categories" name="selectedCategory">
                        <?php
                            $categories = get_categories();
                            foreach($categories as $row){
                        ?>
                                    <option value="<?=$row['id']?>"
                                    <?php 
                                        if(isset($service)){
                                            if($row['id'] == $service['id_category']){
                                                echo "selected";
                                            }
                                        }
                                    ?>><?=$row['name']?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                    <div class="mb-3 pictures">
                        <label for="formFile" class="form-label">Галерея</label>
                        <div class="gallery">
                        <?php
                            if(isset($service)){
                            $photos = get_galleryService($service['id']);
                            foreach($photos as $photo){
                        ?>
                            <div class="photo-item">
                                <img src="../<?=$photo['image']?>" alt="">
                                <a href="?<?=$_SERVER["QUERY_STRING"]?>&delete=<?=$photo['id']?>" class="btn btn-danger remove-photo">
                                    Удалить
                                </a>
                            </div>
                        <?php
                                $imageCount++;
                                }
                            }
                        ?>
                        </div>
                        <div class="inputs-container"></div>
                        <div class="btn btn-primary add-photo">Добавить фотографию</div>
                    </div>
                </div>
                
                <div class="buttons">
                    <button type="submit" class="btn btn-primary btn-add"><?php echo isset($_SESSION['id']) ? 'Сохранить' : 'Добавить' ?></button>
                    <a href="?item=services&action=cancel" class="btn btn-primary">Назад</a>
                </div>
            </form>
            <hr>
            </p>
        </div>
    </div>
</div>
<script>
    let count = 0;
    let button = document.querySelector(".add-photo");

    count = <?=(isset($imageCount) ? $imageCount : 0)?>;

    if(count == 5){
        button.remove();
    }

    button.addEventListener("click", function(event){

        let childInput = document.createElement("input");
        childInput.type = "file";
        childInput.name = "image"+count;

        childInput.click();
        
        childInput.addEventListener("change", function(event){
            let div = document.createElement("div");
            div.classList.add("item-input");
            
            let remove = document.createElement("div");
            remove.classList.add("btn");
            remove.classList.add("btn-danger");
            remove.classList.add("btn-remove");
            remove.textContent = "Удалить";
            remove.addEventListener("click", function(event){
                remove.parentNode.remove();
                count--;
                if(!document.querySelector(".pictures").contains(button)){
                    document.querySelector(".pictures").appendChild(button);
                }
            });

            div.appendChild(childInput);
            div.appendChild(remove);

            document.querySelector(".inputs-container").appendChild(div);

            count++;
            
            if(count == 5){
                button.remove();
            }
        });
    })
    const submit = document.querySelector(".btn-add");
    submit.addEventListener("click", function(event){
        if(count == 0){
            event.preventDefault();
            alert("Добавьте хотя бы 1 фото");
        }
    });

</script>