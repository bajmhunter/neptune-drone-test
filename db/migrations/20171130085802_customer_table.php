<?php


use Phinx\Migration\AbstractMigration;

class CustomerTable extends AbstractMigration
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
        $table =$this->table('customers', ['id' => 'customer_id']);
        $table->addColumn('cust_id', 'integer', ['default' => '0', 'limit' => '10'])
              ->addColumn('cust_name', 'string', ['limit' => 255])
              ->addColumn('cust_phone', 'string', ['limit' => 255])
              ->addColumn('cust_mobile', 'string', ['limit' => 255])
              ->addColumn('cust_email', 'string', ['limit' => 255])
              ->addColumn('cust_address1', 'string', ['limit' => 255])
              ->addColumn('cust_address2', 'string', ['limit' => 255])
              ->addColumn('cust_city', 'string', ['limit' => 255])
              ->addColumn('cust_county', 'string', ['limit' => 255])
              ->addColumn('cust_postcode', 'string', ['limit' => 255])
              ->addColumn('cust_source', 'integer', ['limit' => 1])
              ->save();
    }
}
