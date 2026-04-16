<div class="modal _active" id="modal-1">
    <div class="modal__wrapper">
        <div class="modal__content">
            <?php 
                if(isset($_SESSION['id'])){
                    $category = get_categoryID($_SESSION['id']);
                }
            ?>
            <h3 class="modal__title"><?php echo isset($category) ? "Редактирование категории" : "Новая категория" ?></h1>
            <p class="modal__description">
            <form class="container mt-5" action="createCategory.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="mb-3">
                        <label for="titleInput" class="form-label">Заголовок</label>
                        <input type="text" class="form-control" id="titleInput" name="name" value="<?=(isset($category['name']) ? $category['name'] : "")?>">
                    </div>
                    <div class="mb-3 pictures">
                        <label for="formFile" class="form-label">Картинка</label>
                        <?php
                            if(isset($category['image'])) {
                                echo "<div>Текущий файл: <span name='prevImage'>".$category['image']."</span></div>";
                                echo "<img src='../".$category['image']."' class='prev-img'/>";
                                $_SESSION['prevImage'] = $category['image'];
                            }
                        ?>
                        <input class="form-control <?php echo isset($_SESSION['id']) ? 'disableCheck' : '' ?>" type="file" id="formFile" name="image">
                    </div>
                </div>
                <div class="buttons">
                    <button type="submit" class="btn btn-primary btn-add"><?php echo isset($_SESSION['id']) ? 'Сохранить' : 'Добавить' ?></button>
                    <a href="?item=categories&action=cancel" class="btn btn-primary">Отмена</a>
                </div>
            </form>
            <hr>
            </p>
        </div>
    </div>
</div>