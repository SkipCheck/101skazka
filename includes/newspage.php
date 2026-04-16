<div class="news-block-page">
    <div class="news-description">
        <pre class="format-text"><?=$currentNews['description']?>
        <div class="news-date"><img src="img/calendar.svg" alt=""><?=date("d.m.Y", strtotime($currentNews['date']))?></div>
    </div>
    <div class="news-preview">
        <img src="<?=$currentNews['preview']?>" alt="" class="image-news">
    </div>
</div>