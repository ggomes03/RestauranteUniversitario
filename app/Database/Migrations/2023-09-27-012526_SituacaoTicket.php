<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSituacaoTicketTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idSituacaoTicket' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'descricao' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('idSituacaoTicket', true);
        $this->forge->createTable('situacaoTicket');
    }

    public function down()
    {
        $this->forge->dropTable('situacaoTicket');
    }
}
