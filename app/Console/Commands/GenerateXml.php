<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use SimpleXMLElement;
class GenerateXml extends Command
{
    protected $signature = 'app:generate-xml';
    protected $description = 'Command description';



    public function handle()
    {
        $xml_uk = $this->generateXml('uk');
        $xml_en = $this->generateXml('en');

        Storage::disk('public')->put('products_xml/Products_uk.xml', $xml_uk->asXML());
        Storage::disk('public')->put('products_xml/Products_en.xml', $xml_en->asXML());

    }

    private function generateXml(string $locale) : SimpleXMLElement{
        $products = Product::query()->select('products.id', 'product_contents.name','products.article', 'products.brand', 'products.price' )
            ->leftJoin('product_contents', function ($join) {
                $join->on('product_contents.product_id', '=', 'products.id');
            })->where('product_contents.locale', '=', $locale)
            ->get();


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



}
