<?php

use yii\db\Migration;

/**
 * Class m201008_220731_create_table_rate
 */
class m201008_220731_create_table_rate extends Migration
{
    private $tableName = 'rate';

    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'rate_id' => $this->primaryKey(),
            'protection_id' => $this->integer(),
            'description' => $this->text(),
            'note' => $this->text(),
            'quantity' => $this->integer(),
            'sulute' => $this->integer(),
            'solvent' => $this->integer(),
            'layers' => $this->integer(),
            'inter_layer' => $this->integer(),
            'ready' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk_rate_protection',
            'rate',
            'protection_id',
            'protection',
            'protection_id'
        );
    }

    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
