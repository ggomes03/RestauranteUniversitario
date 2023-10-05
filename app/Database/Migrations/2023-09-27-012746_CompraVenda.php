<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCompraVendaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'data' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'idTicket' => [
                'type' => 'INT',
            ],
            'idUsuario' => [
                'type' => 'INT',
            ],
        ]);
        $this->forge->addKey(['idTicket', 'idUsuario']);
        $this->forge->addForeignKey('idTicket', 'ticket', 'idTicket');
        $this->forge->addForeignKey('idUsuario', 'usuario', 'idUsuario');
        $this->forge->createTable('compraVenda');
    }

    public function down()
    {
        $this->forge->dropTable('compraVenda');
    }
}
