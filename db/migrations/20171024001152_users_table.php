<?php


use Phinx\Migration\AbstractMigration;

class UsersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('users', ['primary_key' => 'id']);
        $table->addColumn('username', 'string', ['limit' => 255])
              ->addColumn('password', 'string', ['limit' => 255])
              ->addColumn('deleted', 'integer', ['limit' => 1])
              ->addColumn('first_name', 'string', ['limit' => 255])
              ->addColumn('last_name', 'string', ['limit' => 255])
              ->addColumn('gender', 'integer', ['limit' => 1])
              ->addColumn('phone_number', 'string', ['limit' => 255])
              ->addColumn('email', 'string', ['limit' => 255])
              ->addColumn('address_1', 'string', ['limit' => 255])
              ->addColumn('address_2', 'string', ['limit' => 255])
              ->addColumn('city', 'string', ['limit' => 255])
              ->addColumn('county', 'string', ['limit' => 255])
              ->addColumn('postcode', 'string', ['limit' => 255])
              ->addIndex('username', ['unique' => true])
              ->create();

    }
}
