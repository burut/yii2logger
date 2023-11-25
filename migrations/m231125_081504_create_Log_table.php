<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m231125_081504_create_Log_table.
 */
class m231125_081504_create_Log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Log', [
            'id'         => Schema::TYPE_PK,
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'message'    => Schema::TYPE_TEXT . ' DEFAULT NULL',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('Log');
    }
}
