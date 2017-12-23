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
 

INSTALLATION
------------
Скачайте репозиторий.

SQL TABLES INSTALLATION
-----------------------
Создайте новую БД и примените этот код

```
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `ip` varchar(45) NOT NULL,
  `user_agent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `statuses` (`id`, `status`) VALUES
(1, 'new'),
(2, 'approved'),
(3, 'hide');

-- --------------------------------------------------------

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);
  
ALTER TABLE `messages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `statuses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`status`) REFERENCES `statuses` (`id`);

ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
```

VERSION
-------
1.0 - beta