<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class RajaOngkirController extends Controller
{
    public function provinces()
    {
        $response = Http::withHeaders(['key' => '26494ebb2065e1306db10cf998995b5f'])->get('https://api.rajaongkir.com/starter/province');
        return $response->json();
    }
    public function cities(Request $request)
    {
        $response = Http::withHeaders(['key' => '26494ebb2065e1306db10cf998995b5f'])->get('https://api.rajaongkir.com/starter/city', [
            'province' => $request->input('province')
        ]);
        return $response->json();
    }
    public function cost()
    {
        $response = Http::withHeaders(['key' => '26494ebb2065e1306db10cf998995b5f'])->post('https://api.rajaongkir.com/starter/cost', [
            "origin" => "501",
            "destination" => "114",
            "weight" => '1700',
            "courier" => "jne"
        ]);
        return $response->json();
    }
}
