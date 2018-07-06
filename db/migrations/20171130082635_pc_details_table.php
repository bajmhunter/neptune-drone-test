<?php


use Phinx\Migration\AbstractMigration;

class PcDetailsTable extends AbstractMigration
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
        $table = $this->table('pc_details', ['id' => false]);
        $table->addColumn('pc_id', 'integer', ['default' => '0', 'limit' => '10'])
              ->addColumn('customer_id', 'integer', ['default' => '0', 'limit' => '10'])
              ->addColumn('pc_make', 'integer', ['limit' => 1])
              ->addColumn('pc_ram', 'string', ['limit' => 255])
              ->addColumn('pc_processor', 'string', ['limit' => 255])
              ->addColumn('pc_type', 'integer', ['limit' => 1])
              ->addColumn('pc_os', 'integer', ['limit' => 1])
              ->addColumn('pc_hdd', 'string', ['limit' => 255])
              ->addColumn('pc_serial', 'string', ['limit' => 255])
              ->addColumn('pc_licence', 'string', ['limit' => 255])
              ->addColumn('pc_extra', 'text')
              ->save();
    }
}
