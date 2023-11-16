<?php

namespace App\Controllers;

use App\Models\FormModel;

class Forms extends BaseController {

    public function answerform() {
        $model = new FormModel();
        
        // Obtém as perguntas e alternativas do modelo
        $data['perguntas'] = $model->getPerguntas();
        $data['alternativas'] = $model->getAlternativas();
    
        // Carrega a view para exibir as perguntas e alternativas
        return view('application/header').view('student/answerform', $data).view('application/footer');
    
        if ($this->request->getPost())
        {
            $questao = $this->request->getPost('idPergunta');
            $resposta = $this->request->getPost('idAlternativas');

        $model->salvarRespostas ($questao, $resposta);
        return redirect()->to('student/student');
    }
        }
    
}
?>