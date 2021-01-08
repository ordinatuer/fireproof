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
            'protection_id' => Yii::t('app', 'Protection'),
            'description' => Yii::t('app', 'Description'),
            'note' => Yii::t('app', 'Note'),
            'quantity' => Yii::t('app', 'Quantity'),
            'quantity_min' => Yii::t('app', 'Quantity - minimum'),
            'quantity_max' => Yii::t('app', 'Quantity - maximum'),
            'quantity_note' => Yii::t('app', 'Quantity - note'),
            'sulute' => Yii::t('app', 'Solute ratio'),
            'solvent' => Yii::t('app', 'Solvent ratio'),
            'layers' => Yii::t('app', 'Layers'),
            'inter_layer' => Yii::t('app', 'Inter layer'),
            'ready' => Yii::t('app', 'Protection ready'),
            'quantityName' => Yii::t('app', 'Quantity'),
        ];
    }


    public function getQuantityName()
    {
        if ($this->quantity) {
            return $this->quantity;
        }

        if ($this->quantity_min AND $this->quantity_max) {
            return $this->quantity_min . ' - ' . $this->quantity_max;
        }

        return NULL;
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
