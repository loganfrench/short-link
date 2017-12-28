# short-link
Простая сокращалка с данными о ссылках

# Подключение

1. В файле `config/mysql.php` изменить данные на подключение к базе данных MySQL (MariaDB)
2. Создаем таблицу в базе данных

```mysql
CREATE TABLE `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` text,
  `key` varchar(32) DEFAULT NULL,
  `by` varchar(48) DEFAULT NULL,
  `views` int(11) NOT NULL,
  `created` varchar(24) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8_general_ci;
```

* Либо импортируем файл db.sql
# Использование

1. Вставляете ссылку в поле
![](img-gh/img-1.png)

2. Просматриваете статистику ссылки
![](img-gh/img-2.png)


