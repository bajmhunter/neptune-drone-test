<?php


use Phinx\Migration\AbstractMigration;

class EmployeeData extends AbstractMigration
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
    public function up()
    {

        $rows = array(
            array(
                'person_id' => '1',
                'username' => 'bryce',
                'password' => 'f74d8f1afb18d851bca9f5458409072aaf28265facceaad',
                'deleted' => '0'
            )
        );

        $this->insert('employees', $rows);

        $table = $this->table('employees');
        $table->save();
    }
}
