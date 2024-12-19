# 🛠️ Лабораторная работа №1: Основы HTTP

## 🎯 Цель
Целью данной лабораторной работы является изучение основных принципов протокола HTTP, включая методы, заголовки, коды состояния и анализ запросов.

---

## ✏️ Задание №1: Анализ HTTP-запросов

### 1️⃣ Анализ запроса с неверными данными
**Raw Request:**
```
POST /login/process.php HTTP/1.1
Accept: */*
Accept-Encoding: gzip, deflate
Accept-Language: en-US,en;q=0.9,ru;q=0.8,ro;q=0.7
Connection: keep-alive
Content-Length: 37
Content-Type: application/x-www-form-urlencoded; charset=UTF-8
Host: sandbox.usm.md
Origin: http://sandbox.usm.md
Referer: http://sandbox.usm.md/login/
User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36
X-Requested-With: XMLHttpRequest
```

**Raw Response:**
```
HTTP/1.1 401 Unauthorized
Server: nginx/1.24.0 (Ubuntu)
Date: Thu, 19 Dec 2024 20:50:49 GMT
Content-Type: text/plain;charset=UTF-8
Transfer-Encoding: chunked
Connection: keep-alive
```

#### Вопросы и ответы:
- **Какой метод HTTP был использован для отправки запроса?**
  Метод: `POST`.

- **Какие заголовки были отправлены в запросе?**
    - `Accept`
    - `Accept-Encoding`
    - `Accept-Language`
    - `Connection`
    - `Content-Length`
    - `Content-Type`
    - `Host`
    - `Origin`
    - `Referer`
    - `User-Agent`
    - `X-Requested-With`

- **Какие параметры были отправлены в запросе?**
  Параметры: `username=student&password=studentpass`

- **Какой код состояния был возвращен сервером?**
  Код состояния: `401 Unauthorized`.

- **Какие заголовки были отправлены в ответе?**
    - `Server`
    - `Date`
    - `Content-Type`
    - `Transfer-Encoding`
    - `Connection`

### 2️⃣ Анализ запроса с верными данными
**Raw Request:**
```
POST /login/process.php HTTP/1.1
Accept: */*
Accept-Encoding: gzip, deflate
Accept-Language: en-US,en;q=0.9,ru;q=0.8,ro;q=0.7
Connection: keep-alive
Content-Length: 32
Content-Type: application/x-www-form-urlencoded; charset=UTF-8
Host: sandbox.usm.md
Origin: http://sandbox.usm.md
Referer: http://sandbox.usm.md/login/
User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36
X-Requested-With: XMLHttpRequest
```

**Raw Response:**
```
HTTP/1.1 200 OK
Server: nginx/1.24.0 (Ubuntu)
Date: Thu, 19 Dec 2024 21:29:20 GMT
Content-Type: text/plain;charset=UTF-8
Transfer-Encoding: chunked
Connection: keep-alive
```

#### Вопросы и ответы:
- **Какой метод HTTP был использован для отправки запроса?**
  Метод: `POST`.

- **Какие заголовки были отправлены в запросе?**
    - `Accept`
    - `Accept-Encoding`
    - `Accept-Language`
    - `Connection`
    - `Content-Length`
    - `Content-Type`
    - `Host`
    - `Origin`
    - `Referer`
    - `User-Agent`
    - `X-Requested-With`

- **Какие параметры были отправлены в запросе?**
  Параметры: `username=admin&password=password`

- **Какой код состояния был возвращен сервером?**
  Код состояния: `200 OK`.

- **Какие заголовки были отправлены в ответе?**
    - `Server`
    - `Date`
    - `Content-Type`
    - `Transfer-Encoding`
    - `Connection`

---

## ✏️ Задание №2: Составление HTTP-запросов

### 1️⃣ GET-запрос
```
GET / HTTP/1.1
Host: sandbox.com
User-Agent: Artiom Startev
```

### 2️⃣ POST-запрос
```
POST /cars HTTP/1.1
Host: sandbox.com
Content-Type: application/x-www-form-urlencoded

make=Toyota&model=Corolla&year=2020
```

### 3️⃣ PUT-запрос
```
PUT /cars/1 HTTP/1.1
Host: sandbox.com
Content-Type: application/json
User-Agent: Artiom Startev

{
  "make": "Toyota",
  "model": "Corolla",
  "year": 2021
}
```

### 4️⃣ Возможный ответ сервера для POST-запроса
```
HTTP/1.1 201 Created
Content-Type: application/json
Location: /cars/123

{
  "message": "Car successfully created."
}
```

#### Возможные ситуации для HTTP-кодов состояния:
- **200 OK**: Запрос успешно выполнен.
- **201 Created**: Ресурс успешно создан.
- **400 Bad Request**: Ошибка в запросе.
- **401 Unauthorized**: Отсутствует авторизация.
- **403 Forbidden**: Доступ к ресурсу запрещен.
- **404 Not Found**: Ресурс не найден.
- **500 Internal Server Error**: Ошибка на стороне сервера.

---

## ✏️ Задание №3: HTTP_Quest

### Шаг 1: Отправьте POST-запрос
```
POST /quest HTTP/1.1
Host: sandbox.usm.md
User-Agent: Artiom Startev
```

**curl:**
```bash
curl -X POST http://sandbox.usm.md/quest -H "User-Agent: Artiom Startev"
```

### Шаг 2: Следуйте инструкциям сервера
Сервер будет предоставлять дальнейшие шаги, которые необходимо выполнить для завершения квеста. Финальный шаг предоставит секретное слово.

**Пример ответа:**
```
/home/devrdn/www/quest/progress/
```

---

## 📚 Использованные источники

- [HTTP Documentation](https://developer.mozilla.org/en-US/docs/Web/HTTP)
- [curl Documentation](https://curl.se/docs/)
- Инструменты разработчика браузера.

---
## ✏️ Задание №3: HTTP_Quest

### Шаг 1: Отправьте POST-запрос для создания агента

```
POST /quest HTTP/1.1
Host: sandbox.usm.md
User-Agent: Artiom Startev
```

**curl:**
```bash
curl -X POST http://sandbox.usm.md/quest -H "User-Agent: Artiom Startev"
```

**Пример ответа:**
```
1. Excellent, you have created an Agent. Here is your unique ID: 833708. Now, to verify your identity, send a POST request to http://sandbox.usm.md/quest/login with the Authorization header containing the token: CBMZPQcIYjYHFTsVCCI=. Make sure to remember both your ID and token!
2. id: 833708
3. token: CBMZPQcIYjYHFTsVCCI=
4. instruction: Send a POST request to http://sandbox.usm.md/quest/login with Authorization: Bearer CBMZPQcIYjYHFTsVCCI=
```

### Шаг 2: Отправьте POST-запрос для проверки авторизации

```
POST /quest/login HTTP/1.1
Host: sandbox.usm.md
Authorization: Bearer CBMZPQcIYjYHFTsVCCI=
```

**curl:**
```bash
curl -X POST http://sandbox.usm.md/quest/login -H "Authorization: Bearer CBMZPQcIYjYHFTsVCCI="
```

**Пример ответа:**
```
1. Step 2 completed! Now, send a PUT request to http://sandbox.usm.md/quest/age with the request body age=<your age> and with the Authorization header with the token you received in the previous step.
2. next_step: Send a PUT request to http://sandbox.usm.md/quest/age with age=<your age> in the request body
```

### Шаг 3: Отправьте PUT-запрос для обновления возраста

```
PUT /quest/age HTTP/1.1
Host: sandbox.usm.md
Authorization: Bearer KhQfOEddbFJdRQ==
Content-Type: application/x-www-form-urlencoded

age=21
```

**curl:**
```bash
curl -X PUT http://sandbox.usm.md/quest/age -H "Authorization: Bearer KhQfOEddbFJdRQ==" -d "age=21"
```

**Пример ответа:**
```
1. Age successfully updated! Now, send a GET request to http://sandbox.usm.md/quest/secret with your final token: KhQfOEddbFJdRR9CU1VQRVJRSlZx
2. final_token: KhQfOEddbFJdRR9CU1VQRVJRSlZx
3. instruction: Send a GET request to http://sandbox.usm.md/quest/secret?token=KhQfOEddbFJdRR9CU1VQRVJRSlZx
```

### Шаг 4: Отправьте GET-запрос для получения секрета

```
GET /quest/secret?token=KhQfOEddbFJdRR9CU1VQRVJRSlZx HTTP/1.1
Host: sandbox.usm.md
```

**curl:**
```bash
curl -X GET "http://sandbox.usm.md/quest/secret?token=KhQfOEddbFJdRR9CU1VQRVJRSlZx"
```

**Пример ответа:**
```
1. Congratulations, curl/8.7.1! You have successfully completed the quest! Here is your secret: CjkdGkpxTVJiUFlGVA==
2. secret: CjkdGkpxTVJiUFlGVA==
```

---

## 📚 Использованные источники

- [HTTP Documentation](https://developer.mozilla.org/en-US/docs/Web/HTTP)
- [curl Documentation](https://curl.se/docs/)
