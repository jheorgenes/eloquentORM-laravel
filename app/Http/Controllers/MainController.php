<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // /**********************************/
        // /******** Hard Delete *************/
        // /**********************************/

        // $product = Product::find(10);
        // $product->delete();

        // Se quiser limpar TUDO da tabela e resetar o autoIncremento
        // Product::truncate();

        // Product::destroy(1);
        // Product::destroy(1, 3, 5);
        // Product::destroy([2, 4, 6]);

        // Executando o delete com uma condição específica
        // Product::where('price', '>=', 70)->delete();

        // /**********************************/
        // /******** Soft Delete *************/
        // /**********************************/

        // OBS: Só é possível usar soft delete se tiver a coluna deleted_at na estrutura da tabela
        // $product = Product::find(25);
        // $product->delete();

        // Recuperar produto com soft delete
        // $product = Product::withTrashed()->find(25);
        // $product->restore();
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
