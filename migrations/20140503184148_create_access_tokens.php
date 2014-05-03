<?php

use Phinx\Migration\AbstractMigration;

class CreateAccessTokens extends AbstractMigration
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
      $tokens = $this->table('access_tokens');
      $tokens->addColumn('key_id', 'biginteger')
        ->addColumn('access_token', 'string')
        ->addColumn('expires', 'datetime')
        ->addColumn('created_at', 'datetime')
        ->addColumn('updated_at', 'datetime')
        ->addIndex('key_id')
        ->addIndex('access_token')
        ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
      $this->dropTable('access_tokens');
    }
}
