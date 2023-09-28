<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateQuantidadePermitidaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idquantidadePermitida' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'idUsuario' => [
                'type' => 'INT',
            ],
            'quantidadePermitidaVenda' => [
                'type' => 'INT',
                'null' => true,
            ],
            'quantidadePermitidaValidacao' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
                'null' => true,
            ],
            'data' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('idquantidadePermitida', true);
        $this->forge->addForeignKey('idUsuario', 'usuario', 'idUsuario');
        $this->forge->createTable('quantidadePermitida');
    }

    public function down()
    {
        $this->forge->dropTable('quantidadePermitida');
    }
}
