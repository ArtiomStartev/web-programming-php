# 🛠️ Лабораторная работа №5: Обработка форм в PHP

Добро пожаловать в описание лабораторной работы №5! В этой работе мы познакомились с глобальной переменной `$_POST`, научились обрабатывать данные из HTML-форм, валидировать ввод, работать с разными элементами управления и сравнивать `$_POST` и `$_REQUEST`.

---

## 🎯 Цель

- Изучить работу с глобальными переменными `$_POST` и `$_SERVER['PHP_SELF']`.
- Научиться валидировать пользовательский ввод: обязательность полей, длина, формат email, запрет цифр в имени, согласие на обработку данных.
- Освоить работу с элементами формы: `input[type=text]`, `input[type=email]`, `input[type=number]`, `select`, `radio`, `checkbox`, `textarea`.
- Разобраться в отличиях `$_POST` и `$_REQUEST`.
- Научиться выводить результаты обработки и проверять заполнение всех полей.
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

### 1️⃣ Задание 1: Работа с `$_POST`

1. В форме метод `POST` и `action="<?= $_SERVER['PHP_SELF'] ?>"`, значит данные отправляются обратно в тот же файл.
2. Выведите блок с результатами только после отправки `(if ($_SERVER['REQUEST_METHOD']==='POST'))`.
3. Валидация:
    - Все поля (name, email, review, comment) обязательны.
    - Email проверяется через filter_var(..., FILTER_VALIDATE_EMAIL).

```php
if ($_SERVER['REQUEST_METHOD']==='POST' && $task==='1') {
    // читаем и валидируем $_POST['name'], $_POST['email'], $_POST['review'], $_POST['comment']
    // накапливаем ошибки в $messages['error1']
    // при отсутствии ошибок формируем $messages['success1']
}
```

<img width="1782" alt="Screenshot 2025-05-14 at 09 30 39" src="https://github.com/user-attachments/assets/9ec79068-8cf5-47fd-83a6-06ca1dc91f6e" />

### 2️⃣ Задание 2: Данные с различных контроллеров

1. Создайте форму «Регистрация на мероприятие» с:
   - `input[type=number]` (возраст).
   - `select` (выбор города).
   - `radio` (формат участия).
   - `checkbox` (подписка на рассылку).

2. В PHP-секции:
   - Проверяем, что возраст задан и корректен (`is_numeric`). 
   - Город — один из списка. 
   - Формат участия — online или offline. 
   - Подписка — логическое значение.

3. Выводим результаты в виде списка из `$messages['success2']`.

<img width="1783" alt="Screenshot 2025-05-14 at 09 32 06" src="https://github.com/user-attachments/assets/0ccf462e-a882-42c7-af9b-a6da66ac0302" />

### 3️⃣ Задание 3: Форма «#write‑comment» с расширенной валидацией

<i>По макету (#write-comment) с полем Name, Mail, Comment и чекбоксом согласия.</i>

Валидация:
   - Name:
     - Длина от 3 до 20 символов. 
     - Запрет цифр (/\d/). 
   - Mail:
     - Формат email через filter_var. 
   - Comment:
     - Обязательно к заполнению. 
   - Чекбокс согласия:
     - Должен быть отмечен.

<img width="1791" alt="Screenshot 2025-05-14 at 09 35 43" src="https://github.com/user-attachments/assets/684bc6ed-f7b4-4bd4-9992-2b403964321d" />

<img width="1780" alt="Screenshot 2025-05-14 at 09 34 24" src="https://github.com/user-attachments/assets/46d145a7-9faf-438d-850f-480242cc58e0" />

### 4️⃣ Задание 4: Создание теста

1. Форма с тремя вопросами:
   - Поле `input[type=text]` для имени участника.
   - `radio` для одного правильного варианта. 
   - `checkbox` для множественного выбора.

2. При отправке:
   - Проверяем заполнение всех полей. 
   - Сравниваем ответы с заранее заданными правильными. 
   - Проверяем, что все поля заполнены и выводим результаты.

```php
    $correctAnswers = [
        'q1' => 'Париж',
        'q2' => ['2','5'],
        'q3' => 'Hypertext Preprocessor',
    ];

    // Считываем и обрезаем пробелы
    $u_name = trim($_POST['u_name'] ?? '');
    $q1     = $_POST['q1'] ?? '';
    $q2     = $_POST['q2'] ?? [];
    $q3     = $_POST['q3'] ?? '';

    // Валидация
    if ($u_name === '') {
        $messages['error4'][] = 'Поле «Имя участника» обязательно.';
    }
    if ($q1 === '' || !in_array($q1, ['Париж', 'Берлин'])) {
        $messages['error4'][] = 'Выберите правильный ответ на вопрос 1.';
    }
    if (empty($q2)) {
        $messages['error4'][] = 'Выберите хотя бы одно простое число в вопросе 2.';
    }
    if ($q3 === '' || !in_array($q3, ['Personal Home Page', 'Hypertext Preprocessor'])) {
        $messages['error4'][] = 'Выберите правильный ответ на вопрос 3.';
    }
    if (empty($messages['error4'])) {
        // Проверка правильности ответов
        $correctQ1 = ($q1 === $correctAnswers['q1']) ? 'Правильно' : 'Неправильно';
        $correctQ2 = ($q2 === $correctAnswers['q2']) ? 'Правильно' : 'Неправильно';
        $correctQ3 = ($q3 === $correctAnswers['q3']) ? 'Правильно' : 'Неправильно';

        $messages['success4'] = [
            "Имя участника: $u_name",
            "Ответ на вопрос 1: $correctQ1",
            "Ответ на вопрос 2: $correctQ2",
            "Ответ на вопрос 3: $correctQ3",
        ];
    }
```

<img width="1790" alt="Screenshot 2025-05-14 at 09 39 59" src="https://github.com/user-attachments/assets/a7e64bd7-cc8e-4c64-b86d-bada95c4b02a" />

### 🔄 Отличие $_POST и $_REQUEST
   - `$_POST` — содержит только данные из тела HTTP-запроса при методе `POST`.
   - `$_REQUEST` — объединяет `$_GET`, `$_POST` и `$_COOKIE` (зависит от директивы `variables_order`).

Рекомендуется использовать `$_POST` и `$_GET` по отдельности, чтобы избежать нежелательных «протечек» данных из куки.

---

## 📚 Использованные источники

- [PHP Manual: Forms](https://www.php.net/manual/ru/tutorial.forms.php)
- [filter_var](https://www.php.net/manual/ru/function.filter-var.php)
- Материалы курса по PHP.
