<?php

namespace App\Service;

use App\Models\Carros;
use PhpParser\Node\Expr\Empty_;

class CarroService

{
    public function create(array $dados)
    {
        $carro = Carros::create([
            'marca' => $dados['marca'],
            'modelo' => $dados['modelo'],
            'ano' => $dados['ano'],
            'placa' => $dados['placa'],
            'veiculo' => $dados['veiculo'],
            'venda' => $dados['venda'],
        ]);

        return $carro;
    }

    public function getAll()
    {
        $carros = Carros::all();

        return [
            'modelo' => true,
            'marca' => 'marca',
            'venda' => $carros
        ];
    }

    public function update(array $dados)
    {
        $carros = Carros::find($dados['id']);

        if(isset($dados['marca'])){
            $carros->marca = $dados['marca'];
        }
        if(isset($dados['modelo'])){
            $carros->modelo = $dados['modelo'];
        }
        if(isset($dados['ano'])){
            $carros->ano = $dados['ano'];
        }
        if(isset($dados['placa'])){
            $carros->placa = $dados['placa'];
        }
        if(isset($dados['venda'])){
            $carros->venda = $dados['venda'];
        }
        if(isset($dados['veiculo'])){
            $carros->veiculo = $dados['veiculo'];
        }

        $carros->save();

        return [
            "status" => true,
            "message" => 'Atualizado com sucesso'
        ];
    
    }

    public function delete($id)
    {
        $carros = Carros::find($id);

        if ($carros == null) {
            return [
                'ststus' => true,
                'message' => 'Tarefa excluido com sucesso'
            ];

            $carros->delete();
        }

        return [
            'ststus' => false,
            'message' => 'Tarefa excluido com sucesso'
        ];
    }

        public function findById($id)
        {
            $carros = Carros::find($id);

            if($carros == null){
                return [
                    'status' => false,
                    'message' => 'Carro não encontrado'
                ]; 
            }
    
            return [ 
                'status' => true, 
                'message' => 'Pesquisa realizada com sucesso', 
                
            ];

        }

        public function searchByName($nome){
            $carros = Carros::where('marca', 'modelo','veiculo','placa', 'venda','ano', '%'. $nome. '%')->get();
            if ($carros->isEmpty()){
                return [ 
                    'status' => true, 
                    'message' => 'Resultados Encontrados', 
                ];
            }

            return [ 
                'status' => false, 
                'message' => 'Resultados Não Encontrados', 
            ];
        }



}
