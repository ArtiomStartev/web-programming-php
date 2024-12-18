<?php
/**
 * Главный файл лабораторной работы №3.
 * @author Artiom Startev
 * @version 1.0
 */

// Задание 1
$lastName = 'Ivanov';
$firstName = 'Nikolai';
$age = 30;

echo "Client's last name is $lastName, and their first name is $firstName.";
print "<br>Client's age is $age.";

echo "<hr>";

// Задание 2
$currentDay = date("w");

if ($currentDay == 5) { // 5: Friday
    echo "<br>Have a great weekend!";
} elseif ($currentDay == 0) { // 0: Sunday
    echo "<br>Tomorrow starts a new work week!";
} else {
    echo "<br>Have a productive workday!";
}

// Тот же вывод с использованием тернарного оператора
echo ($currentDay == 5) ? "<br>Have a great weekend!" : (($currentDay == 0) ? "<br>Tomorrow starts a new work week!" : "<br>Have a productive workday!");

echo "<hr>";

// Задание 3
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

echo "<hr>";

// Задание 4
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

echo "<hr>";

// Задание 5
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
?>