<?php

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class NotesMigration_100
 */
class NotesMigration_100 extends Migration
{
    /**
     * Define the table structure
     * @return void
     */
    public function morph()
    {
        $this->morphTable('notes', [
                'columns'    => [
                    new Column(
                        'id',
                        [
                            'type'          => Column::TYPE_INTEGER,
                            'unsigned'      => true,
                            'notNull'       => true,
                            'autoIncrement' => true,
                            'size'          => 10,
                            'first'         => true,
                        ]
                    ),
                    new Column(
                        'text',
                        [
                            'type'    => Column::TYPE_TEXT,
                            'notNull' => true,
                            'size'    => 1,
                            'after'   => 'id',
                        ]
                    ),
                    new Column(
                        'created_by',
                        [
                            'type'     => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'notNull'  => true,
                            'size'     => 10,
                            'after'    => 'text',
                        ]
                    ),
                ],
                'indexes'    => [
                    new Index('PRIMARY', ['id'], 'PRIMARY'),
                    new Index('FK_notes_users', ['created_by'], null),
                ],
                'references' => [
                    new Reference(
                        'FK_notes_users',
                        [
                            'referencedTable'   => 'users',
                            'referencedSchema'  => 'test',
                            'columns'           => ['created_by'],
                            'referencedColumns' => ['id'],
                            'onUpdate'          => 'RESTRICT',
                            'onDelete'          => 'RESTRICT',
                        ]
                    ),
                ],
                'options'    => [
                    'TABLE_TYPE'      => 'BASE TABLE',
                    'AUTO_INCREMENT'  => '1',
                    'ENGINE'          => 'InnoDB',
                    'TABLE_COLLATION' => 'utf8_general_ci',
                ],
            ]
        );
    }
    
    /**
     * Run the migrations
     * @return void
     */
    public function up()
    {
    
    }
    
    /**
     * Reverse the migrations
     * @return void
     */
    public function down()
    {
    
    }
    
}
