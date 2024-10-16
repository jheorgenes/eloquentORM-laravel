<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Phone;
use App\Models\Product;

class MainController extends Controller
{
    public function index()
    {
        echo "Eloquent Relações";
    }

    public function OneToOne()
    {
        // // Buscar o telefone de um determinado cliente
        // $cliente1 = Client::find(12)->phone;
        // echo "Telefone do cliente ID: " . $cliente1->client_id . ": " . $cliente1->phone_number;
        // echo '<hr>';

        // // Todos os dados do cliente e o telefone dele
        // $cliente2 = Client::find(12);
        // // Acessando a propriedade phone que existe no model e dele, buscando o phone_number
        // $phone = $cliente2->phone->phone_number;
        // echo '<br>';
        // echo "Nome do cliente: " . $cliente2->client_name . "<br>";
        // echo "Telefone do cliente: " . $phone;
        // echo '<hr>';

        // // Outra forma de buscar é usando o método with()
        // $cliente3 = Client::with('phone')->find(12);
        // // print_r($cliente3->toJson()); die();
        // echo '<br>';
        // echo "Nome do cliente: " . $cliente3->client_name . "<br>";
        // echo "Telefone do cliente: " . $cliente3->phone->phone_number;
        // echo '<hr>';

        // // Se quiser buscar um conjunto de clientes e seus telefones
        // $clients = Client::with('phone')->get();
        // print_r($clients->toJson()); die();
        // // foreach ($clients as $client) {
        // //     echo "<br>";
        // //     echo "Nome do cliente: " . $client->client_name . " - Telefone " . $client->phone->phone_number;
        // // }
    }

    public function OneToMany()
    {
        // // Buscar o id e o nome do cliente e todos os telefones dele
        // $client1 = Client::find(10);
        // $phones = $client1->phones;
        // // print_r($client1->toJson()); die();
        // echo "Cliente: " . $client1->client_name . "<br>";
        // echo "Telefones: <br>";
        // foreach ($phones as $phone) {
        //     echo $phone->phone_number . "<br>";
        // }

        // // Outra forma é usando o método with()
        // $client2 = Client::with('phones')->find(10);
        // // print_r($client2->toJson()); die();
        // echo "<br>";
        // echo "Cliente: " . $client2->client_name . "<br>";
        // echo "Telefones: <br>";
        // foreach ($client2->phones as $phone) {
        //     echo $phone->phone_number . "<br>";
        // }

        // // Vamos buscar todos os clientes e os seus telefones
        // $clients = Client::with('phones')->get();
        // // print_r($clients->toJson()); die();
        // foreach($clients as $client) {
        //     echo "<br>";
        //     echo "Cliente: " . $client->client_name . "<br>";
        //     echo "Telefones: <br>";
        //     foreach ($client->phones as $phone) {
        //         echo $phone->phone_number . "<br>";
        //     }
        // }
    }

    public function BelongsTo()
    {
        // // neste método vamos pegar o telefone e descobrir a que cliente pertence
        // $phone1 = Phone::find(10);
        // $client = $phone1->client;
        // echo "Telefone: " . $phone1->phone_number . "<br>";
        // echo "Cliente: " . $client->client_name . "<br>";

        // outra forma é usando o método with()
        // $phone2 = Phone::with('client')->find(10);
        // echo "<br>";
        // echo "Telefone: " . $phone2->phone_number . "<br>";
        // echo "Cliente: " . $phone2->client->client_name . "<br>";
    }

    public function ManyToMany()
    {
        // // Buscar um cliente e todos os produtos que ele comprou
        // $client1 = Client::find(1);
        // $products = $client1->products;
        // echo "Cliente: " . $client1->client_name . '<br>';
        // echo "Produtos: <br><br>";
        // foreach ($products as $product) {
        //     echo $product->product_name . '<br>';
        // }

        // Agora vamos buscar um produto e obter todos os clientes que "compraram" esse determinado produto
        $product1 = Product::find(1);
        $clients = $product1->clients;
        echo "Produto: " . $product1->product_name . '<br>';
        echo "Clientes: <br><br>";
        foreach ($clients as $client) {
            echo $client->client_name . '<br>';
        }
    }

    public function RunningQueries()
    {
        // // Buscando um cliente e os seus telefones, mas só os telefones que começa com 8
        // $client1 = Client::find(1);
        // // $phones = $client1->phones->where('phone_number', 'like', '8');
        // $phones = $client1->phones()->where('phone_number', 'like', '8%')->get();
        // echo "Cliente: " . $client1->client_name . "<br>";
        // echo "Telefones: <br>";
        // foreach ($phones as $phone) {
        //     echo $phone->phone_number . "<br>";
        // }

        // dd([
        //     $client1->toArray(),
        //     $phones->toArray()
        // ]);

        // // Buscar todos os produtos que um cliente comprou, mas só os produtos que custam mais de 50
        // $client2 = Client::find(1);
        // $products = $client2->products()->where('price', '>', 50)->orderBy('product_name')->get();
        // echo "Cliente: " . $client2->client_name . "<br>";
        // echo "Produtos: <br>";
        // foreach ($products as $product) {
        //     echo $product->product_name . " - " . $product->price . "<br>";
        // }

        // Buscar produtos com preço acima de 50, que um cliente comprou e listá-los por ordem alfabética do nome
        // Não repetir os produtos, exibir apenas quais o cliente já comprou
        $client2 = Client::find(1);
        $products = $client2->products()
                            ->where('price', '>', 50)
                            ->distinct()
                            ->orderBy('product_name')
                            ->get();
        echo "Cliente: " . $client2->client_name . "<br>";
        echo "Produtos: <br>";
        foreach ($products as $product) {
            echo $product->product_name . " - " . $product->price . "<br>";
        }
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
