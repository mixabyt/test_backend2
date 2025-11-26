<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>

<div class="container mt-5">
    <h2>Пошук товарів</h2>
    <form action="{{route('products.uk')}}" method="GET" class="row g-3">
        <div class="col-md-4">
            <input type="text" name="search" id="name" class="form-control" placeholder="Введіть назву">
        </div>
        <button type="submit">Search</button>
    </form>
</div>
</body>
</html>
