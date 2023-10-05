<?php

namespace App\Models;

use CodeIgniter\Database\Database;
use CodeIgniter\Model;
use PSpell\Config;

class CardapioMenuModel extends Model
{
    protected $table = 'Cardapios'; // Nome da tabela no banco de dados
    protected $allowedFields = ['Data', 'NomePrato', 'DiaSemana']; // Campos permitidos

    // Função para inserir um prato no banco de dados
    public function inserirPrato($data, $nomePrato, $diaSemana)
    {
        // Criar um array associativo com os dados a serem inseridos
        $dadosInsercao = [
            'idPrato' => $nomePrato,
            'Data' => $diaSemana,
            
        ];

        $db = \Config\Database::connect();

        $builder = $db->table('cardapios');
        $builder->insert($dadosInsercao);

        // Inserir os dados na tabela 'Cardapios'
        // $inserido = $this->insert($dadosInsercao);

        // return $inserido; // Retorna true se inserido com sucesso, senão false
    }

    // Função para buscar todos os pratos do banco de dados
    public function buscarPratos()
{
    return $this->db->table('Pratos')
                    ->select('*')
                    ->get()
                    ->getResult();
}
}

