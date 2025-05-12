# 🛠️ Лабораторная работа №4: Циклы, массивы, функции

Добро пожаловать в описание лабораторной работы №4! В этой работе мы изучили основы работы с циклами (`for`, `while`), массивами (обычными и ассоциативными), функциями и простейшими операциями с файловой системой.

---

## 🎯 Цель

- Научиться использовать циклы `for` и `while` и выводить их промежуточные значения.
- Научиться генерировать и выводить массивы случайных чисел.
- Разобраться с ассоциативными массивами и написать функции для подсчёта общей и средней суммы транзакций, а также получения массива описаний.
- Реализовать ООП-вариант обработки транзакций (класс `Transaction`).
- Освоить базовую работу с файловой системой: сканировать папку с изображениями и выводить их в виде галереи.
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

### 1️⃣ Задание 1: Цикл `for`

#### Выводим на каждой итерации значения переменных `$a` и `$b`.

```php
$a = 0;
$b = 0;
for ($i = 0; $i <= 5; $i++) {
    $a += 10;
    $b += 5;
    echo "Итерация {$i}: a = {$a}, b = {$b}\n";
}
echo "\nEnd of the loop: a = $a, b = $b";
```

![image](https://github.com/user-attachments/assets/85cdfd64-e624-4e13-833a-d11685838c9a)

### 2️⃣ Задание 2: Цикл `while`

#### Аналогичный подсчёт, но с использованием `while`.

```php
$a = 0;
$b = 0;
$i = 0;
while ($i <= 5) {
    $a += 10;
    $b += 5;
    echo "Итерация {$i}: a = {$a}, b = {$b}\n";
    $i++;
}
echo "\nEnd of the loop: a = $a, b = $b";
```

<img width="1786" alt="Screenshot 2025-05-12 at 14 38 15" src="https://github.com/user-attachments/assets/dd4c0d13-dc16-46a0-ae6a-ab141871894f" />

### 3️⃣ Задание 3: Работа с массивами

#### Генерируем массив из 10 случайных чисел от 1 до 100 и выводим его.

```php
$numbers = [];
for ($i = 0; $i < 10; $i++) {
    $numbers[] = rand(1, 100);
}
echo "Сгенерирован массив:\n";
print_r($numbers);
```

<img width="1785" alt="Screenshot 2025-05-12 at 14 38 59" src="https://github.com/user-attachments/assets/93c71290-2581-41ae-943a-eeb3b81649c8" />

### 4️⃣ Задание 4: Ассоциативные массивы и функции

#### 1. Исходный массив транзакций

```php
$transactions = [
  [
      "transaction_id"          => 1,
      "transaction_date"        => "2019-01-01",
      "transaction_amount"      => 100.00,
      "transaction_description" => "Payment for groceries",
      "merchant_name"           => "SuperMart",
  ],
  // … ещё 3 записи
];
```

#### 2. Функции для вычислений

```php
function calculateTotalAmount(array $tx): float {
    return array_reduce($tx, fn($carry, $t) => $carry + $t['transaction_amount'], 0);
}
function calculateAverage(array $tx): float {
    return calculateTotalAmount($tx) / count($tx);
}
function mapTransactionDescriptions(array $tx): array {
    return array_map(fn($t) => $t['transaction_description'], $tx);
}
```

#### 3. Вывод в HTML-таблицу

```php
$total   = calculateTotalAmount($transactions);
$average = calculateAverage($transactions);

<p><b>Общая сумма:</b> <?= number_format($total, 2, '.', '') ?></p>
<p><b>Среднее значение:</b> <?= number_format($average, 2, '.', '') ?></p>
```

#### 4. ООП-вариант с классом `Transaction`

```php
class Transaction {
    private int $id;
    private float $amount;
    // …
    public static function calculateTotal(array $arr): float { … }
    public static function calculateAverage(array $arr): float { … }
}
```

<img width="1787" alt="Screenshot 2025-05-12 at 14 39 54" src="https://github.com/user-attachments/assets/f96d0bca-80be-44b0-a27b-f32132e6f5f9" />

### 5️⃣ Задание 5: Работа с файловой системой (галерея)

#### Сканируем папку image/ и выводим все картинки в сетке 4×N.

```php
$dir   = __DIR__ . '/image/';
$files = @scandir($dir);
if ($files === false) {
    echo "<p>Не удалось прочитать директорию с изображениями.</p>";
} else {
    echo '<div class="gallery">';
    foreach ($files as $file) {
        if ($file === "." || $file === "..") continue;
        $path = 'image/' . $file;
        echo "<img src=\"{$path}\" alt=\"\" />";
    }
    echo '</div>';
}
```

<img width="1784" alt="Screenshot 2025-05-12 at 14 40 32" src="https://github.com/user-attachments/assets/233cb471-ddd3-46e8-82ba-15942ede13c4" />

---

## 🖼️ Скриншоты и примеры
<img width="1785" alt="Screenshot 2025-05-12 at 14 41 15" src="https://github.com/user-attachments/assets/27535a15-b8dd-435c-aa59-23139431530d" />
<img width="1786" alt="Screenshot 2025-05-12 at 14 41 29" src="https://github.com/user-attachments/assets/3b946bde-6cdf-4413-af21-ae5acb7366c0" />
<img width="1790" alt="Screenshot 2025-05-12 at 14 41 38" src="https://github.com/user-attachments/assets/8584d5f6-83c8-498e-87df-9564875495d7" />

---

## 📚 Использованные источники

- [PHP Documentation](https://www.php.net)
- Материалы курса по PHP.
