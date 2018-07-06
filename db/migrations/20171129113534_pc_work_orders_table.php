<?php


use Phinx\Migration\AbstractMigration;

class PcWorkOrdersTable extends AbstractMigration
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
        $table = $this->table('work_orders', ['id' => 'workorder_id']);
        $table->addColumn('computer_id', 'integer', ['default' => '0', 'limit' => '10'])
              ->addColumn('customer_id', 'integer', ['default' => '0', 'limit' => '10'])
              ->addColumn('problem', 'text', ['null' => true])
              ->addColumn('customer_notes', 'text', ['null' => true])
              ->addColumn('tech_notes', 'text', ['null' => true])
              ->addColumn('arrived', 'integer', ['limit' => 10])
              ->addColumn('collected', 'integer', ['limit' => 10])
              ->addColumn('status', 'integer', ['limit' => 1, 'default' => 1])
              ->addColumn('called', 'integer', ['limit' => 1, 'default' => 0])
              ->addColumn('priority', 'integer', ['limit' => 1, 'default' => 0])
              ->addColumn('passwords', 'string', ['limit' => 255])
              ->addColumn('assets', 'string', ['limit' => 255])
              ->addColumn('viruses_found', 'string', ['limit' => 255])
              ->addColumn('bench', 'integer', ['limit' => 255, 'default' => 0])
              ->addColumn('work_area', 'integer', ['limit' => 255, 'default' => 0])
              ->save();
    }
}
