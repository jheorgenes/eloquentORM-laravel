<?php

namespace App\Http\Controllers;

use App\Models\Client;

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

        // Se quiser buscar um conjunto de clientes e seus telefones
        $clients = Client::with('phone')->get();
        print_r($clients->toJson()); die();
        // foreach ($clients as $client) {
        //     echo "<br>";
        //     echo "Nome do cliente: " . $client->client_name . " - Telefone " . $client->phone->phone_number;
        // }
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
