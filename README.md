Guest Book pure PHP
============================

Гостевая книга написанная на чистом PHP, без применения ООП, только функции.<br>
Админ панель для администрирования сообщений доступна по адресу <your_domain>/admin<br>
<br>
<br>
Для правильной работы маршрутизации <b>!в админке</b> добавьте настройки сервера
<ul>
<li>Apache .htacces в папку admin/

```
RewriteEngine on

# if a directory or a file exists, use it directly
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

RewriteRule ^(.*) index\.php/admin?page=$1
```
</li>

<li>пример настроек для Nginx

```
location /admin/ {
    rewrite ^/admin/(.*)$ /admin/index.php?page=$1;
}

location ~ \.css {
    add_header  Content-Type    text/css;
}

location ~ \.js {
    add_header  Content-Type    application/x-javascript;
}
```
</li>
</ul>
 В качестве сторонних библиотек использовались:
 <ul>
    <li>Bootstrap 4</li>
    <li>Admin LTE CSS template</li>
    <li>CKeditor</li>
 </ul>
 
 Links
 -----
 <b>[Live Demo](http://gbook.kvushco.xyz)</b>

INSTALLATION
------------
Download from github или fork it.

VERSION
-------
1.0 - beta