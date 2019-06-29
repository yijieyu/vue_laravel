laravel+vuejs开发的 遇到的坑

> npm 换 淘宝镜像：npm install -g cnpm --registry=https://registry.npm.taobao.org

> 安装gulp和laravel-elixir
需要安装python。只支持2.7 不支持python 3.*
使用命令 ：npm install --global --production windows-build-tools
然后使用 npm install --global node-gyp

>package 包版本更新
 使用npm-check 管理版本，更新包的同时还能更新package.json 文件的版本号
 安装 cnpm install -g npm-check
 更新命令 npm-check -u 使用的npm install 安装
 现在使用cnpm来安装
 使用 set NPM_CHECK_INSTALLER=cnpm 代替npm 
 但是这个变量设置只在此窗口有效，关闭窗口后消失，set NPM_CHECK_INSTALLER=cnpm变为undefine
 避免全局污染
 更新 npm-check -u
 来源地址 https://segmentfault.com/a/1190000011085967
 Path "C:\Users\Administrator\AppData\Roaming\npm\node_modules" does not exis
 在创建此目录就行了
 
> yarn也是一个包管理

> composer安装 laravel框架
安装dingo/api 需要php7 以上。 需要安装 php 的composer.phar 
需要安装php7 -- phpsduty
1、下载安装脚本 － composer-setup.php － 到当前目录。
php的目录 -r "copy('https://install.phpcomposer.com/installer', 'composer-setup.php');"
E:\phpStudy\php\php-7.0.12-nts\php.exe -r "copy('https://install.phpcomposer.com/installer', 'composer-setup.php');"
2、执行安装过程。composer-setup.php
E:\phpStudy\php\php-7.0.12-nts\php.exe composer-setup.php
3、删除安装脚本。composer-setup.php
E:\phpStudy\php\php-7.0.12-nts\php.exe -r "unlink('composer-setup.php');"
到项目下面 E:\phpStudy\php\php-7.0.12-nts\composer.phar update



