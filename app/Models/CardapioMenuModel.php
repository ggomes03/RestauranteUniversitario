<?php

namespace App\Models;

use CodeIgniter\Model;

class CardapioMenuModel extends Model
{
    protected $table = 'Cardapios'; // Nome da tabela no banco de dados
    protected $allowedFields = ['Data', 'NomePrato', 'DiaSemana']; // Campos permitidos

    // Função para inserir um prato no banco de dados
    public function inserirPrato($data, $nomePrato, $diaSemana)
    {
        // Criar um array associativo com os dados a serem inseridos
        $dadosInsercao = [
            'Data' => $data,
            'NomePrato' => $nomePrato,
            'DiaSemana' => $diaSemana,
        ];

        // Inserir os dados na tabela 'Cardapios'
        $inserido = $this->insert($dadosInsercao);

        return $inserido; // Retorna true se inserido com sucesso, senão false
    }
}
