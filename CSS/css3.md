## CSS3
### 属性选择器
1. E[attr] 表示存在attr属性即可
2. E[attr=val] 表示属性值完全等于val
3. E[attr*=val] 表示的属性值里包含val字符并且在“任意”位置
4. E[attr^=val] 表示的属性值里包含val字符并且在“开始”位置
5. E[attr$=val] 表示的属性值里包含val字符并且在“结束”位置

### 伪类选择器
1. a:hover  a:link  a:active  a:visited
2. E:first-child:第一个子元素，必须是E标签，且E标签必须在第一个才能获取的到
3. E:last-child:最后一个子元素，和上面的相似
4. E:nth-child(n): 第n个子元素，索引从1开始，如果前面有非E的标签，也会算其索引
5. E:nth-last-child(n): 同E:nth-child(n) 相似，只是倒着计算
6. E:nth-child(even): 所有的偶数
7. E:nth-child(odd): 所有的奇数
8. E:empty：选中没有任何子节点的E元素，注意，空格也算子元素
9. E:target：结合锚点进行使用，处于当前锚点的元素会被选中
10. E:nth-of-type(n)：不包括除了E的元素

### 伪元素选择器
1. E::before、E::after
    - 是一个行内元素，需要转换成块:display:block
    - 必须添加content,哪怕不设置内容，也需要content:""
    - IE6、IE7与IE8（怪异模式Quirks mode）不支持此伪元素
2. E::first-letter文本的第一个字母或字(不是词组)
3. E::first-line 文本第一行
4. E::selection 可改变选中文本的样式

### 颜色设置
1. RGBA(R,G,B,A)：红、绿、蓝、透明度
2. HSLA(H,S,L,A)：色调、饱和度、亮度、透明度

### 透明
1. opacity：针对整个盒子设置透明度，具有继承性
2. rgba：没有继承
3. transparent：完全透明

### 文本阴影
```
// x y blur color，x正值时阴影向右偏移，y正值时向下偏移，blur越大越模糊。不能为负值
text-shadow:2px 3px 2px rgba(255,255,0),3px 4px 3px rgba(255,255,0);
```

### 盒模型
1. 正常情况下盒子的宽度=padding+border+width
2. 这样很容易造成网页中的元素错位
3. 可以通过box-sizing来指定盒模型
    - content-box:width+border+padding
    - border-box:width，即使定义有padding和border不会改变盒模型的实际宽度
4. IE8及以上版本支持该属性，Firefox 需要加上浏览器厂商前缀-moz-，对于低版本的IOS和Android浏览器也需要加上-webkit-

### 边框和圆角
1. border-radius
2. border-top-left-radius

### 边框阴影
1. box-shadow: h-shadow v-shadow blur spread color inset
2. h-shadow：必需。水平阴影的位置。允许负值。
3. v-shadow：必需。垂直阴影的位置。允许负值。
4. blur：可选。模糊距离。
5. spread：可选。阴影的尺寸。值越大，阴影的扩散面积越大。
6. color：可选。阴影的颜色。
7. inset：可选。将外部阴影 (outset) 改为内部阴影。
8. 要兼容需加前缀

### 边框图片
1. border-image-source：用在边框的图片的路径。
2. border-image-slice：图片边框向内偏移。
3. border-image-width：图片边框的宽度。
4. border-image-outset：边框图像区域超出边框的量。
5. border-image-repeat：图像边框是否应平铺(repeated)、铺满(rounded)或拉伸(stretched)。
```
/*按钮背景作为文章背景或者长按钮变成短按钮*/
.box{
    /*设置图片要显示的区域样式*/
    /*设置图片边框背景*/
    border-image: url("../images/btn_bg.png");
    /*设置裁切区域，同时设置填充模式*/
    border-image-slice: 10 fill;
    /*设置边框的大小，这个一般与裁切区域大小一致，否则就发生缩放*/
    border-image-width: 10px;
    /*设置边框的重复模式，如果变成大背景，要将裁切下来的图片进行拉伸stretch*/
    border-image-repeat: round;
}
```
```
div{
    width:400px;
    height: auto;
    margin:100px auto;
    background-color: #ccc;
    border: 5px solid red;
    border-image-source: url("../images/border.png");
    /*设置水平和垂直方向的裁切，注意没有单位，如果是四个值，则从左上角开始，顺时针对应*/
    border-image-slice: 27 27;
    /*图片边框的宽度*/
    border-image-width: 15px;
    /*图片边框的延伸值*/
    border-image-outset: 10px;
    /*图片边框是否重复*/
    border-image-repeat: stretch;
}
```

### 图片裁切原理
1. ![原图](./images/border.png)
2. 将图片裁切27px`border-image-slice: 27 27`
3. ![裁切](./images/裁切.png)
4. 只给边框留有5px的位置`border: 5px solid red;`
5. 将9宫格的四个角放置在留出来的边框的位置，按照边框的比例进行了缩放`border-image-repeat: stretch;`
6. 边框中剩下的地方由9宫格剩下的几块来填充，中间内容不用填充9宫格的块块
7. ![放置在边框中](./images/放置在边框中.png)
8. 将图片向外延伸10px`border-image-outset: 10px;`
9. ![边框图片向外延伸](./images/边框图片向外延伸.png)
10. 那么边框就拥有15px的宽度，这15px的距离由9宫格中除了四个角的位置的其他部分填充，9宫格的中间部分已经裁切掉了`border-image-width: 15px;`
11. ![图片边框的宽度](./images/图片边框的宽度.png)

### 渐变
1. linear-gradient线性渐变
```
background: linear-gradient(0deg,red,orange,yellow,green,#00ffff,blue,purple);
```
2. radial-gradient径向渐变
```
background: radial-gradient(circle at center,red,blue);
// shape:ellipse表示椭圆形，circle表示圆形
// size:losest-side：最近边； farthest-side：最远边； closest-corner：最近角； farthest-corner：最远角
```

### 文本换行
```
word-break:break-all;
```

### 渐变动画
```
div{
    width: 100px;
    height: 700px;
    margin: 50px auto;
    background: linear-gradient(-45deg,white 0%,white 25%,black 25%,black 50%,white 50%,white 75%,black 75%);
    background-size: 100px 100px;
    animation: move 2s linear infinite;
}
@keyframes move {
    from{
        background-position: 0px 0px;
    }
    to{
        background-position: 0px 100px;
    }
}
```

### background-size属性
1. background-size: auto(原始图片大小) || number(数值) || percentage(百分比) || cover(放大铺满) || contain(缩小铺满)
2. auto：此值为默认值，保持背景图片的原始高度和宽度
3. number：此值设置具体的值，可以改变背景图片的大小
4. percentage：此值为百分值，可以是0%~100%之间任何值，但此值只能应用在块元素上，所设置百分值将使用背景图片大小根据所在元素的宽度的百分比来计算
5. cover：此值是将图片放大，以适合铺满整个容器，这个主要运用在，当图片小于容器时，又无法使用background-repeat来实现时，我们就可以采用cover;将背景图片放大到适合容器的大小，但这种方法会使用背景图片失真
6. contain：此值刚好与cover相反，其主要是将背景图片缩小，以适合铺满整个容器，这个主要运用在，当背景图片大于元素容器时，而又需要将背景图片全部显示出来，此时我们就可以使用contain将图片缩小到适合容器大小为止，这种方法同样会使用图片失真
7. 当background-size取值为number和percentage时可以设置两个值，也可以设置一个值，当只取一个值时，第二个值相当于auto，但这里的auto并不会使背景图片的高度保持自己原始高度，而是会参照第一个参数值进行等比例缩放
![backgroundsize](./images/backgroundsize.png)

### background-origin
1. padding-box：背景图像相对于内边距框来定位。
2. border-box：背景图像相对于边框盒来定位。
3. content-box：背景图像相对于内容框来定位。

### background-clip
1. border-box：背景被裁剪到边框盒。
2. padding-box：背景被裁剪到内边距框。
3. content-box：背景被裁剪到内容框。

### 精灵图的使用
为块设置精灵图背景，需要更大的展示区域，能够以更大的范围响应用户的需求，但是只需要显示指定的背景图片
```
.icon_list{
    width: 44px;
    height: 40px;
    display: block;
    margin: 100px auto;
    box-sizing: border-box;
    border: 1px solid #000;
    /*设置背景*/
    background-image: url("../images/sprites.png");
    background-repeat: no-repeat;
    /*设置偏移*/
    background-position: -21px 0;
    /*设置padding*/
    padding:10px 12px;
    /*设置背景开始填充的位置*/
    background-origin: content-box;
    /*裁切：虽然是设置裁切，但是控制的是显示。就是设置最终显示那些区域*/
    background-clip: content-box;
}
```
1. 设置图片要显示的大小，包括预留的空白空间
2. 设置为块级元素
3. 设置图片的背景图片
4. 因为精灵图由很多小图片合成，选择你要显示的小图标
5. 设置精灵图的偏移位置
6. 给精灵图预留好空出来的位置，设置内填充
7. 设置背景图开始填充的位置，这里只有width的部分
8. 对图片进行裁切，控制的是显示我们最终需要的那部分

### 过渡
1. transition-property：规定设置过渡效果的 CSS 属性的名称。
2. transition-duration：规定完成过渡效果需要多少秒或毫秒。
3. transition-timing-function：规定速度效果的速度曲线。
    - linear规定以相同速度开始至结束的过渡效果
    - ease规定慢速开始，然后变快，然后慢速结束的过渡效果
    - ease-in规定以慢速开始的过渡效果
    - ease-out规定以慢速结束的过渡效果
    - ease-in-out规定以慢速开始和结束的过渡效果
    - cubic-bezier在 cubic-bezier 函数中定义自己的值。可能的值是 0 至 1 之间的数值
4. transition-delay：定义过渡效果何时开始。
5. 有兼容问题
6. 过渡效果必须是一个确定的值到另外一个确定的值

### 2D转换
通过CSS3 transform转换，我们能够对元素进行移动、缩放、转动、拉长或拉伸
1. translate(tx)  | translate(tx,ty) | translateX(tx) | translateY(ty)
2. scale(sx|ty)  | scale(sx,sy) | scaleX(sx) | scaleY(sy)
3. rotate(a)正顺负逆
4. skew(ax)  |  skew(ax,ay) | skewX(sx) | skewY(sy)
5. transform-origin: 0px 0px;允许你改变被转换元素的位置

### 3D转换
1. translate3d(x,y,z)
2. scale3d(number,number,number)
3. rotate3d(x,y,z,angle)
4. 透视/景深效果
    - perspective(length) 为一个元素设置三维透视的距离，作用于元素的后代，不是其本身。假如小立方体长宽高都是200px，如果perspective<200px，那么就相当于站在盒子里面看结果，如果perspective非常大就是站在非常远的地方看。
    - perspective-origin属性规定了镜头在平面上的位置。默认是放在元素的中心
    - transform-style：使被转换的子元素保留其 3D 转换(需要设置在父元素中)
        + flat：子元素将不保留其 3D 位置-平面方式
        + preserve-3d：子元素将保留其 3D 位置—立体方式

### 动画
1. animation样式常用属性
    - 动画序列的名称:animation-name: move;
    - 动画的持续时间:animation-duration: 1s;
    - 动画的延时:animation-delay: 1s;
    - 播放状态:animation-play-state: paused;
    - 播放速度:animation-timing-function: linear;
    - 播放次数 反复:animation-iteration-count: 1;
    - 动画播放完结后的状态:animation-fill-mode: forwards;
    - 循环播放时，交叉动画:animation-direction: alternate;
2. 步骤
    - 添加动画
    ```
    @keyframes rotateAni {
        0%{
            /*可以同时对多个属性添加动画效果*/
            transform: rotate(0deg) scale(1);
        }
        50%{
            transform: rotate(180deg) scale(2);
        }
        100%{
            transform: rotate(360deg) scale(1);
        }
    }
    ```
    - 应用动画
    ```
    div:hover > img{
        /*动画名称-自定义*/
        animation-name: rotateAni;
        /*动画时间*/
        animation-duration: 1s;
        /*动画速率曲线： linear：匀速  ease：动画以低速开始，然后加快，在结束前变慢  ease-in：动画以低速开始  ease-out：动画以低速结束  ease-in-out：动画以低速开始和结束*/
        animation-timing-function: linear;
        /*动画播放次数*/
        animation-iteration-count: 4;
        /*动画时间延迟*/
        animation-delay: 0s;
        /*动画播放完的状态：  forwards:保持动画播放完毕后的状态 backwards:退回到原始状态(默认值)*/
        animation-fill-mode: forwards;
        /*动画是否轮流反射播放：  alternate:在规定的次数内轮流反射播放  normal:正常播放*/
        /*animation-direction: alternate;*/
    }
    div:active >img{
        /*动画的当前播放状态：  paused：暂停  running:运行*/
        animation-play-state: paused;
    }
    ```

### 列布局
1. column-count: 属性设置列的具体个数
2. column-width: 属性控制列的宽度
3. column-gap: 两列之间的缝隙间隔
4. column-rule: 规定列之间的宽度、样式和颜色
5. column-span: 规定元素应横跨多少列(n:指定跨n列  all:跨所有列)

### 伸缩布局
1. display:flex;盒子里面的所有子元素都会自动的变成伸缩项
2. justify-content:flex-start | flex-end | center | space-between | space-around
    - flex-start：弹性盒子元素将向行起始位置对齐
    - flex-end：弹性盒子元素将向行结束位置对齐
    - center：弹性盒子元素将向行中间位置对齐
    - space-between：弹性盒子元素会平均地分布在行里
    - space-around：弹性盒子元素会平均地分布在行里，两端保留子元素与子元素之间间距大小的一半
3. flex-flow:flex-direction+flex-wrap
    - flex-direction：row | row-reverse | column | column-reverse
        + row：主轴与行内轴方向作为默认的书写模式。即横向从左到右排列（左对齐）
        + column：主轴与块轴方向作为默认的书写模式。即纵向从上往下排列（顶对齐）
        + column-reverse：对齐方式与column相反
    - flex-wrap：nowrap | wrap | wrap-reverse
        + nowrap：flex容器为单行。该情况下flex子项可能会溢出容器
        + wrap：flex容器为多行。该情况下flex子项溢出的部分会被放置到新行，子项内部会发生断行
        + wrap-reverse：反转 wrap 排列
4. flex: [flex-grow] [flex-shrink] [flex-basis]
    - flex:1
    - flex:auto，占据剩下的所有的剩余空间

### Web字体
1. TureType(.ttf)格式
2. OpenType(.otf)格式
3. Web Open Font Format(.woff)格式
4. Embedded Open Type(.eot)格式
5. SVG(.svg)格式