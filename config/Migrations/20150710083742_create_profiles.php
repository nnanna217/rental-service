<?php
use Phinx\Migration\AbstractMigration;

class CreateProfiles extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('profiles');
        $table->addColumn('user_id', 'integer', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('firstname', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('middlename', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('lastname', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('address', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('phone_number', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('next_of_kin', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('dob', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('active_fg', 'integer', [
            'default' => 1,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('created_by', 'integer', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('modified_by', 'integer', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->create();
    }
}
