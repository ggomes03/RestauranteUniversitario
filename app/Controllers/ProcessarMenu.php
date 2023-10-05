<?php

namespace App\Controllers;

use App\Models\CardapioMenuModel;

class ProcessarMenu extends BaseController
{
    public function index()
    {
        return view('application/header') . view('cardapio/menu'); // Alteração aqui
    }

    public function processaMenu()
    {
        // Recebe os dados do formulário
        $data = $this->request->getPost('data');
        $nomePrato = $this->request->getPost('nomePrato');
        $diaSemana = $this->request->getPost('diaSemana');

        // Instancie o modelo CardapioMenuModel
        $model = new CardapioMenuModel();

        // Verifique se todos os campos estão preenchidos (você pode adicionar mais validações conforme necessário)
        if (!empty($data) && !empty($nomePrato) && !empty($diaSemana)) {
            // Chama o método inserirPrato do modelo para inserir o prato no banco
            $inserido = $model->inserirPrato($data, $nomePrato, $diaSemana);

            if ($inserido) {
                // Redireciona com uma mensagem de sucesso, você pode personalizar a mensagem
                return redirect()->to('processarMenu')->with('success', 'Prato cadastrado com sucesso!');
            } else {
                // Redireciona com uma mensagem de erro, você pode personalizar a mensagem
                return redirect()->to('processarMenu')->with('error', 'Erro ao cadastrar o prato.');
            }
        } else {
            // Redireciona com uma mensagem de erro se algum campo estiver em branco
            return redirect()->to('processarMenu')->with('error', 'Todos os campos são obrigatórios.');
        }
    }
}
