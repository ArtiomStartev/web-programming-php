<?php
/**
 * Лабораторная работа №5: Обработка форм PHP
 * @author  Artiom Startev
 * @version 1.0
 */

// Определяем, какой раздел был отправлен:
$task = $_POST['task'] ?? '';

// Результаты и ошибки
$messages = [];

// --- Задание 1: Работа с $_POST ---------------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $task === '1') {
    // Считываем и обрезаем пробелы
    $name    = trim($_POST['name']    ?? '');
    $email   = trim($_POST['email']   ?? '');
    $review  = $_POST['review']       ?? '';
    $comment = trim($_POST['comment'] ?? '');

    // Валидация
    if ($name === '') {
        $messages['error1'][] = 'Поле «Имя» обязательно.';
    }
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $messages['error1'][] = 'Введите корректный e-mail.';
    }
    if ($review === '' || !in_array($review, ['10', '8', '5'])) {
        $messages['error1'][] = 'Выберите одну из опций оценки.';
    }
    if ($comment === '') {
        $messages['error1'][] = 'Поле «Комментарий» не может быть пустым.';
    }
    if (empty($messages['error1'])) {
        $messages['success1'] = [
            "Ваше имя: $name",
            "Ваш e-mail: $email",
            "Оценка: $review",
            "Комментарий: $comment",
        ];
    }
}

// --- Задание 2: Данные с разных контроллеров --------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $task === '2') {
    // Считываем и обрезаем пробелы
    $age        = trim($_POST['age']        ?? '');
    $city       = trim($_POST['city']       ?? '');
    $attendance = $_POST['attendance']      ?? '';
    $newsletter = isset($_POST['newsletter']) ? 'Да' : 'Нет';

    // Валидация
    if ($age === '' || !is_numeric($age) || $age < 0) {
        $messages['error2'][] = 'Введите корректный возраст.';
    }
    if ($city === '' || !in_array($city, ['Кишинёв', 'Москва', 'Лондон', 'Нью-Йорк'])) {
        $messages['error2'][] = 'Выберите город.';
    }
    if ($attendance === '' || !in_array($attendance, ['online', 'offline'])) {
        $messages['error2'][] = 'Выберите формат участия.';
    }
    if (empty($messages['error2'])) {
        $messages['success2'] = [
            "Возраст: $age",
            "Город: $city",
            "Формат участия: $attendance",
            "Подписка на рассылку: $newsletter",
        ];
    }
}

// --- Задание 3: Форма #write-comment -----------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $task === '3') {
    $c_name    = trim($_POST['name3']    ?? '');
    $c_mail    = trim($_POST['mail3']    ?? '');
    $c_comment = trim($_POST['comment3'] ?? '');
    $c_agree   = isset($_POST['agree']);

    // Валидация имени
    if ($c_name === '') {
        $messages['error3'][] = 'Имя обязательно к заполнению.';
    }
    // Имя: 3-20 символов, без цифр
    if (strlen($c_name) < 3 || strlen($c_name) > 20) {
        $messages['error3'][] = 'Имя: от 3 до 20 символов.';
    }
    if (preg_match('/\d/', $c_name)) {
        $messages['error3'][] = 'Имя не должно содержать цифр.';
    }
    // Email
    if ($c_mail === '' || !filter_var($c_mail, FILTER_VALIDATE_EMAIL)) {
        $messages['error3'][] = 'Введите корректный e-mail.';
    }
    // Комментарий
    if ($c_comment === '') {
        $messages['error3'][] = 'Комментарий обязателен.';
    }
    // Согласие
    if (!$c_agree) {
        $messages['error3'][] = 'Необходимо согласие.';
    }
    if (empty($messages['error3'])) {
        $messages['success3'] = [
            "Name: $c_name",
            "Mail: $c_mail",
            "Comment: $c_comment",
        ];
    }
}

// --- Задание 4: Создание теста --------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $task === '4') {
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
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Лабораторная работа №5: Обработка форм PHP</title>
    <style>
        body {font-family: Arial, sans-serif; margin:20px;}
        .form {margin-bottom:30px; padding:10px}
        legend {font-weight:bold}
        .error {color:red}
        .success {color:green}
        label {display:block; margin:5px 0}
        .btn {display: flex; flex-direction: row; gap: 10px; margin-top: 10px;}
    </style>
</head>
<body>

<h1>Лабораторная работа №5: Обработка форм</h1>

<!-- Задание 1 -->
<div class="form">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <fieldset>
            <legend>Оставьте отзыв!</legend>

            <div style="display: flex; flex-direction: column; gap: 10px;">
                <label for="name">Имя:<input type="text" name="name"/></label>

                <label for="email">Email:<input type="email" name="email"/></label>
            </div>

            <div>
                <p><label for="review">Оцените наш сервис!</label></p>
                <p><input id="review" type="radio" name="review" value="10" checked>Хорошо</p>
                <p><input id="review" type="radio" name="review" value="8">Удовлетворительно</p>
                <p><input id="review" type="radio" name="review" value="5">Плохо</p>
            </div>

            <div>
                <p><label for="comment">Ваш комментарий: </label></p>
                <textarea id="comment" name="comment" cols="30" rows="10"></textarea>
            </div>

            <div class="btn">
                <input type="hidden" name="task" value="1">
                <input type="submit" value="Отправить"/>
                <input type="reset" value="Удалить"/>
            </div>
        </fieldset>
    </form>

    <?php if (!empty($messages['error1'])): ?>
        <div class="error">
            <ul>
                <?php foreach($messages['error1'] as $e): ?>
                    <li><?= htmlspecialchars($e) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php elseif (!empty($messages['success1'])): ?>
        <ul class="success">
            <?php foreach($messages['success1'] as $m) echo "<li>$m</li>"; ?>
        </ul>
    <?php endif; ?>
</div>

<!-- Задание 2 -->
<div class="form">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <fieldset>
            <legend>2. Регистрация на мероприятие</legend>

            <div style="display: flex; flex-direction: column; gap: 10px;">
                <label>Возраст: <input type="number" name="age"></label>

                <label>Город:
                    <select name="city">
                        <option value="">-- выберите --</option>
                        <option value="Кишинёв">Кишинёв</option>
                        <option value="Москва">Москва</option>
                        <option value="Лондон">Лондон</option>
                        <option value="Нью-Йорк">Нью-Йорк</option>
                    </select>
                </label>
            </div>

            <div>
                <p>Формат участия:</p>
                <p><input type="radio" name="attendance" value="online" checked> Онлайн</p>
                <p><input type="radio" name="attendance" value="offline"> Оффлайн</p>
            </div>

            <div style="margin-top: 20px;">
                <label><input type="checkbox" name="newsletter"> Подписаться на рассылку</label>
            </div>

            <div class="btn">
                <input type="hidden" name="task" value="2">
                <button type="submit">Зарегистрироваться</button>
                <input type="reset" value="Удалить"/>
            </div>
        </fieldset>
    </form>

    <?php if (!empty($messages['error2'])): ?>
        <div class="error">
            <ul>
                <?php foreach($messages['error2'] as $e): ?>
                    <li><?= htmlspecialchars($e) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php elseif (!empty($messages['success2'])): ?>
        <ul class="success">
            <?php foreach($messages['success2'] as $m) echo "<li>$m</li>"; ?>
        </ul>
    <?php endif; ?>
</div>

<!-- Задание 3 -->
<div class="form">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <fieldset>
            <legend>3. #write-comment</legend>

            <div>
                <label>Name: <input type="text" name="name3"></label>
                <label>Mail: <input type="email" name="mail3"></label>
            </div>

            <div>
                <p><label>Comment: </label></p>
                <textarea name="comment3" cols="30" rows="10"></textarea>
            </div>


            <div>
                <label><input type="checkbox" name="agree"> Do you agree with data processing?</label>
            </div>

            <div class="btn">
                <input type="hidden" name="task" value="3">
                <div class="btn"><button type="submit">Send</button></div>
            </div>
        </fieldset>
    </form>
    <?php if (!empty($messages['error3'])): ?>
        <div class="error">
            <ul>
                <?php foreach($messages['error3'] as $e): ?>
                    <li><?= htmlspecialchars($e) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php elseif (!empty($messages['success3'])): ?>
        <ul class="success">
            <?php foreach($messages['success3'] as $m) echo "<li>$m</li>"; ?>
        </ul>
    <?php endif; ?>
</div>

<!-- Задание 4 -->
<div class="form">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <fieldset>
            <legend>4. Тест</legend>

            <div>
                <label>Имя участника: <input type="text" name="u_name"></label>
            </div>

            <div>
                <p>1. Столица Франции?</p>
                <label><input type="radio" name="q1" value="Париж"> Париж</label>
                <label><input type="radio" name="q1" value="Берлин"> Берлин</label>
            </div>

            <div>
                <p>2. Выберите простые числа:</p>
                <label><input type="checkbox" name="q2[]" value="2"> 2</label>
                <label><input type="checkbox" name="q2[]" value="4"> 4</label>
                <label><input type="checkbox" name="q2[]" value="5"> 5</label>
            </div>

            <div>
                <p>3. Что означает PHP?</p>
                <label><input type="radio" name="q3" value="Personal Home Page"> Personal Home Page</label>
                <label><input type="radio" name="q3" value="Hypertext Preprocessor"> Hypertext Preprocessor</label>
            </div>

            <div class="btn">
                <input type="hidden" name="task" value="4">
                <button type="submit">Проверить тест</button>
                <input type="reset" value="Удалить"/>
            </div>
        </fieldset>
    </form>

    <?php if (!empty($messages['error4'])): ?>
        <ul class="error">
            <?php foreach($messages['error4'] as $e) echo "<li>$e</li>"; ?>
        </ul>
    <?php elseif (!empty($messages['success4'])): ?>
        <ul class="success">
            <?php foreach($messages['success4'] as $m) echo "<li>$m</li>"; ?>
        </ul>
    <?php endif; ?>
</div>

</body>
</html>
