<?php
    header('Content-Type:text/html;charset=utf-8');

    $arr=array('123456','234567','345678');

    echo $arr[array_rand($arr)];

    //echo $_POST['mobile'];
?>
