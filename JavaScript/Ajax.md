## Ajax
### 异步
某段程序执行时不会阻塞其他程序执行，其表现形式为程序的执行顺序不依赖程序本身的书写顺序，反之为同步。其优势在于不阻塞程序的执行，从而提升整体执行效率。

### XMLHttpRequest说明
浏览器内建对象，用于后台与服务器通信(交换数据)，可以实现对网页的部分更新，而不刷新整个页面。

### 请求
1. 创建xhr对象
```
var xhr=new XMLHttpRequest();
```
2. 请求行
```
xhr.open('post','test.php');
```
3. 请求头
```
xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
```
4. 请求体
```
xhr.send('name=rose&age=20');
```
5. GET和POST请求的区别
    - GET不需要设置请求头
    - GET的数据传递通过URL进行传递，而POST在send方法中传递

### 响应
HTTP响应是由服务端发出的，作为客户端更应该关注的是响应的结果。由于服务器做出响应需要时间，所以我们需要监听服务器响应状态，然后才能进行处理。
1. onreadystatechange是JavaScript的事件的一种，监听XMLHttpRequest的状态
2. readyState：响应状态，返回XMLHTTP请求的当前状态

| readyState 状态 | 状态说明 |
| ----: | :--- |
| 0未初始化 |  此阶段确认XMLHttpRequest对象是否创建，并为调用open()方法进行未初始化作好准备。值为0表示对象已经存在，否则浏览器会报错－－对象不存在 |
| 1载入 | 此阶段对XMLHttpRequest对象进行初始化，即调用open()方法，根据参数(method,url,true)完成对象状态的设置。并调用send()方法开始向服务端发送请求。值为1表示正在向服务端发送请求。 |
| 2载入完成 | 此阶段接收服务器端的响应数据。但获得的还只是服务端响应的原始数据，并不能直接在客户端使用。值为2表示已经接收完全部响应数据。并为下一阶段对数据解析作好准备 |
| 3交互 | 此阶段解析接收到的服务器端响应数据。即根据服务器端响应头部返回的MIME类型把数据转换成能通过responseBody、responseText或responseXML属性存取的格式，为在客户端调用作好准备。状态3表示正在解析数据 |
| 4完成 | 此阶段确认全部数据都已经解析为客户端可用的格式，解析已经完成。值为4表示数据解析完毕，可以通过XMLHttpRequest对象的相应属性取得数据 |


3. status：响应码-常用响应码
    - HTTP: Status 200 – 服务器成功返回网页
    - HTTP: Status 404 – 请求的网页不存在
    - HTTP: Status 503 – 服务不可用

### Ajax案例
```
// 模拟get请求
// 1. 创建异步请求对象
var xhr=new XMLHttpRequest();
// 2. 创建请求，请求方式和请求目标
xhr.open('get','login.php?userName=admin&userPwd=admin');
// 3. 发送请求
xhr.send(null);

// 模拟post请求
// 1. 创建异步请求对象
var xhr=new XMLHttpRequest();
// 2. 创建请求，请求方式和请求目标
xhr.open('post','login.php');
// 3. 设置请求头
xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
// 4. 发送请求
xhr.send('userName=admin&userPwd=admin');

// 监听状态改变事件
xhr.addEventListener('readystatechange', function(){
  // 判断响应状态
  if(xhr.readyState==4&&xhr.status==200){
    console.log(xhr.responseText);
  }
});
```

### GET和POST请求的差异
1. GET没有请求主体，使用xhr.send(null)
2. GET可以通过在请求URL上添加请求参数
3. POST可以通过send()添加参数
4. POST需要设置请求头
5. GET效率更好
6. GET有大小限制，POST没有

### XML
1. XML是一种标记语言，类似于HTML，其宗旨是用来传输数据，具有自我描述性(固定的格式数据)
2. 语法规则
    - 必须有一个根元素
    - 不可以有空格、不可以数字或.开头、大小写敏感
    - 不可以交叉嵌套
    - 属性双引号
    - 特殊符号要使用实体
    - 注释和HTML一样
    - 虽然可以描述和传输复杂数据，但是其解析过于复杂并且体积较大，所以实现开发已经很少用

### XML动态展示数据
1. XML文件代码 
```
<root>
    <array>
        <item>
            <name>商品分类1</name>
            <src>../images/nav0.png</src>
        </item>
        <item>
            <name>商品分类2</name>
            <src>../images/nav1.png</src>
        </item>
        <item>
            <name>商品分类3</name>
            <src>../images/nav2.png</src>
        </item>
    </array>
</root>
```
2. php代码
```
<?php
    /*对于xml文件，标准的Content-Type格式*/
    header('Content-Type:application/xml;charset=utf-8');
    /*1.读取xml文件*/
    $xml=file_get_contents('data.xml');
    echo $xml;
?>
```
3. Html+js代码
```
<div class="container">
  <ul id="nav">
    
  </ul>
</div>
<script>
window.onload=function(){
  var nav=document.getElementById('nav');
  // 创建ajax请求
  var xhr=new XMLHttpRequest();
  xhr.open('get','list.php');
  xhr.send(null);
  xhr.addEventListener('readystatechange', function(){
    if(xhr.status==200&&xhr.readyState==4){
      // 得到xml的dom对象
      var xmlDom=xhr.responseXML;
      var items=xmlDom.querySelectorAll('item');
      // 拼接结果
      var resultHTML='';
      for(var i=0;i<items.length;i++){
        var item=items[i];
        var name=item.querySelector('name').innerHTML;
        var src=item.querySelector('src').innerHTML;
        resultHTML+='<li>';
        resultHTML+='<img src="'+src+'"/>';
        resultHTML+='<p>'+name+'</p>';
        resultHTML+='</li>';
      }
      nav.innerHTML=resultHTML;
    }
  });
}
</script>
```

### JSON
1. 语法规则
    - 数据在名称/值对中
    - 数据由逗号分隔(最后一个键/值对不能带逗号)
    - 花括号保存对象，方括号保存数组
    - 名称和值都需要使用双引号包含
2. JSON解析
    - JavaScript解析方法
        + JSON.parse()：从字符串解析出json对象
        + JSON.stringify()：从json对象解析出字符串
        + JSON的兼容处理json2.js
    - PHP解析方法
        + json_encode()：对变量进行JSON编码，返回value值的JSON形式
        + json_decode()：对JSON格式的字符串进行编码，它接受一个JSON格式的字符串并且将它转换为php变量
        + JSON体积小、解析方便且高效，在实际开发成为首选

### JSON动态展示数据
1. JSON文件
```
[
  {
    "name":"商品分类1",
    "src":"../images/nav0.png"
  },{
    "name":"商品分类2",
    "src":"../images/nav1.png"
  },{
    "name":"商品分类3",
    "src":"../images/nav2.png"
  }
]
```
2. php文件
```
<?php
  header('Content-Type:application/json;charset=utf-8;');
  $json=file_get_contents('list.json');
  echo $json;
?>
```
3. Html+js代码
```
<div class="container">
  <ul id="nav">
    
  </ul>
</div>
<script>
window.onload=function(){
  var xhr=new XMLHttpRequest();
  xhr.open('post','list.php');
  xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  xhr.send(null);
  xhr.addEventListener('readystatechange', function(){
    if(xhr.status==200&&xhr.readyState==4){
      var jsonObj=JSON.parse(xhr.responseText);
      var resultHTML='';
      for(var i=0;i<jsonObj.length;i++){
        var obj=jsonObj[i];
        resultHTML+='<li>';
        resultHTML+='<img src="'+obj.src+'"/>';
        resultHTML+='<p>'+obj.name+'</p>';
        resultHTML+='</li>';
      }
      document.getElementById("nav").innerHTML=resultHTML;
    }
  });
}
</script>
```

### 兼容处理：IE5/IE6中不支持XMLHttpRequest
IE5/IE6中使用ActiveXObject("Microsoft.XMLHTTP");
```
var request;
if(XMLHttpRequest){
    request=new XMLHttpRequest();
}else{
    request=new ActiveXObject("Microsoft.XMLHTTP");
}
```

### 封装AJAX工具函数
1. 封装ajax请求处理过程
    - 请求方法
    - 请求地址
    - 请求的参数，传递的数据
    - 请求后的回调
2. 直接在函数中传入参数：参数固定不方便后期使用
3. 使用对象做为参数
    - 优点：不再关注参数的顺序，方便参数类型和顺序的扩展
    - 缺点：暴露在文件中，如果有新的功能需要添加，会产生麻烦，不方便扩展
4. 使用命名空间