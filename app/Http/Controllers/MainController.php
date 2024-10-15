<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // // Inserindo um produto no banco de dados (usando Eloquent)
        // $new_product = new Product();
        // $new_product->product_name = 'Novo Produto';
        // $new_product->price = 50.00;
        // $new_product->save();

        // // Inserindo um produto no banco (necessário definir propriedade $fillable no model do eloquent)
        // Product::create([
        //     'product_name' => 'Novo Product 2',
        //     'price' => 50.2
        // ]);

        // Inserindo vários produtos na base de dados de uma vez (usa o $fillable no model do eloquent)
        Product::insert([
            [
                'product_name' => 'Produto 1',
                'price' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'Produto 2',
                'price' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'Produto 3',
                'price' => 30,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
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
