<?php
/**
 * Главный файл лабораторной работы №4 «Циклы, массивы, функции»
 * @author  Artiom Startev
 * @version 1.0
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ЛР №4. Циклы, массивы, функции</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0;}
        header, footer { background: #f0f0f0; padding: 10px; text-align: center; }
        nav { background: #333; padding: 5px; }
        nav a { color: #fff; margin: 0 10px; text-decoration: none; }
        main { padding: 20px; }
        section { margin-bottom: 40px; }
        pre { background: #fafafa; padding: 10px; border: 1px solid #ddd; }
        table { border-collapse: collapse; width: 100%; margin-top: 10px; }
        th, td { border: 1px solid #999; padding: 5px; text-align: left; }
        th { background: #e0e0e0; }
        .gallery { display: grid; grid-template-columns: repeat(4, 1fr); grid-gap: 10px; }
        .gallery img { width: 100%; height: 400px; object-fit: cover; border: 1px solid #ccc; border-radius: 5px; }
    </style>
</head>
<body>

<header>
    <h1>Лабораторная работа №4</h1>
    <p>Тема: Циклы, массивы, функции</p>
</header>

<nav>
    <a href="#task1">Задание 1</a> |
    <a href="#task2">Задание 2</a> |
    <a href="#task3">Задание 3</a> |
    <a href="#task4">Задание 4</a> |
    <a href="#task5">Задание 5</a>
</nav>

<main>

    <!-- Задание 1 -->
    <section id="task1">
        <h2>Задание 1. Цикл <code>for</code></h2>
        <p>Добавьте вывод промежуточных значений <code>$a</code> и <code>$b</code> на каждом шаге цикла:</p>
        <pre><?php
            $a = 0;
            $b = 0;
            for ($i = 0; $i <= 5; $i++) {
                $a += 10;
                $b += 5;
                echo "Итерация {$i}: a = {$a}, b = {$b}\n";
            }
            echo "\nEnd of the loop: a = $a, b = $b";
            ?></pre>
    </section>

    <!-- Задание 2 -->
    <section id="task2">
        <h2>Задание 2. Цикл <code>while</code></h2>
        <p>Перепишите задание 1, используя <code>while</code>:</p>
        <pre><?php
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
            ?></pre>
    </section>

    <!-- Задание 3 -->
    <section id="task3">
        <h2>Задание 3. Работа с массивами</h2>
        <p>Сгенерируем массив случайных чисел от 1 до 100 и выведем его в удобочитаемом формате:</p>
        <pre><?php
            $numbers = [];
            for ($i = 0; $i < 10; $i++) {
                $numbers[] = rand(1, 100);
            }
            echo "Сгенерирован массив:\n";
            print_r($numbers);
            ?></pre>
    </section>

    <!-- Задание 4 -->
    <section id="task4">
        <h2>Задание 4. Ассоциативные массивы и функции</h2>

        <?php
        $transactions = [
            [
                "transaction_id"          => 1,
                "transaction_date"        => "2019-01-01",
                "transaction_amount"      => 100.00,
                "transaction_description" => "Payment for groceries",
                "merchant_name"           => "SuperMart",
            ],
            [
                "transaction_id"          => 2,
                "transaction_date"        => "2020-02-15",
                "transaction_amount"      => 75.50,
                "transaction_description" => "Dinner with friends",
                "merchant_name"           => "Local Restaurant",
            ],
            [
                "transaction_id"          => 3,
                "transaction_date"        => "2021-05-20",
                "transaction_amount"      => 250.00,
                "transaction_description" => "Electronics purchase",
                "merchant_name"           => "TechStore",
            ],
            [
                "transaction_id"          => 4,
                "transaction_date"        => "2022-11-11",
                "transaction_amount"      => 50.25,
                "transaction_description" => "Book order",
                "merchant_name"           => "BookShop",
            ],
        ];

        // Функции
        function calculateTotalAmount(array $tx): float {
            return array_reduce($tx, fn($carry, $t) => $carry + $t['transaction_amount'], 0);
        }
        function calculateAverage(array $tx): float {
            return calculateTotalAmount($tx) / count($tx);
        }
        function mapTransactionDescriptions(array $tx): array {
            return array_map(fn($t) => $t['transaction_description'], $tx);
        }

        // Вычисления
        $total   = calculateTotalAmount($transactions);
        $average = calculateAverage($transactions);
        $descs   = mapTransactionDescriptions($transactions);
        ?>

        <!-- HTML-таблица транзакций -->
        <table>
            <tr>
                <th colspan="5">Список транзакций</th>
            </tr>
            <tr>
                <th>ID</th>
                <th>Дата</th>
                <th>Сумма</th>
                <th>Описание</th>
                <th>Организация</th>
            </tr>
            <?php foreach ($transactions as $t): ?>
                <tr>
                    <td><?= $t['transaction_id'] ?></td>
                    <td><?= $t['transaction_date'] ?></td>
                    <td><?= number_format($t['transaction_amount'], 2, '.', '') ?></td>
                    <td><?= htmlspecialchars($t['transaction_description']) ?></td>
                    <td><?= htmlspecialchars($t['merchant_name']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <!-- Результаты функций -->
        <p><b>Общая сумма:</b> <?= number_format($total, 2, '.', '') ?></p>
        <p><b>Среднее значение:</b> <?= number_format($average, 2, '.', '') ?></p>

        <p><b>Все описания в виде списка:</b></p>
        <ul>
            <?php foreach ($descs as $d): ?>
                <li><?= htmlspecialchars($d) ?></li>
            <?php endforeach; ?>
        </ul>

        <hr>

        <!-- ООП-вариант -->
        <?php
        /**
         * Класс Transaction с методами для сумм и среднего
         */
        class Transaction {
            private int    $id;
            private string $date;
            private float  $amount;
            private string $description;
            private string $merchant;

            public function __construct(int $id, string $date, float $amount, string $desc, string $merch) {
                $this->id          = $id;
                $this->date        = $date;
                $this->amount      = $amount;
                $this->description = $desc;
                $this->merchant    = $merch;
            }
            public function getAmount(): float { return $this->amount; }
            public function getDescription(): string { return $this->description; }

            public static function calculateTotal(array $arr): float {
                return array_reduce($arr, fn($c, Transaction $t) => $c + $t->getAmount(), 0);
            }
            public static function calculateAverage(array $arr): float {
                return self::calculateTotal($arr) / count($arr);
            }
        }

        // Преобразуем в объекты
        $objects = [];
        foreach ($transactions as $t) {
            $objects[] = new Transaction(
                $t['transaction_id'],
                $t['transaction_date'],
                $t['transaction_amount'],
                $t['transaction_description'],
                $t['merchant_name'],
            );
        }

        $oopTotal   = Transaction::calculateTotal($objects);
        $oopAverage = Transaction::calculateAverage($objects);
        ?>

        <p><b>ООП – общая сумма:</b> <?= number_format($oopTotal, 2, '.', '') ?></p>
        <p><b>ООП – среднее значение:</b> <?= number_format($oopAverage, 2, '.', '') ?></p>

    </section>

    <!-- Задание 5 -->
    <section id="task5">
        <h2>Задание 5. Работа с файловой системой (галерея)</h2>
        <?php
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
        ?>
    </section>

</main>

<footer>
    <p>USM © 2025</p>
</footer>

</body>
</html>
