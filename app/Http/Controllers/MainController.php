<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // // UPDATE
        // $products = Product::find(10);
        // $products->product_name = 'PRODUTI ALTERADO';
        // $products->price = 10;
        // $products->save();

        // // UPDATE de forma massiva (altera vários produtos de uma vez)
        // // Necessita de cuidado, pois esse tipo de update é irreversível
        // Product::where('price', '<=', 10)->update([
        //     'price' => 250
        // ]);

        // // Atualizar (se existir) ou criar
        // Product::updateOrCreate(
        //     ['product_name' => 'XAROPE'], //Busca na base se existe produto com esse nome
        //     ['price' => 25] //Atualiza ou cria um produto com o nome Batata e o preço de 25
        // );
    }

    private function showData($data)
    {
        echo '<pre>';
        print_r($data);
    }

    private function arrayOfObject($data)
    {
        $tmp = [];
        foreach ($data as $key => $value) {
            $tmp[] = (object) $value;
        }
        return $tmp;
    }
}
