<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>

<div>
    <div class="container mt-5">
        <h2>Пошук товарів</h2>
        <form action="{{route('products', [$locale])}}" method="GET" class="row g-3">
            <div class="col-md-4">
                <input type="text" name="search" id="name" class="form-control" placeholder="Введіть назву">
            </div>
            <button type="submit">Search</button>
        </form>


        @if(\Illuminate\Support\Facades\Storage::disk('public')->exists('products_xml/Products_uk.xml'))
        <a href="{{route("products.download", 'uk')}}">Отримати відразу (uk version)</a>
        @else
            <span>файлу з uk locale немає</span>
        @endif
    <br/>
        @if(\Illuminate\Support\Facades\Storage::disk('public')->exists('products_xml/Products_en.xml'))
            <a href="{{route("products.download", 'en')}}">Отримати відразу (en version)</a>
        @else
            <span>файлу з en locale немає</span>
        @endif

</div>
</body>
</html>
