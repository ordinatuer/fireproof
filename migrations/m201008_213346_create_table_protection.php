<?php

use yii\db\Migration;

/**
 * Class m201008_213346_create_table_protection
 */
class m201008_213346_create_table_protection extends Migration
{
    private $tableName = 'protection';

    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'protection_id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'solution' => $this->boolean(),
            'sulute' => $this->integer(),
            'solvent' => $this->integer(),
            'type' => $this->integer()->defaultValue(1),
            'toxic' => $this->integer(),
            't_work_max' => $this->integer(),
            't_work_min' => $this->integer(),
            't_store_max' => $this->integer(),
            't_store_min' => $this->integer(),
            'type_area' => $this->integer(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
