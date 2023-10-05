<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTipoUsuarioTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idTipoUsuario' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'descricao' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
        ]);
        $this->forge->addKey('idTipoUsuario', true);
        $this->forge->createTable('TipoUsuario');
    }

    public function down()
    {
        $this->forge->dropTable('TipoUsuario');
    }
}