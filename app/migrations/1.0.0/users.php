<?php

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Mvc\Model\Migration;

/**
 * Class UsersMigration_100
 */
class UsersMigration_100 extends Migration
{
    /**
     * Define the table structure
     * @return void
     */
    public function morph()
    {
        $this->morphTable('users', [
                'columns' => [
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
                        'name',
                        [
                            'type'    => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size'    => 50,
                            'after'   => 'id',
                        ]
                    ),
                ],
                'indexes' => [
                    new Index('PRIMARY', ['id'], 'PRIMARY'),
                ],
                'options' => [
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
