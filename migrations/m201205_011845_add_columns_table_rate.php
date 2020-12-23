<?php

use yii\db\Migration;

/**
 * Class m201205_011845_add_columns_table_rate
 */
class m201205_011845_add_columns_table_rate extends Migration
{
    private $tableName = 'rate';
    
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'quantity_min', $this->integer());
        $this->addColumn($this->tableName, 'quantity_max', $this->integer());
        $this->addColumn($this->tableName, 'quantity_note', $this->string());
    }

    public function safeDown()
    {
        $this->dropColumn($this->tableName, 'quantity_min');
        $this->dropColumn($this->tableName, 'quantity_max');
        $this->dropColumn($this->tableName, 'quantity_note');
    }
}
