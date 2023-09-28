<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePromocoesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idpromocoes' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'inicioPromocao' => [
                'type' => 'DATETIME',
            ],
            'fimPromocao' => [
                'type' => 'DATETIME',
            ],
            'valor' => [
                'type' => 'DOUBLE',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('idpromocoes', true);
        $this->forge->createTable('promocoes');
    }

    public function down()
    {
        $this->forge->dropTable('promocoes');
    }
}
