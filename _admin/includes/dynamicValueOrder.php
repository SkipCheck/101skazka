<?php
    include "functions.php";
?>
<?php
    $count = get_countActiveOrders()['cnt_orders'];
    if($count > 0){
        echo $count;
    }
?>