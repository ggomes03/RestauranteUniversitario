<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTicketTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idTicket' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'cod' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'situacaoTicket' => [
                'type' => 'INT',
            ],
            'dataValidacao' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'valor' => [
                'type' => 'DOUBLE',
            ],
            'vencimento' => [
                'type' => 'DATE',
            ],
            'idpromocao' => [
                'type' => 'INT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('idTicket', true);
        $this->forge->addForeignKey('situacaoTicket', 'situacaoTicket', 'idSituacaoTicket');
        $this->forge->addForeignKey('idpromocao', 'promocoes', 'idpromocoes');
        $this->forge->createTable('ticket');
    }

    public function down()
    {
        $this->forge->dropTable('ticket');
    }
}
