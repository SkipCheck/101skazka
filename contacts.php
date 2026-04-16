<?php
    $title = 'Контактные данные';
?>
<?php
    include "includes/header.php";
    include "includes/navmenu.php";
?>
<section class="contacts__block element__animation">
    <div class="container">
        <h2>Контакты</h2>
        <span class="contacts__label">Свяжитесь с нами и мы вам поможем сделать праздник</span>
        <div class="contacts__items">
            <div class="item-contact">
                <img src="img/uploads/contacts/contact-phone.svg" alt="" class="icon-contact">
                <div class="contact__info">
                    <span class="title-contact">Телефон</span>
                    <span class="label-contact">+78005553535</span>
                </div>
            </div>
            <div class="item-contact">
                <img src="img/uploads/contacts/contact-address.svg" alt="" class="icon-contact">
                <div class="contact__info">
                    <span class="title-contact">Наш адрес</span>
                    <span class="label-contact"> г. Березники, ул. Тельмана, д. 7.</span>
                </div>
            </div>
            <div class="item-contact">
                <img src="img/uploads/contacts/contact-email.svg" alt="" class="icon-contact">
                <div class="contact__info">
                    <span class="title-contact">Почта</span>
                    <span class="label-contact">
                        <a href="mailto:tipapochta@gmail.com" class="mail">tipapochta@gmail.com</a>
                    </span>
                </div>
            </div>
            <div class="item-contact">
                <img src="img/uploads/contacts/contact-schedule.svg" alt="" class="icon-contact">
                <div class="contact__info">
                    <span class="title-contact">График работы</span>
                    <span class="label-contact">
                        Каждый день без выходных <br> 
                        c 10.00-21.00
                    </span>
                </div>
            </div>
        </div>
        <div class="location-company">
            <h2>Наше местоположение</h2>
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A2b5133ec7b9fbdaebf6c0047cc839c7471ecad300bdfda394b15631f8b989266&amp;width=1200&amp;height=700&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
    </div>
</section>
<?php
    include "includes/footerform.php";
    include "includes/footer.php";
?>