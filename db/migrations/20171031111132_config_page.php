<?php


use Phinx\Migration\AbstractMigration;

class ConfigPage extends AbstractMigration
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
                'key' => 'address',
                'value' => '123 Unknown Street'
            ),
            array(
                'key' => 'website',
                'value' => 'www.example.com'
            ),
            array(
                'key' => 'email',
                'value' => 'admin@example.com'
            ),
            array(
                'key' => 'phone',
                'value' => '+44 (0)1234 567 891'
            ),
            array(
                'key' => 'fax',
                'value' => '+44 (0)1234 567 892'
            ),
            array(
                'key' => 'vat_number',
                'value' => '123 456 789'
            )
        );

        $this->insert('app_config', $rows);

        $table = $this->table('app_config');
        $table->save();
    }
}
