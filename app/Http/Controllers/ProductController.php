<?php

namespace App\Http\Controllers;

use App\Models\Markup;
use App\Models\Product;
use App\Models\ProductContents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $locale)
    {
        $search = $request->get('search');


        if (empty($search)) {
            return response()->json([
                'error' => "expected search parameter",
            ])->setStatusCode(400);
        }

        $markups = Cache::remember('markups', 60, function () {
            return Markup::all();
        });

        $products = Product::query()
            ->select('products.*', 'product_contents.name')
            ->leftJoin('product_contents', function ($join) use ($locale) {
                $join->on('product_contents.product_id', '=', 'products.id')
                    ->where('product_contents.locale', '=', $locale);
            })
            ->where('products.article', 'like', "%{$search}%")
            ->orWhere('products.brand', 'like', "%{$search}%")
            ->orWhere('product_contents.name', 'like', "%{$search}%")
            ->paginate(10)->withQueryString();

        $products->each(function (Product $product) use ($markups) {
            foreach ($markups as $markup) {
                if($product->price >= $markup->price_from and  $product->price <= $markup->price_to) {
                    $product->price = $product->calculateFinalPrice($markup->percent);
                    break;
                }
            }
        });

        return view('response', compact( 'products'));




    }
}
