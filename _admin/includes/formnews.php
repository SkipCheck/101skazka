<div class="modal _active news-modal" id="modal-1">
    <div class="modal__wrapper">
        <div class="modal__content">
            <?php 
                if(isset($_SESSION['id'])){
                    $news = get_newsID($_SESSION['id']);
                }
            ?>
            <h3 class="modal__title"><?php echo isset($news) ? "Редактирование новости" : "Новая новость" ?></h1>
            <p class="modal__description">
            <form class="container mt-5" action="createNews.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="mb-3">
                        <label for="titleInput" class="form-label">Заголовок</label>
                        <input type="text" class="form-control" id="titleInput" name="name" value="<?=(isset($news['name']) ? $news['name'] : "")?>">
                    </div>
                    <div class="mb-3">
                        <label for="titleInput" class="form-label">Описание</label>
                        <textarea type="text" class="form-control input-description" id="contentInput" name="description"><?=(isset($news['description']) ? $news['description'] : "")?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="titleInput" class="form-label">Дата</label>
                        <input type="date" class="form-control" id="dateInput" name="date" value="<?=(isset($news['date']) ? $news['date'] : "")?>">
                    </div>
                    <div class="mb-3 pictures">
                        <label for="formFile" class="form-label">Картинка</label>
                        <?php
                            if(isset($news['preview'])) {
                                echo "<div>Текущий файл: <span name='prevImage'>".$news['preview']."</span></div>";
                                echo "<img src='../".$news['preview']."' class='prev-img'/>";
                                $_SESSION['prevImage'] = $news['preview'];
                            }
                        ?>
                        <input class="form-control <?php echo isset($_SESSION['id']) ? 'disableCheck' : '' ?>" type="file" id="formFile" name="image">
                    </div>
                </div>
                <div class="buttons">
                    <button type="submit" class="btn btn-primary btn-add"><?php echo isset($_SESSION['id']) ? 'Сохранить' : 'Добавить' ?></button>
                    <a href="?item=news&action=cancel" class="btn btn-primary">Отмена</a>
                </div>
            </form>
            <hr>
            </p>
        </div>
    </div>
</div>