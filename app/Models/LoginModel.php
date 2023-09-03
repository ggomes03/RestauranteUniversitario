<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class LoginModel extends Model
{
    public function getUser($email, $pass=0){
        $db = \Config\Database::connect();
        
        if($pass != 0){
            $query = $db->table('usuario')
            ->where('email', $email)
            -> where('senha', $pass)
            ->get();
        } else {
            $query = $db->table('usuario')
            ->where('email', $email)
            ->get();
        }
        $results = $query->getRow();
        return $results;
    }

    public function insertUser($name, $email, $pass){
        $db = \Config\Database::connect();

        $data = [
            'tipoUsuario' => 1,
            'nome' => $name,
            'email' => $email,
            'senha' => $pass
        ];

        $builder = $db->table('usuario');
        $builder->insert($data);

        return redirect()->to('/');

    }

}

