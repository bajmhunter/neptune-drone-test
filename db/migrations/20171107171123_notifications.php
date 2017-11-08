<?php


use Phinx\Migration\AbstractMigration;

class Notifications extends AbstractMigration
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
                'key' => 'notify_position',
                'value' => 'toastr-top-right'
            ),
            array(
                'key' => 'notify_progress',
                'value' => 'false'
            ),
            array(
                'key' => 'notify_timeout',
                'value' => '5000'
            )
        );

        $this->insert('app_config', $rows);

        $table = $this->table('app_config');
        $table->save();
    }
}
