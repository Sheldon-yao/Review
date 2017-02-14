## HTML5
### HTML5优点
1. 提高可用性和改进用户的友好体验
2. 有几个新的标签，这将有助于开发人员定义重要的内容
3. 可以给站点带来更多的多媒体元素(视频和音频)
4. 可以很好的替代FLASH和Silverlight
5. 当涉及到网站的抓取和索引的时候，对于SEO很友好
6. 将被大量应用于移动应用程序和游戏
7. 可移植性好

### HTML5缺点
该标准并未能很好的被浏览器所支持。因新标签的引入，各浏览器之间将缺少一种统一的数据描述格式 xml/json，造成用户体验不佳。

### HTML5中的新增标签
1. **`<canvas>`标签定义图形**
2. **`<audio>`定义音频内容**
3. **`<video>`定义视频**
4. `<source>`定义多媒体资源`<video>`和`<audio>`
5. `<embed>`定义嵌入的内容，比如插件
6. `<track>`为诸如`<video>`和`<audio>`元素之类的媒介规定外部文本轨道。
7. **`<datalist>`定义选项列表。input元素配合使用该元素，来定义input可能的值。**
8. `<keygen>`规定用于表单的密钥对生成器字段
9. `<output>`定义不同类型的输出，比如脚本的输出
10. **`<article>`定义页面侧边栏内容之外的内容**
11. **`<aside>`定义页面侧边栏内容**
12. `<bdi>`允许您设置一段文本，使其脱离其父元素的文本方向设置
13. `<command>`定义命令按钮，比如单选按钮、复选框或按钮
14. `<details>`用于描述文档或文档某个部分细节
15. `<dialog>`定义对话框，比如提示框
16. `<summary>`标签包含details元素的标题
17. `<figure>`规定独立的流内容(图像、图表、照片、代码等)
18. `<figcaption>`定义figure元素的标题
19. **`<footer>`定义section或document的页脚**
20. **`<header>`定义文档的头部区域**
21. `<mark>`定义带有标记的文本
22. **`<meter>`定义度量衡。仅用于已知最大和最小值的度量**
23. **`<nav>`定义运行中的进度(进程)导航**
24. `<progress>`定义任何类型的任务的进度
25. `<ruby>`定义ruby注释
26. `<rt>`定义字符的解释或发音
27. `<rp>`在ruby注释中使用，定义不支持ruby元素的浏览器所显示的内容
28. **`<section>`定义文档中的节**
29. `<time>`定义日期或时间
30. `<wbr>`规定在文本中的何处适合添加换行符

### 兼容处理
1. 在不支持HTML5新标签的浏览器里，会将这些新的标签解析成行内元素，只需要将这些新的标签转换成块元素即可
2. IE9及以下，不能正常解析这些新标签，通过document.createElement('tagName')来创建重新创建一遍，这样低版本就可以正常解析了
3. 在实际开发过程中通过加载第三方的一个JS库来解决兼容性问题[查看](./HTML5/js/html5shiv.min.js)

### HTML5中表单新增的标签
1. `<datalist>`和input结合可以实现类似于下拉框，datalist绑定的id要和input的list的值一样
```
<label for="sub">学科：</label><input type="text" name="subName" list="subject" />
<datalist id="subject">
  <option value="JavaScript">JavaScript</option>
  <option value="HTML5">HTML5</option>
  <option value="CSS3">CSS3</option>
</datalist>  
```
2. `<meter>`定义度量衡
```
<meter high="90" low="59" value="55" min="0" max="100"></meter>
```
3. `<output>`用于展示内容，只是展示，不能进行编辑

### 表单新增属性
1. placeholder：占位符，提示文本，没办法设置提示文字的颜色
2. autofocus：获取焦点
3. multiple：文件上传多选或多个邮箱地址
4. autocomplete：自动完成，用于表单元素
5. form：指定表单项属于哪个form，处理复杂表单时会用
6. novalidate：关闭验证
7. required：必填项
8. pattern：正则表达式，验证表单
```
<form action="" autocomplete="on">
    autofocus定位文本框焦点：<input type="text" autofocus> <br>
    placeholder设置文本框默认提示：<input type="text" placeholder="请输入***"><br>
    email邮件类型自带验证和提示：<input type="email"> <br>
    required属性设置非空特性：<input type="tel" required><br>
    pattern设置验证规则：<input type="tel" name="tel" required pattern="^(\+86)?1[5378]\d{9}$"><br>
    multiple多文件选择：<input type="file" multiple><br>
    <input type="submit" value="提交"/>
</form>
```

### 表单的输入类型
1. email：输入email格式，有验证，但是不够完整
2. tel：手机号码，没有默认的验证
3. url：只能输入url格式
4. number：只能输入数字
5. search：搜索框
6. range：范围，可以进行拖动，通过value进行取值
7. color：拾色器，通过value进行取值
8. time：时间
9. date：日期，不是绝对的
10. datetime：时间日期，大部分浏览器都不支持，在移动端支持
11. month：月份
12. week：星期

### 表单新增的事件
1. oninput 用户输入内容时触发，可用于移动端输入字数统计
2. oninvalid 验证不通过时触发

### 音频播放
1. autoplay：如果出现该属性，则音频在就绪后马上播放
2. controls：如果出现该属性，则向用户显示控件，比如播放按钮
3. loop：如果出现该属性，则每当音频结束时重新开始播放
4. preload：如果出现该属性，则音频在页面加载时进行加载，并预备播放。如果使用 "autoplay"，则忽略该属性。
5. src：要播放的音频的 URL
```
<audio src="../mp3/a.mp3" controls autoplay loop></audio>
```

### 视频播放
1. autoplay：如果出现该属性，则视频在就绪后马上播放
2. controls：如果出现该属性，则向用户显示控件，比如播放按钮
3. height：设置视频播放器的高度
4. loop：如果出现该属性，则当媒介文件完成播放后再次开始播放
5. preload：如果出现该属性，则视频在页面加载时进行加载，并预备播放。如果使用 "autoplay"，则忽略该属性
6. src：要播放的视频的 URL
7. width：设置视频播放器的宽度
```
<video src="../mp3/b.mp4" controls></video>
```

### DOM扩展
1. document.getElementsByClassName ('class')
2. document.querySelector('selector')
3. document.querySelectorAll('selector')
4. Node.classList.add('class') 
5. Node.classList.remove('class')
6. Node.classList.toggle('class')
7. Node.classList.contains('class')
8. Node.dataset['myName']

## HTML5
### 多媒体
1. 常用方法：
- load()：加载
- play()：播放
- pause()：暂停
2. jQuery没有提供对视频播放控件的方式，操作视频播放，要使用原生的JS
3. 常用属性：
- currentTime：视频播放的当前进度
- duration：视频总时间
- paused：视频播放的状态
4. 常用事件
- oncanplay：事件在用户可以开始播放视频/音频时触发
- ontimeupdate：通过该事件报告当前的播放进度
- onended：播放完时触发--重置

### 视频播放案例
```
var myVideo=document.querySelector('video');
var mySwitch=document.querySelector('.switch');
// 为播放/暂停按钮添加点击事件
mySwitch.addEventListener('click', function(){
  if(myVideo.paused){
    myVideo.play();
    mySwitch.classList.remove('.fa-play');
    mySwitch.classList.add("fa-pause");
  }else{
    myVideo.pause();
    mySwitch.classList.remove("fa-pause");
    mySwitch.classList.add("fa-play");
  }
}, false);
// 设置全屏
var expand=document.querySelector('.expand');
expand.addEventListener('click',function(){
  if(myVideo.webkitRequestFullScreen){
    myVideo.webkitRequestFullScreen();
  }else if(myVideo.requestFullScreen){
    myVideo.requestFullScreen();
  }else if(myVideo.mozRequestFullScreen){
    myVideo.mozRequestFullScreen();
  }else if(myVideo.oRequestFullScreen){
    myVideo.oRequestFullScreen();
  }
},false);
// 当视频可以进行播放的时候，会触发oncanplay事件
myVideo.addEventListener('canplay',function(){
  // 让视频显示出来
  setTimeout(function(){
    myVideo.style.display="block";
    // 获取视频的总时间
    var totalTime=myVideo.duration;
    document.querySelector('.totalTime').innerHTML=getTime(totalTime) ;
  }, 2000);
},false);
// 设置播放的时间，播放时，会触发ontimeupdate事件
myVideo.addEventListener('timeupdate',function(){
  // 获取当前播放的时间
  var currentTime = myVideo.currentTime;
  document.querySelector('.currentTime').innerHTML=getTime(currentTime);
  // 模拟进度条
  document.querySelector(".elapse").style.width=currentTime/myVideo.duration*100+"%";
},false);
function getTime(time){
  var hour=~~(time/3600);
  var minute=~~(time%3600/60);
  var second=~~(time%60);
  hour=hour<10?'0'+hour:hour;
  minute=minute<10?'0'+minute:minute;
  second=second<10?'0'+second:second;
  return hour+":"+minute+":"+second;
}
```

### 地理定位
1. 获取地理信息的方式
- IP地址
- 三维坐标
    + GPS
    + Wi-Fi
    + 手机信号
- 用户自定义数据
2. API说明
- navigator.getCurrentPosition(successCallback, errorCallback, options)获取当前地理信息
- navigator.watchPosition(successCallback, errorCallback, options)重复获取当前地理信息
- 当成功获取地理信息后，会调用succssCallback，并返回一个包含位置信息的对象position。Coords(坐标)
- position.coords.latitude纬度
- position.coords.longitude经度
- 当获取地理信息失败后，会调用errorCallback，并返回错误信息error
- 可选参数 options 对象可以调整位置信息数据收集方式

### 拖拽
1. 在拖动目标上触发的事件(源元素)
- ondragstart：用户开始拖动元素时触发
- ondrag：元素正在拖放时触发
- ondragend：用户完成元素拖动后触发
2. 释放目标时触发的事件(当拖拽元素在目标容器上进行操作的时候)
- ondragenter：当鼠标拖放的对象进入其容器范围的时候触发
- ondragover：当鼠标拖放到的对象在另一对象容器范围内拖动时进行触发此事件
- omdragleave：当鼠标拖放的对象离开其容器范围时触发
- ondrop：在一个拖动过程中，释放鼠标键时触发此事件
3. 在拖动元素时，每隔350毫秒会触发ondrag事件
4. 为了可以让元素可以拖动，需要使用HTML5 draggable 属性
5. 链接和图片默认是可以拖动的，不需要 draggable 属性
6. 可以添加addEventListener来添加拖拽相关的事件
7. 事件源：触发事件源，一般情况下我们将会相同操作的多个对象绑定到同一个处理事件，同时传递当前的对象到处理方法，这就是事件源参数

### 拖拽案例
```
<div class="div1">
  <!--draggable="true":说明可以拖动 false:说明不能进行拖动-->
  <p draggable="true" id="p1">把我拖动吧</p>
  <p draggable="true" id="p2">也把我拖动吧</p>
  <p draggable="true" id="p3">别动我</p>
</div>
<div class="div2"></div>
<div class="div3"></div>
<script>
// 开始拖拽
document.addEventListener('dragstart', function(e) {
  // 设置当前目标元素的透明度，产生拖拽效果
  getEventTarget(e).style.opacity = 0.4;
  // 将当前的被拖拽元素的id号存储到事件源对象中
  e.dataTransfer.setData("key", e.target.id);
});
// 拖拽进行中
document.addEventListener('drag', function(e) {
  getEventTarget(e).parentNode.style.borderColor = 'blue';
});
// 拖拽结束
document.addEventListener('dragend', function(e) {
  getEventTarget(e).style.opacity = 1;
  getEventTarget(e).parentNode.style.borderColor = 'red';
});
// 下面几个方法的事件源是目标元素，而不是拖拽的元素
// 将当前元素拖拽到另一个元素上时触发
document.addEventListener('dragenter', function(e) {
  if (getEventTarget(e).className == 'div2') {
    getEventTarget(e).style.borderColor = 'pink';
  } else if (getEventTarget(e).className == 'div1') {
    getEventTarget(e).style.borderColor = 'red';
  }
});
// 拖拽元素在目标元素上移动时触发
document.addEventListener('dragover', function(e) {
  // 默认情况下，一个元素不能拖拽到另一个元素内，如果想允许拖拽，必须阻止默认的冒泡事件
  e = e || window.event;
  e.preventDefault();
  e.stopPropagation();
});
// 当拖拽元素离开目标元素时触发
document.addEventListener('dragleave', function(e) {
  getEventTarget(e).style.borderColor = 'blue';
});
// 当拖拽元素在目标元素上松开时触发
document.addEventListener('drop', function(e) {
  // 获取被拖拽的元素
  var id = e.dataTransfer.getData("key");
  // 追加被拖拽元素到目标元素
  getEventTarget(e).appendChild(document.getElementById(id));
});
// 处理事件对象以及目标元素
function getEventTarget(e) {  
　e = e || window.event;  
　return e.target || e.srcElement;  
}  
</script>
```

### Web存储
1. document.cookie来进行存储，但是储存大小只有4K左右，并且解析相当复杂
2. HTML5提供的解决方案：window.sessionStorage、window.localStorage
3. 设置读取比较方便
4. sessionStorage约5M，localStorage约20M
5. 只能存储字符串，可以将对象JSON.stringify()编码后存储
6. window.sessionStorage的使用
- 特点
    + 生命周期为关闭浏览器窗口：相当于存储在当前页面的内存中
    + 在同一个窗口下数据可以共享(在当前页面可以获取得到，在另一个页面下不能获取到)
- 方法介绍：(两种存储方式的方法一致)
    + setItem(key,value):设置数据，以键值对的方式
    + getItem(key):通过指定的键获取对应的值内容
    + removeItem(key):删除指定的key及对应的值内容
    + clear():清空所有存储内容
7. window.localStorage的使用
- 特点
    + 永久生效，除非手动删除：存储在硬盘上
    + 可以多窗口共享

### 应用缓存
1. 使用 HTML5，通过创建 cache manifest 文件，可以轻松地创建 web 应用的离线版本
2. 应用缓存的优势
- 可配置需要缓存的资源
- 网络无连接应用仍可用
- 本地读取缓存资源，提升访问速度，增强用户体验
- 减少请求，缓解服务器负担
3. Cache Manifest 基础
- 如需启用应用程序缓存，请在文档的 <html> 标签中包含 manifest 属性
```
<!DOCTYPE HTML>
<html manifest="demo.appcache">
...
</html>
```
- 每个指定了 manifest 的页面在用户对其访问时都会被缓存。如果未指定 manifest 属性，则页面不会被缓存（除非在 manifest 文件中直接指定了该页面）
- manifest 文件的建议的文件扩展名是：".appcache"
- 注意，manifest 文件需要配置正确的 MIME-type，即 "text/cache-manifest"。必须在 web 服务器上进行配置
4. Manifest 文件
- 概念：manifest 文件是简单的文本文件，它告知浏览器被缓存的内容（以及不缓存的内容）
- manifest 文件可分为三个部分
    + CACHE MANIFEST - 在此标题下列出的文件将在首次下载后进行缓存，必须放在第一行
    ```
    CACHE MANIFEST
    /theme.css
    /logo.gif
    /main.js
    ```
    + NETWORK - 在此标题下列出的文件需要与服务器的连接，且不会被缓存
    ```
    NETWORK:
    login.asp
    ```
    + FALLBACK - 在此标题下列出的文件规定当页面无法访问时的回退页面（比如 404 页面）
    ```
    FALLBACK:
    /html5/ /404.html
    ```
    + 更新缓存：一旦文件被缓存，则浏览器会继续展示已缓存的版本，即使修改了服务器上的文件。为了确保浏览器更新缓存，也需要更新 manifest 文件，也就意味着一旦应用被缓存，它就会保持缓存直到发生：
        * 用户清空浏览器缓存
        * manifest 文件被修改
        * 由程序来更新应用缓存
        * 更新注释行中的日期和版本号是一种使浏览器重新缓存文件的办法

### 网络状态
1. window.online用户网络连接时被调用
2. window.offline用户网络断开时被调用
