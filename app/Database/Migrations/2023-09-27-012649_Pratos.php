<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePratosTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idPrato' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'descricao' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
            ],
        ]);
        $this->forge->addKey('idPrato', true);
        $this->forge->createTable('Pratos');
    }

    public function down()
    {
        $this->forge->dropTable('Pratos');
    }
}
