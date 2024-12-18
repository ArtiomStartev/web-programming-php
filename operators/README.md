# 🛠️ Лабораторная работа №3: Использование операторов и условных конструкций

Добро пожаловать в описание лабораторной работы №3! В этой работе мы изучили применение условных конструкций `if`, `switch` и тернарного оператора, а также научитесь использовать функции для работы с датами.

---

## 🎯 Цель

- Познакомиться с оператором `if`, тернарным оператором и оператором `switch`.
- Научиться анализировать работу условных конструкций.
- Применять функции для обработки даты.

---

## 🖥️ Подготовка среды

1. Создайте файл `index.php` в директории проекта.
2. Убедитесь, что у вас установлен веб-сервер (например, OpenServer или встроенный PHP-сервер).
3. Для запуска используйте одну из команд:
    - OpenServer: сохраните файл в папке `www/domains/localhost`. Откройте в браузере: `http://localhost/название_папки/`.
    - Встроенный сервер PHP:
      ```bash
      php -S localhost:8000
      ```
      Откройте в браузере: `http://localhost:8000/`.
4. Рекомендуемые инструменты: Visual Studio Code, PhpStorm.

---

## ✏️ Выполнение работы

### 1️⃣ Задание 1: Работа с переменными

#### Анализ скрипта
- **Что делают переменные `$lastName`, `$firstName` и `$age`?**
  Переменные используются для хранения информации о фамилии, имени и возрасте клиента. Значения задаются напрямую в коде.

- **Как выполняется вывод данных?**
  Вывод осуществляется с использованием операторов `echo` и `print`. `echo` выводит строку с конкатенацией переменных, а `print` используется для отображения строки с возрастом клиента.

Создайте переменные `$lastName`, `$firstName` и `$age`. Выведите их значения:
```php
$lastName = 'Ivanov';
$firstName = 'Nikolai';
$age = 30;

echo "Client's last name is $lastName, and their first name is $firstName.";
print "<br>Client's age is $age.";
```

### 2️⃣ Задание 2: Условные конструкции

- Проверьте текущий день недели с помощью `date()` и выведите сообщение:
  ```php
  $currentDay = date("w");
  
  if ($currentDay == 5) { // 5: Friday
    echo "<br>Have a great weekend!";
  } elseif ($currentDay == 0) { // 0: Sunday
    echo "<br>Tomorrow starts a new work week!";
  } else {
    echo "<br>Have a productive workday!";
  }
  ```
- Замените условие на тернарный оператор:
  ```php
  echo ($currentDay == 5) ? "<br>Have a great weekend!" : (($currentDay == 0) ? "<br>Tomorrow starts a new work week!" : "<br>Have a productive workday!");
  ```

### 3️⃣ Задание 3: Использование `if` и тернарного оператора

#### Анализ скрипта
- **Что реализуют условные конструкции `if` и тернарный оператор?**
  Условные конструкции `if` позволяют выполнять блоки кода в зависимости от заданных условий. Тернарный оператор выполняет ту же функцию, но в более компактной форме.

- **Какое значение принимает `$message`?**
  Значение `$message` зависит от значения переменной `$age`. Например, если `$age = 22`, то `$message` примет значение: "you are in your prime... get to work!".

- Создайте условие для вывода сообщения в зависимости от возраста:
  ```php
  $age = 22;
  $name = "Anna";

  if ($age > 12 && $age < 20) {
      $message = "you are a teenager!";
  } elseif ($age > 40) {
      $message = "you are an adult!";
  } else {
      $message = "you are in your prime... get to work!";
  }

  echo $name ? "$name, $message" : "Anonymous, $message";
  ```

### 4️⃣ Задание 4: Использование `switch`

- Проверьте текущий день недели с помощью `switch` и выведите сообщение:
  ```php
  $day = date("w");
  
  switch ($day) {
    case 0:
        echo "<br>Today is Sunday, ".date("d.m.Y");
        break;
    case 1:
        echo "<br>Today is Monday, ".date("d.m.Y");
        break;
    case 2:
        echo "<br>Today is Tuesday, ".date("d.m.Y");
        break;
    case 3:
        echo "<br>Today is Wednesday, ".date("d.m.Y");
        break;
    case 4:
        echo "<br>Today is Thursday, ".date("d.m.Y");
        break;
    case 5:
        echo "<br>Today is Friday, ".date("d.m.Y");
        break;
    case 6:
        echo "<br>Today is Saturday, ".date("d.m.Y");
        break;
    default:
        echo "<br>Unknown day";
  }
  ```

### 5️⃣ Задание 5: Таблица расписания

- Создайте таблицу с графиком работы:
  ```php
  $johnSchedule = (in_array($day, [1, 3, 5])) ? "8:00-12:00" : "Нерабочий день";
  $janeSchedule = (in_array($day, [2, 4, 6])) ? "12:00-16:00" : "Нерабочий день";

  echo "<br><table border='1'>
  <tr>
      <th>№</th>
      <th>Фамилия Имя</th>
      <th>График работы</th>
  </tr>
  <tr>
      <td>1</td>
      <td>John Styles</td>
      <td>$johnSchedule</td>
  </tr>
  <tr>
      <td>2</td>
      <td>Jane Doe</td>
      <td>$janeSchedule</td>
  </tr>
  </table>";
  ```

---

## 🖼️ Скриншоты и примеры

---

## 📚 Использованные источники

- [PHP Documentation](https://www.php.net)
- Материалы курса по PHP.