<?php
use Phinx\Migration\AbstractMigration;

class Migratepoint1 extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('categories');
        $table
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('description', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('active_fg', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('parent_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('lft', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('rght', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('category_type', 'string', [
                'default' => null,
                'limit' => 32,
                'null' => true,
            ])
            ->create();
        $table = $this->table('customers');
        $table
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('category_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('address', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('contact_person', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('contact_email', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('contact_phone', 'string', [
                'default' => null,
                'limit' => 32,
                'null' => false,
            ])
            ->addColumn('occasion', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('created_by', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('modified_by', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();
        $table = $this->table('profiles');
        $table
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 4,
                'null' => false,
            ])
            ->addColumn('firstname', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('middlename', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('lastname', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('address', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('phone_number', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('dob', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('active_fg', 'integer', [
                'default' => 1,
                'limit' => 4,
                'null' => true,
            ])
            ->addColumn('created_by', 'integer', [
                'default' => null,
                'limit' => 4,
                'null' => true,
            ])
            ->addColumn('modified_by', 'integer', [
                'default' => null,
                'limit' => 4,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();
        $table = $this->table('sessions', ['id' => false, 'primary_key' => ['id']]);
        $table
            ->addColumn('id', 'string', [
                'default' => '',
                'limit' => 40,
                'null' => false,
            ])
            ->addColumn('data', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('expires', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();
        $table = $this->table('users');
        $table
            ->addColumn('username', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('role', 'string', [
                'default' => 'user',
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('active_fg', 'integer', [
                'default' => 1,
                'limit' => 4,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('level', 'integer', [
                'default' => 1,
                'limit' => 1,
                'null' => false,
            ])
            ->create();
    }

    public function down()
    {
        $this->dropTable('categories');
        $this->dropTable('customers');
        $this->dropTable('profiles');
        $this->dropTable('sessions');
        $this->dropTable('users');
    }
}
