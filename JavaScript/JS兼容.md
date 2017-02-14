### 视频全屏
```
if(myVideo.webkitRequestFullScreen){
  myVideo.webkitRequestFullScreen();
}else if(myVideo.requestFullScreen){
  myVideo.requestFullScreen();
}else if(myVideo.mozRequestFullScreen){
  myVideo.mozRequestFullScreen();
}else if(myVideo.oRequestFullScreen){
  myVideo.oRequestFullScreen();
}
```

### 处理事件对象以及目标元素
```
function getEventTarget(e) {  
　e = e || window.event;  
　return e.target || e.srcElement;  
}  
```