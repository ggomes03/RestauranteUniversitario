<?php

namespace App\Models;

use CodeIgniter\Database\Database;
use CodeIgniter\Database\Query;
use CodeIgniter\Model;
use PSpell\Config;

class UsersModel extends Model
{
    public function getUsers(){
        $db = \Config\Database::connect();

        $query = $db->table('usuario')
                    ->get();
                    
        $results = $query->getResult();

        return $results;            
    }

    public function updateUserToPrad($idUser){
        $db = \Config\Database::connect();

        $dataUser = ['tipoUsuario' => 2];

        $query = $db->table('usuario')
                    ->where('idUsuario', $idUser)
                    ->update($dataUser);
    }

    public function updateUserToStudent($idUser){
        $db = \Config\Database::connect();

        $dataUser = ['tipoUsuario' => 1];

        $query = $db->table('usuario')
                    ->where('idUsuario', $idUser)
                    ->update($dataUser);
    }
}

?>