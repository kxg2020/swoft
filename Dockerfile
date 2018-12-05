FROM registry.cn-hangzhou.aliyuncs.com/xinchao-test/php:7.1.16-swoole
ADD ./ /data/wwwroot/
ENV ACTION test
WORKDIR /data/wwwroot
ENTRYPOINT rm -rf .env && cp .env.$ACTION .env && chown -R www.www /data/wwwroot && php /data/wwwroot/bin/swoft start