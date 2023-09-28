<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsuarioTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idUsuario' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tipoUsuario' => [
                'type' => 'INT',
                'null' => true,
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
                'null' => true,
            ],
            'senha' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('idUsuario', true);
        $this->forge->addForeignKey('tipoUsuario', 'TipoUsuario', 'idTipoUsuario');
        $this->forge->createTable('usuario');
    }

    public function down()
    {
        $this->forge->dropTable('usuario');
    }
}
