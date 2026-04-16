<h2 class='mt-5'>Активные категории</h2>
<div class="table table-hover table-categories">
    
    <?php 
        $products = get_categories();
        foreach($products as $row){
    ?>
    <div class="category-block">
            <div class="category-name"><?=$row['name'] ?></div>
            <div class="preview-image"><img src="../<?=$row['image']?>" alt=""></div>
            <div class="action-buttons">
                <a class="btn btn-outline-warning" href="?item=categories&action=edit&id=<?=$row['id']?>">
                    Редактировать
                </a>
                <a class="btn btn-outline-danger" href="?item=categories&action=remove&id=<?=$row['id']?>">
                    Добавить в архив
                </a>
            </div>
        
    </div>
    <?php
        }
    ?>
</div>

<h2 class='mt-5'>Категории в архиве</h2>
<div class="table table-hover table-categories">
    
    <?php 
        $products = get_categories(-1, 1);
        foreach($products as $row){
    ?>
    <div class="category-block removed">
            <div class="category-name"><?=$row['name'] ?></div>
            <div class="preview-image"><img src="../<?=$row['image']?>" alt=""></div>
            <div class="action-buttons">
                <a class="btn btn-outline-primary" href="?item=categories&action=readd&id=<?=$row['id']?>">
                    Восстановить
                </a>
            </div>
        
    </div>
    <?php
        }
    ?>
</div>

<a class="btn btn-outline-primary mt-5" href="?item=categories&action=add">Добавить новую категорию</a>