<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleXMLElement;
use Symfony\Component\HttpFoundation\StreamedResponse;

class XmlController extends Controller
{
    private string $fileName = 'Products_';

    public function downloadXml($locale) : StreamedResponse{
        $file = "products_xml/$this->fileName" . $locale . ".xml";
        if (!Storage::disk('public')->exists($file)) {
            abort(404);
        }
        return Storage::disk('public')->download($file);
    }


}
