# 🛠️ Лабораторная работа №2: Введение в PHP

Добро пожаловать в описание лабораторной работы №2! В этой работе мы познакомились с базовыми возможностями языка PHP, включая арифметические операции, типы данных, использование PHPDoc, а также интеграцию PHP и HTML.

---

## 🎯 Цель

Изучить основы PHP, включая:

- Различия между `echo` и `print`.
- Использование переменных.
- Выполнение арифметических операций.
- Типы данных в PHP.
- Интеграцию PHP и HTML.
- Форматирование кода и документация с PHPDoc.

---

## 🖥️ Подготовка среды

### 📂 Создание папки проекта

- Создайте директорию для лабораторной работы.
- Главный файл: `index.php`.

### 🚀 Запуск сервера

1. **OpenServer**:
    - Сохраните файл в папке `www/domains/localhost`.
    - Откройте в браузере: `http://localhost/название_папки/`.
2. **Встроенный сервер PHP**:
    - Выполните команду:
      ```bash
      php -S localhost:8000
      ```
    - Откройте в браузере: `http://localhost:8000/`.

### 🛠️ Инструменты

- Рекомендуемые IDE: Visual Studio Code, PhpStorm.

---

## ✏️ Выполнение работы

### 1️⃣ Разница между `echo` и `print`

- Пример кода:
  ```php
  echo "Это сообщение выведено с помощью echo.<br>";
  print "Это сообщение выведено с помощью print.<br>";
  ```
- **Особенности:**
    - `echo` поддерживает несколько параметров.
    - `print` возвращает значение `1`.

### 2️⃣ Работа с переменными

- Создание переменных:
  ```php
  $days = 288;
  $message = "Все возвращаются на работу!";
  ```
- Вывод значений:
    - Конкатенация:
      ```php
      echo "В " . $days . " день, приблизительно ... " . $message . "<br>";
      ```
    - Использование двойных кавычек:
      ```php
      echo "В $days день, приблизительно ... $message<br>";
      ```

### 3️⃣ Арифметические операции

- Переменные:
  ```php
  $a = 10;
  $b = 5;
  ```
- Операции:
  ```php
  echo "Сложение: " . ($a + $b) . "<br>";
  echo "Вычитание: " . ($a - $b) . "<br>";
  echo "Умножение: " . ($a * $b) . "<br>";
  echo "Деление: " . ($a / $b) . "<br>";
  echo "Остаток от деления: " . ($a % $b) . "<br>";
  ```

### 4️⃣ Типы данных

- Пример переменных:
  ```php
  $intVar = 42;
  $floatVar = 3.14;
  $stringVar = "Привет, PHP!";
  $boolVar = true;
  ```
- Использование `var_dump`:
  ```php
  var_dump($intVar);
  var_dump($floatVar);
  var_dump($stringVar);
  var_dump($boolVar);
  ```

### 5️⃣ Интеграция PHP и HTML

- Пример страницы:
  ```html
  <!DOCTYPE html>
  <html lang="ru">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Интеграция PHP и HTML</title>
  </head>
  <body>
      <h1>Добро пожаловать, <?php echo "гость"; ?>!</h1>
      <p>Сегодня: <?php echo date("Y-m-d"); ?></p>
  </body>
  </html>
  ```

### 6️⃣ Вывод стиха

- Пример с сохранением форматирования:
  ```php
  echo "<pre>
  <b>\"Я вас любил: любовь еще, быть может…\" - А.С. Пушкин (1829 г.)</b>
  Я вас любил: любовь еще, быть может,
  В душе моей угасла не совсем;
  Но пусть она вас больше не тревожит;
  Я не хочу печалить вас ничем.
  Я вас любил безмолвно, безнадежно,
  То робостью, то ревностью томим;
  Я вас любил так искренно, так нежно,
  Как дай вам Бог любимой быть другим.
  </pre>";
  ```

---

## 🖼️ Скриншоты и примеры


---

## 📚 Использованные источники

- [PHP Documentation](https://www.php.net)
- Материалы курса по PHP.