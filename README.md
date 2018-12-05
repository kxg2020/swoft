## Introduction

sale-api-service

说明：

php版本：7.2.12，cli模式即可，不用安装fpm

php扩展：pdo_mysql，redis（扩展版本4.0.0），swoole(swoole版本：4.2.8，编译需加 --enable-mysqlnd --enable-openssl选项)
      
    注：swoole编译前需要系统支持hiredis，地址：https://github.com/redis/hiredis/archive/v0.13.3.tar.gz，make install后要ldconfig使生效
    
启动命令：当前目录在sale-api时    php bin/swoft start （加-d可以守护进程启动）
    
    注：启动前，复制.env.example到当前目录，命名为.env

监听端口 8080

建议用supervisor启动服务，防止进程意外退出
    
