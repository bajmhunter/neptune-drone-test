<?php


use Phinx\Migration\AbstractMigration;

class ConfigData extends AbstractMigration
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
                'key' => 'app_version',
                'value' => '0.1'
            ),
            array(
                'key' => 'branch',
                'value' => 'develop'
            ),
            array(
                'key' => 'company',
                'value' => 'Neptune'
            ),
            array(
                'key' => 'config_version',
                'value' => '0.1'
            ),
            array(
                'key' => 'language',
                'value' => 'English'
            ),
            array(
                'key' => 'language_code',
                'value' => 'en-GB'
            ),
            array(
                'key' => 'login_default',
                'value' => 'password'
            ),
            array(
                'key' => 'pos_version',
                'value' => '0.1'
            ),
            array(
                'key' => 'repair_version',
                'value' => '0.1'
            ),
            array(
                'key' => 'timezone',
                'value' => 'Europe/London'
            )
        );

        $this->insert('app_config', $rows);

        $table = $this->table('app_config');
        $table->save();
    }
}
