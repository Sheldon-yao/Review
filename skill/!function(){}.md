### jQuery源码!function(){}原理
+function(){}和!function(){}是因为js里function(){}可以被解析为函数声明和函数表达式，而且是会优先解析为函数声明。使用+或!是为了让解释器将function(){}解析为函数表达式。