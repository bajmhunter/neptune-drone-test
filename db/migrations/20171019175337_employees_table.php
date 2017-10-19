<?php


use Phinx\Migration\AbstractMigration;

class EmployeesTable extends AbstractMigration
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
        $table = $this->table('employees', ['id' => false, 'primary_key' => 'person_id']);
        $table->addColumn('person_id', 'integer', ['limit' => 10])
              ->addColumn('username', 'string', ['limit' => 255])
              ->addColumn('password', 'string', ['limit' => 255])
              ->addColumn('deleted', 'integer', ['limit' => 1])
              ->addIndex('username', ['unique' => true])
              ->create();

    }
}
