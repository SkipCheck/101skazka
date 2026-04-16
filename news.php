<?php
    $title = 'Самые последние новости в мире праздников';
?>
<?php
    include "includes/header.php";
    include "includes/navmenu.php";
?>
<?php
    $currentId = (isset($_GET['news']) ? $_GET['news'] : -1);
    $currentNews = ($currentId != -1 ? get_newsId($currentId) : null);
?>
<section class="news__block element__animation">
    <div class="container">
        <h2><?=(!isset($currentNews) ? "Что нового в мире праздников?" : $currentNews['name'])?></h2>
        <?php
            if(!isset($currentNews)){
        ?>
        <div class="filter_group">
            <a href="?type=1" class="item-filter <?=((isset($_GET['type']) && $_GET['type'] == 1) ? "active-filter" : "")?>">Сначала новые</a>
            <a href="?type=2" class="item-filter <?=((isset($_GET['type']) && $_GET['type'] == 2) ? "active-filter" : "")?>">Сначала старые</a>
        </div>
        <div class="newscard-list">
            <?php
                $newsCard = "";
                if(isset($_GET['type']) && $_GET['type'] == 1){
                    $newsCard = get_newslist();
                }else{
                    $newsCard = get_oldestNews();
                }
                foreach($newsCard as $row){
            ?>
            <div class="newscard-item element__animation">
                <a href="?news=<?=$row['id']?>">
                    <div class="item-wrapper">
                        <img src="<?=$row['preview']?>" alt="" class="image-news">
                        <div class="newscard-content" >
                            <div class="item-name"><?=$row['name']?></div>
                            <div class="item-description"><?=$row['description']?></div>
                            <div class="item-date"><img src="img/calendar.svg" alt=""><?=date("d.m.Y", strtotime($row['date']))?></div>
                        </div>
                    </div>
                </a>
            </div>
            <?php
                }
            ?>
        </div>
        <?php
            }else{
                include "includes/newspage.php";
            }
        ?>
    </div>
</section>
<?php
    include "includes/questions.php";
    include "includes/footerform.php";
    include "includes/footer.php";
?>