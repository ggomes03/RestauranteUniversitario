<?php 
namespace App\Controllers;

use App\Models\FeedbackModel;

class Feedback extends BaseController{
    public function feedbackView (){
        $model = new FeedbackModel();

        $data['idPergunta'] = $model->getIdPergunta();
        $data['idAlternativas'] = $model->getIdAlternativas();
        
        
        return view('application/header').view('adm/feedback').view('application/footer');
    }
}
?>