<h2 class='mt-5'>Активные новости</h2>

<div class="container-news">
<?php 
    $products = get_news();
    foreach($products as $row){ 
?>
    <div class="news-block">
        <div class="news-content">
            <div class="details">
                <div>
                    <span>Изображение</span>
                    <img src="../<?=$row['preview']?>" alt="">
                </div>
                <div>
                    <span>Название</span>
                    <div><?=$row['name']?></div>
                </div>
                <div>
                    <span>Дата публикации</span>
                    <div><?=date("d.m.Y", strtotime($row['date']))?></div>
                </div>
            </div>
            <div class="news-description">
                <span>Описание</span>
                <pre class="text-format"><?=$row['description']?></pre>
            </div>
            <div class="action-buttons news-buttons">
                <a class="btn btn-outline-warning" href="?item=news&action=edit&id=<?=$row['id']?>">
                    Редактировать
                </a>
                <a class="btn btn-outline-danger" href="?item=news&action=remove&id=<?=$row['id']?>">
                    Добавить в архив
                </a>
            </div>
        </div>
    </div>
<?php
    }
?>
</div>


<h2 class='mt-5'>Новости в архиве</h2>

<div class="container-news removed">
<?php 
    $products = get_news(-1, 1);
    foreach($products as $row){ 
?>
    <div class="news-block">
        <div class="news-content">
            <div class="details">
                <div>
                    <span>Изображение</span>
                    <img src="../<?=$row['preview']?>" alt="">
                </div>
                <div>
                    <span>Название</span>
                    <div><?=$row['name']?></div>
                </div>
                <div>
                    <span>Дата публикации</span>
                    <div><?=date("d.m.Y", strtotime($row['date']))?></div>
                </div>
            </div>
            <div class="news-description">
                <span>Описание</span>
                <pre class="text-format"><?=$row['description']?></pre>
            </div>
            <div class="action-buttons news-buttons">
                <a class="btn btn-outline-primary" href="?item=news&action=readd&id=<?=$row['id']?>">
                    Восстановить
                </a>
            </div>
        </div>
    </div>
<?php
    }
?>
</div>
<a class="btn btn-outline-primary mt-5" href="?item=news&action=add">Добавить новую новость</a>
<a class="btn btn-outline-danger mt-5" href="?item=news&action=clear">Очистить архив</a>