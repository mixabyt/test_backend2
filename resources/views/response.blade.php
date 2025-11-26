<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<div class="container mt-4">

    <h1 class="mb-4">Products Catalog</h1>


    <div class="card">
        <div class="card-header bg-dark text-white">
            Product List
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped mb-0">
                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Article</th>
                    <th>Brand</th>
                    <th>Name</th>
                    <th>Final Price</th>
                </tr>
                </thead>

                <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->article }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ number_format($product->price, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-3">
                            No products found.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="card-footer">
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>

</div>
</body>
</html>
