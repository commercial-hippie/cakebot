<?php

use Phinx\Migration\AbstractMigration;

class Initial extends AbstractMigration
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
        $channels = $this->table('channels');
        $channels
            ->addColumn('enabled', 'boolean', ['null' => false])
            ->addColumn('name', 'string', ['null' => false])
            ->addColumn('created', 'datetime', ['null' => true, 'default' => null])
            ->addColumn('modified', 'datetime', ['null' => true, 'default' => null])
            ->create();

        $logs = $this->table('logs');
        $logs
            ->addColumn('channel', 'string', ['null' => false, 'limit' => 200])
            ->addColumn('username', 'string', ['null' => false])
            ->addColumn('text', 'string', ['null' => false])
            ->addColumn('created', 'datetime', ['null' => true, 'default' => null])
            ->create();

        $tells = $this->table('tells');
        $tells
            ->addColumn('keyword', 'string', ['null' => false, 'limit' => 1000])
            ->addColumn('message', 'text', ['null' => false])
            ->addColumn('created', 'datetime', ['null' => true, 'default' => null])
            ->addColumn('modified', 'datetime', ['null' => true, 'default' => null])
            ->create();

        $users = $this->table('users');
        $users
            ->addColumn('username', 'string', ['null' => false])
            ->addColumn('date', 'datetime', ['null' => true, 'default' => null])
            ->addColumn('created', 'datetime', ['null' => true, 'default' => null])
            ->create();
    }
}
