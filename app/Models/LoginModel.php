<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class UserModel extends Model
{
    public function getUser(){
        $db = \Config\Database::connect();
        
        $query = $db->query("SELECT * FROM usuario WHERE email = ? AND senha = ?");
        
        $results = $query->getResult();

        return $results;
    }

}