<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cv extends Migration
{
    public function up()
    {
        $this->forge->addField([
          'id' => [
            'type' => 'INT',
            'constraint' => 5,
            'auto_increment' => true
          ],
          'name' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
          ],
          'title' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
          ],
          'address' => [
            'type' => 'VARCHAR',
            'constraint' => 200,
          ],
          'phone' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
          ],
          'email' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
          ],
          'about' => [
            'type' => 'VARCHAR',
            'constraint' => 500,
          ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('cv');
    }

    public function down()
    {
        $this->forge->dropTable('cv');
    }
}
