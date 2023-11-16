<?php

namespace App\Controllers;

use App\Models\CardapioMenuModel;

class ProcessarMenu extends BaseController
{
    public function index()
    {
        // Chamando a função listarPratos para buscar os pratos do banco de dados
        $pratos = $this->listarPratos();

        // Passando os pratos para a view
        if(session()->get('user')->tipoUsuario == 1 ){
            return redirect('/');
        } else {
            return view('application/header', ['pratos' => $pratos]) . view('cardapio/menu', ['pratos' => $pratos]);
        }
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
                // Redireciona com uma mensagem de sucesso
                return redirect()->to('menu')->with('success', 'Prato cadastrado com sucesso!');
            } else {
                // Redireciona com uma mensagem de erro
                return redirect()->to('menu')->with('error', 'Erro ao cadastrar o prato.');
            }
        } else {
            // Redireciona com uma mensagem de erro se algum campo estiver em branco
            return redirect()->to('menu')->with('error', 'Todos os campos são obrigatórios.');
        }
    }

    public function listarPratos()
    {
        // Instancie o modelo CardapioMenuModel
        $model = new CardapioMenuModel();

        // Chama a função buscarPratos para obter os pratos
        $pratos = $model->buscarPratos();

        return $pratos;
    }
}

