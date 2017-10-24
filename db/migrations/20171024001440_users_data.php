<?php


use Phinx\Migration\AbstractMigration;

class UsersData extends AbstractMigration
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
                'username' => 'admin',
                'password' => 'f74d8f1afb18d851bca9f5458409072aaf28265facceaad',
                'deleted' => '0',
                'first_name' => 'Bryce',
                'last_name' => 'Hunter',
                'gender' => '1',
                'phone_number' => '07880621412',
                'email' => 'bryce.hunter@hotmail.com',
                'address_1' => '12 Camp Place',
                'address_2' => '',
                'city' => 'Callander',
                'county' => 'Perthshire',
                'postcode' => 'FK17 8DF',
            )
        );

        $this->insert('users', $rows);

        $table = $this->table('users');
        $table->save();
    }
}
