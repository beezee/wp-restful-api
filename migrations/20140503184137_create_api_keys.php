<?php

use Phinx\Migration\AbstractMigration;

class CreateApiKeys extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * Uncomment this method if you would like to use it.
     *
    public function change()
    {
    }
    */
    
    /**
     * Migrate Up.
     */
    public function up()
    {
      $keys = $this->table('api_keys'); 
      $keys->addColumn('user_id', 'biginteger')
        ->addColumn('api_key', 'string')
        ->addColumn('secret', 'string')
        ->addColumn('created_at', 'datetime')
        ->addColumn('updated_at', 'datetime')
        ->addIndex('api_key')
        ->addIndex('user_id', array('unique' => true))
        ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
      $this->dropTable('api_keys');
    }
}
