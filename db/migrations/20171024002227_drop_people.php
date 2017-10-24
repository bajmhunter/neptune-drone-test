<?php


use Phinx\Migration\AbstractMigration;

class DropPeople extends AbstractMigration
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
        $this->dropTable('people');
    }

    public function down()
    {
        $table = $this->table('people', ['id' => false, 'primary_key' => 'person_id']);
        $table->addColumn('person_id', 'integer', ['limit' => 10])
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
              ->addColumn('country', 'string', ['limit' => 255, 'default' => 'UK'])
              ->create();

        $rows = array(
            array(
                'person_id' => '1',
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
                'country' => 'UK'
            )
        );

        $this->insert('people', $rows);

        $table = $this->table('people');
        $table->save();

    }
}
