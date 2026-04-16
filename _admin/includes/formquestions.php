<div class="modal _active" id="modal-1">
    <div class="modal__wrapper">
        <div class="modal__content">
            <?php 
                if(isset($_SESSION['id'])){
                    $questions = get_questionId($_SESSION['id']);
                }
            ?>
            <h3 class="modal__title"><?php echo isset($questions) ? "Редактирование вопроса": "Новый вопрос" ?></h1>
            <p class="modal__description">
            <form class="container mt-5" action="createquestion.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="mb-3">
                        <label for="titleInput" class="form-label">Вопрос</label>
                        <input type="text" class="form-control" id="titleInput" name="question" value="<?=(isset($questions['question']) ? $questions['question'] : null)?>">
                    </div>
                    <div class="mb-3">
                        <label for="contentInput" class="form-label">Ответ</label>
                        <textarea type="text" class="form-control" id="contentInput" name="answer"><?=(isset($questions['answer']) ? $questions['answer'] : null )?></textarea>
                    </div>
                </div>
                <div class="buttons">
                    <button type="submit" class="btn btn-primary btn-add"><?php echo isset($_SESSION['id']) ? 'Сохранить' : 'Добавить' ?></button>
                    <a href="?item=questions&action=cancel" class="btn btn-primary">Отмена</a>
                </div>
            </form>
            <hr>
            </p>
        </div>
    </div>
</div>