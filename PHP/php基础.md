## PHP
### 新建php模板
1. Sublime Text->Tools->new Snippet->添加模板->设置快捷键
2. webstorm->右键->new->Edit File Templates->加号->php->设置php的模本的基本配置->重启webstorm

### 变量
```
// 定义变量
$name='张三';
$Name="李四";
$age=20;
```

### 数据类型
```
$name='张三';// 字符串
$age=20;// 整型
$weight=130.5;// 浮点型
$sex=false;// 布尔型
// 定义对象
class Person{
    public $name='Lily';
    public $age=20;
}
// 创建对象
$person=new Person;// 后面没有括号
// 输出对象的某个属性值
echo $person->$name;
// 输出整个对象的复杂属性值
var_dump($person);
```

### 单引号和双引号的区别
1. 双引号会解析包含在内的变量名
2. 单引号会当做普通字符串进行处理

### 索引数组、关联数组
```
// 定义索引数组
$arrIndex=array("张三","李四","王五","赵六");
echo $arrIndex[1];
// 定义关联数组
$arrRelation=array(
    'name'=>'张三',
    'age'=>20,
    'sex'=>true
);
echo $arrRelation['age'];
// 定义深度数组
$arrDeep=array(
    array(
        'name'=>'jack',
        'age'=>20
    ),
    array(
        'name'=>'rose',
        'age'=>18
    ),
    array(
        'name'=>'tom',
        'age'=>16
    )
);
echo $arrDep[1]['name'];
```

### 字符串拼接
```
// 使用运算符拼接字符串
$name='Tom';
echo 'My name is '.$name;
// 使用var_dump输出复杂类型
$arr=array(
    'name'=>'张三',
    'age'=>20
);
var_dump($arr);
// 使用print_r进行复杂类型数据的输出
print_r($arr);
```

### php函数
```
// 定义普通函数
function sayHi(){
    echo '你好！';
}
// 调用函数
sayHi();
// 带参数的函数
function sayHiWithName($name='jack'){
    echo $name.' 您好!';
}
sayHiWithName();// jack 您好！
sayHiWithName('张三');// 张三 您好！
```

### php分支语句
1. 条件分支：if/if-else  switch-case.与js中的使用方式一致
2. 循环分支
```
$arrIndex=array("张三","李四","王五","赵六");
// 获取数组长度
$cnt=count($arrIndex);
for($i=0;$i<$cnt;$i++){
    echo $arrIndex[$i].'   ';
}
// foreach
foreach($arrIndex as $key=>$value){
    echo $key.'  '.$value;
    //或者：
    /*echo $key.'  '.$arrIndex[$key];*/
}
```

### 表单处理
1. 表单name属性是用来提供给服务器接受所传递的数据而设置的，没有就不能进行数据提交
2. 表单action属性设置接受数据的处理程序
3. 表单的method属性设置发送数据的方式
4. 当上传文件时设置enctype="multipart/form-data"，只能post方式
5. $_GET接受get传值
6. $_POST接受post传值
7. $_FILES接受文件上传
```
<?php
  header('Content-Type:text/html;charset=utf-8');
  echo $_POST;//Array
  var_dump($_POST);
  // array
  // 'userName' => string 'admin' (length=5)
  // 'userPwd' => string 'admin' (length=5)
  print_r($_POST);// Array ( [userName] => admin [userPwd] => admin )
  var_dump($_FILES);
  // array
  //   'userPhoto' => 
  //     array
  //       'name' => string 'img.png' (length=37)
  //       'type' => string 'image/png' (length=9)
  //       'tmp_name' => string 'D:\software\wampserver\wamp\tmp\phpFF20.tmp' (length=43)
  //       'error' => int 0
  //       'size' => int 9307
  var_dump($_FILES['userPhoto']['name']);// string 'img.png' (length=37)
  // 将上传的图片移动到当前项目的图片文件夹中
  move_uploaded_file($_FILES['userPhoto']['tmp_name'], './images/form.png');
?>
```

### 文件导入
1. include：一般用来导入静态html文件
2. require：一般用于导入php文件

### 常用php函数
1. in_array() ：是否在数组中
2. count() ：计算数组长度
3. array_key_exists()：检测数组中是否存在key

### php页面的动态渲染
1. 可以在PHP文件中直接输出html结构代码
2. 也可以在PHP文件中输出变量，做到动态的渲染结果
3. 当是一个html文件的时候，php代码是不会执行的，会被当做是注释来处理
4. 如果文件类型是PHP，那么就解析满足php语法的语句
```
<?php
  header('Content-Type:text/html;charset=utf-8');
  $arr=array(
    array(
        'name'=>'商品分类',
        'src'=>'./images/form.png'
      ),
      array(
        'name'=>'商品分类',
        'src'=>'./images/form.png'
      ),
      array(
        'name'=>'商品分类',
        'src'=>'./images/form.png'
      )
  );
  // 读取数据，转换为html结构
  $htmlStr='<ul>';
  foreach ($arr as $key => $value) {
    $htmlStr.='<li>';
    $htmlStr.='<img src="'.$value['src'].'" />';
    $htmlStr.='<p>'.$value['name'].'</p>';
    $htmlStr.='</li>';
  }
  $htmlStr.='</ul>';
  echo $htmlStr;
?>
```

### 模拟登录
```
<?php
  header('Content-Type:text/html;charset=utf-8');
  // 模拟服务器端数据
  $arr=array(
    array(
      'userName'=>'admin',
      'userPwd'=>'admin'
    ),
    array(
      'userName'=>'root',
      'userPwd'=>'root'
    )
  );
  // 获取用户的表单输入数据
  $userName=$_POST['userName'];
  $userPwd=$_POST['userPwd'];
  // 判断
  foreach ($arr as $key => $value) {
    if($value['userName']==$userName&&$value['userPwd']==$userPwd){
      echo '登录成功';
      header('refresh:1;url=http://www.baidu.com');
      return;
    }else{
      echo '登录失败';
      header('refresh:1;url=login.html');
      return;
    }
  }
?>
```