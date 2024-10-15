<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // // Se chamar apenas o ::all(), trás uma coleção de propriedades do model além de somente os dados do produto
        // $results = Product::all();

        // // Buscando apenas os nomes dos produtos;
        // foreach ($results as $product) {
        //     echo '<br>';
        //     echo $product->product_name;
        // }

        // // Buscando os produtos como array
        // $results = Product::all()->toArray();

        // // Buscar produtos ordenados pelo nome alfabeticamente
        // $results = Product::orderBy('product_name')->get()->toArray();

        // // Buscando apenas 3 produtos da lista
        // $results = Product::limit(3)->get()->toArray();

        // // Buscando um produto pelo id
        // $results = Product::find(10)->toArray();

        // // Usando a clausura where
        // $results = Product::where('price', '>=', 70)->get()->toArray();

        // // Usando a clausura where e trazendo apenas o primeiro produto encontrado
        // $results = Product::where('price', '>=', 70)->first()->toArray();

        // // Buscar apenas o primeiro elemento se ele existir, caso o contrário retorna o que foi especificado
        // // Observe que vc pode retornar o que quiser, mas se o resultado do retorno for diferente do model do eloquent, vc não pode usar toArray() no final, por isso é sempre útil usar o collect function para fazer essa conversão (quando possível de utilizá-lo)
        // $results = collect(Product::where('price', '>=', 190)->firstOr( fn() => []))->toArray();


        // /* Alterando (via código) um produto para exibí-lo */
        // $results = Product::find(10);
        // echo $results->price;
        // echo '<br>';

        // $results->price = 200; //Definindo um novo preço apenas no código
        // echo $results->price;
        // echo '<br>';

        // $results->refresh(); //Resetando os dados obtidos do banco de dados nessa variável
        // echo $results->price;
        // echo '<br>';


        // // Buscando um item e exibindo apenas a sua propriedade
        // $product = Product::find(10);
        // echo $product->product_name . '<br>';

        // // Buscando apenas o primeiro registro da seleção realizada
        // // $product = Product::where('price', '>=', 70)->first();
        // // echo $product->product_name . ' tem um preço de ' . $product->price . '<br>';

        // // Buscando apenas o primeiro registro da seleção realizada (usando o firstWhere)
        // $product = Product::firstWhere('price', '>=', 70);
        // echo $product->product_name . ' tem um preço de ' . $product->price . '<br>';

        // // $product = Product::findOr(130, fn() => 'Não foi encontrado o produto desejado');
        // $product = Product::findOr(130, function() { echo 'Não foi encontrado o produto desejado'; });
        // if($product) {
        //     echo $product->product_name . ' tem um preço de ' . $product->price . '<br>';
        // }

        // $product = Product::findOrFail(112);
        // echo $product->product_name . ' tem um preço de ' . $product->price . '<br>';

        $results = [
            $total_products = Product::count(),
            $total_max_products = Product::max('price'),
            $total_min_products = Product::min('price'),
            $total_avg_products = Product::avg('price'),
            $total_sum_products = Product::sum('price')
        ];

        $this->showData($results);

        // $this->showData($results);
        // // $this->arrayOfObject($results);
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
