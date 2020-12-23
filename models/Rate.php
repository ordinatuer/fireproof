<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rate".
 *
 * @property int $rate_id
 * @property int|null $protection_id
 * @property string|null $description
 * @property string|null $note
 * @property int|null $quantity
 * @property int|null $sulute
 * @property int|null $solvent
 * @property int|null $layers
 * @property int|null $inter_layer
 * @property int|null $ready
 * @property int|null $quantity_min
 * @property int|null $quantity_max
 * @property string|null $quantity_note
 *
 * @property Protection $protection
 */
class Rate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['protection_id', 'quantity', 'quantity_min', 'quantity_max', 'sulute', 'solvent', 'layers', 'inter_layer', 'ready'], 'integer'],
            [['description', 'note', 'quantity_note'], 'string'],
            [['protection_id'], 'exist', 'skipOnError' => true, 'targetClass' => Protection::className(), 'targetAttribute' => ['protection_id' => 'protection_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rate_id' => 'Rate ID',
            'protection_id' => 'Состав',
            'description' => 'Описание',
            'note' => 'Примечание',
            'quantity' => 'Расход',
            'quantity_min' => 'Расход - минимальный',
            'quantity_max' => 'Расход - максимальный',
            'quantity_note' => 'Примечание по расходу',
            'sulute' => 'Доля концентрата',
            'solvent' => 'Доля растворителя',
            'layers' => 'Количество слоёв',
            'inter_layer' => 'Сушка между слоями',
            'ready' => 'Полное высыхание',
        ];
    }

    /**
     * Gets query for [[Protection]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProtection()
    {
        return $this->hasOne(Protection::className(), ['protection_id' => 'protection_id']);
    }
}
