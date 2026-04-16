let link = window.location.pathname.replace('/101skazka/', '');
link += link.length == 0 ? "index.php" : "";
const itemMenu = document.querySelectorAll(".menu__item");
itemMenu.forEach(function(item, i, modal){
    const hrefValue = ''+item.href;
    if(hrefValue.includes(link)){
        item.classList.add('active__item');
        return;
    }
});