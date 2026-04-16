<?php
    include "functions.php";
?>
<section class="orders">
    <div class="current-orders">
        <h2 class='mt-5'>Заявки на услуги</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Заказчик</th>
                    <th scope="col">Номер телефона</th>
                    <th scope="col">Название услуги</th>
                    <th scope="col">Дата и время заказа</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $orders = get_orders();
                    foreach($orders as $order){
                        $service = get_serviceId($order['id_service']);
                        $normalizeDate = date("d.m.Y H:i:s", strtotime($order['date']));
                ?>
                    <tr>
                        <th><?=$order['customer'] ?></th>
                        <td><?=$order['phone'] ?></td>
                        <td><?=$service['title'] ?></td>
                        <td><?=$normalizeDate?></td>
                        <td><a class="btn btn-outline-warning" href="?item=orders&action=success&id=<?=$order['id']?>">Рассмотреть</a></td>
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
                    <th scope="col">Заказчик</th>
                    <th scope="col">Номер телефона</th>
                    <th scope="col">Название услуги</th>
                    <th scope="col">Дата и время заказа</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $orders = get_orders(1);
                    foreach($orders as $order){
                        $service = get_serviceId($order['id_service']);
                        $normalizeDate = date("d.m.Y H:i:s", strtotime($order['date']));
                ?>
                    <tr>
                        <th><?=$order['customer'] ?></th>
                        <td><?=$order['phone'] ?></td>
                        <td><?=$service['title'] ?></td>
                        <td><?=$normalizeDate?></td>
                        <td><a class="btn btn-outline-primary" href="?item=orders&action=readd&id=<?=$order['id']?>">Восстановить</a></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</section>