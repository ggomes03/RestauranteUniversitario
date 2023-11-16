<?php 
namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model{

    protected $table = 'feedback';

    public function getFeedback(){
        try {
            $query = $this->db->table($this->table)->select('idPergunta, idAlternativas')->get();
            return $query->getResult();
        } 
        catch (\Exception $e) {
            // Lida com erros de consulta do banco de dados
            log_message('error', 'Erro ao obter perguntas: ' . $e->getMessage());
            return [];
        }
    }
    
}
?>