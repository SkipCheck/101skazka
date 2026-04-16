<?php
    include "functions.php";
?>
<section class="feedback-container">
    <div class="current-orders">
        <h2 class='mt-5'>Заявки на консультацию</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Имя</th>
                    <th scope="col">Номер телефона</th>
                    <th scope="col">Пожелания пользователя</th>
                    <th scope="col">Дата и время заявки</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $orders = get_feedbacks();
                    foreach($orders as $order){
                        $normalizeDate = date("d.m.Y H:i:s", strtotime($order['date']));
                ?>
                    <tr>
                        <th><?=$order['name'] ?></th>
                        <td><?=$order['phone'] ?></td>
                        <td><?=$order['description'] ?></td>
                        <td><?=$normalizeDate?></td>
                        <td><a class="btn btn-outline-warning" href="?item=feedback&action=success&id=<?=$order['id']?>">Рассмотреть</a></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="archive-orders">
        <h2 class='mt-5'>Рассмотренные заявки</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Имя</th>
                    <th scope="col">Номер телефона</th>
                    <th scope="col">Пожелания пользователя</th>
                    <th scope="col">Дата и время заявки</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $orders = get_feedbacks(1);
                    foreach($orders as $order){
                        $service = get_serviceId($order['description']);
                        $normalizeDate = date("d.m.Y H:i:s", strtotime($order['date']));
                ?>
                    <tr>
                        <th><?=$order['name'] ?></th>
                        <td><?=$order['phone'] ?></td>
                        <td><?=$order['description'] ?></td>
                        <td><?=$normalizeDate?></td>
                        <td><a class="btn btn-outline-primary" href="?item=feedback&action=readd&id=<?=$order['id']?>">Восстановить</a></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</section>