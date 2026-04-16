<?php
    include "functions.php";
?>
<?php
    $count = get_countActiveFeedback()['cnt_feedback'];
    if($count >0){
        echo $count;
    }
?>