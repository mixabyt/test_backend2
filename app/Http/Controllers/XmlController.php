<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleXMLElement;
use Symfony\Component\HttpFoundation\StreamedResponse;

class XmlController extends Controller
{
    private string $fileName = 'products.xml';
    public function generateXml() :  SimpleXMLElement {
        $products = Product::query()->select('products.id', 'product_contents.name','products.article', 'products.brand', 'products.price' )
        ->leftJoin('product_contents', function ($join) {
            $join->on('product_contents.product_id', '=', 'products.id');
        })->get();


        $xml = new SimpleXMLElement('<products></products>');
        foreach ($products as $product) {
            $element = $xml->addChild('product');
            $element->addChild('id', $product->id);
            $element->addChild('name', $product->name);
            $element->addChild('article', $product->article);
            $element->addChild('brand', $product->brand);
            $element->addChild('price', $product->price);
        }
        return $xml;
    }

    public function getLink(Request $request) {
        $xml = $this->generateXml();
        $filepath = $this->storeFile($xml);
        return response()->json([
            'url' => route('products.download', ['file' => $filepath])
        ]);

    }

    private function storeFile(SimpleXMLElement $xml) : string {
        $filePath = 'products_xml/'  . $this->fileName;
        Storage::disk('public')->put($filePath, $xml->asXML());
        return $this->fileName;
    }

    public function downloadXml($locale) : StreamedResponse{
        $file = "products_xml/$this->fileName";
        if (!Storage::disk('public')->exists($file)) {
            abort(404);
        }
        return Storage::disk('public')->download($file);
    }

    public function getLatest(Request $request) {

    }

}
