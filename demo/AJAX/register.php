<?php
    header('Content-Type:application/json;charset=utf-8');

    sleep(3);
    //echo $_GET;
    /*这里只是证明服务器拿到了客户端传递过来的数据*/
    //echo json_encode($_GET);
    /*一般的请求处理是：服务器端处理完成响应请求的时候，会返回一些数据，告诉客户端如何进行处理*/
    $result=array(
        'code'=>200,
        'msg'=>'注册成功',
        'result'=>'http://www.html5_ajax.com'
    );
    echo json_encode($result);
?>
