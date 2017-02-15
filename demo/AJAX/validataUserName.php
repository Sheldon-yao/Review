<?php
    header('Content-Type:application/json;charset=utf-8');
    //header('Content-Type:text/html;charset=utf-8');
    $arr=array('jack','rose','curry','tom');

    $userName=$_POST['userName'];

    if(in_array($userName,$arr)){
        $result=array(
            'code'=>100,
            'msg'=>'用户名已存在'
        );
        echo json_encode($result);
    }
    else{
         $result=array(
                'code'=>200,
                'msg'=>'用户名合法'
         );
         echo json_encode($result);
    }
?>
