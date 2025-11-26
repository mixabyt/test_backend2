
# README з коротким описом запуску та ендпоінтів.

## Запуск проекту

### 1. Клонувати репозиторій

```bash
git clone https://github.com/mixabyt/test_backend2.git
```

### 2. Налаштувати конфігураційний файл

перейти в папку проекту і зробити наступне:
```bash
cp .env.example .env
```
вказати свої параметри для DB, redis

### 3. Встановити залежності PHP

```bash
composer install
```

### 4. Згенерувати ключ

```bash
php artisan key:generate
```

### 5. Виконати міграції

```bash
php artisan migrate
```
### 6. Cтворити символічне посилання

```bash
php artisan storage:link
```

### 7. Запустити сідери

```bash
php artisan db:seed --class=MarkupSeeder
php artisan db:seed --class=ProductsSeeder
```
Потрібно зачекати певний час поки виконається seed з базою даних


### 8. Запустити task schedule для генерації xml

```bash
php artisan schedule:work
```

### 9. (опційно) для генерації xml зараз

```bash
php artisan app:generate-xml
```

---

## Навігація по ендпоінтам

```
/                               - робить редірект на сторінку з uk locale
/{locale}/                      - сторінка для пошуку. Параметр locale відповідає за мову, на якій буде виконуватися пошук
/{locale}/products?search=      - пошук товару по параметру, який шукає по полям name, article, brand 

/products/download/{locale}     - для завантаження xml товарів в залежності від мови
```

