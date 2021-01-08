<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use app\models\Rate;
use app\components\BiKey;

/**
 * This is the model class for table "protection".
 *
 * @property int $protection_id
 * @property string $name
 * @property string|null $description
 * @property int|null $solution
 * @property int|null $sulute
 * @property int|null $solvent
 * @property int|null $type
 * @property int|null $toxic
 * @property int|null $t_work_max
 * @property int|null $t_work_min
 * @property int|null $t_store_max
 * @property int|null $t_store_min
 * @property int|null $type_area
 *
 * @property Rate[] $rates
 */
class Protection extends \yii\db\ActiveRecord
{
    use BiKey;

    /**
        const
    */
    public function getTypes()
    {
        return [
            1 => Yii::t('app', 'Wood'),
            2 => Yii::t('app', 'Metal'),
            4 => Yii::t('app', 'Textile'),
        ];
    }

    public function getTypeAreas()
    {
        return [
            1 => Yii::t('app', 'Indoor works'),
            2 => Yii::t('app', 'Outdoor works'),
        ];
    }

    public function getToxicNames()
    {
        return [
            1 => Yii::t('app', 'No'),
            2 => Yii::t('app', 'Low'),
            3 => Yii::t('app', 'High'),
        ];
    }

    /**
        ! const
    */

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'protection';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type', 'type_area'], 'required'],
            [['description'], 'string'],
            [['solution', 'sulute', 'solvent', 'toxic', 't_work_max', 't_work_min', 't_store_max', 't_store_min'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function beforeSave($ins)
    {
        $this->biKeySave('type');
        $this->biKeySave('type_area');

        return parent::beforeSave($ins);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'protection_id' => 'Protection ID',
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'solution' => Yii::t('app', 'Solution required'),
            'sulute' => Yii::t('app', 'Mass fraction of concentrate'),
            'solvent' => Yii::t('app', 'Mass fraction of solvent'),
            'type' => Yii::t('app', 'Surface type'),
            'toxic' => Yii::t('app', 'Toxic'),
            't_work_max' => Yii::t('app', 'Maximum processing temperature'),
            't_work_min' => Yii::t('app', 'Minimum processing temperature'),
            't_store_max' => Yii::t('app', 'Maximum storage temperature'),
            't_store_min' => Yii::t('app', 'Minimum storage temperature'),
            'type_area' => Yii::t('app', 'Area type'),

            'ratio' => Yii::t('app', 'Ratio'),
            'typeName' => Yii::t('app', 'Surface'),
            'typeAreaName' => Yii::t('app', 'Area'),
            'toxicName' => Yii::t('app', 'Toxic'),
        ];
    }

    /**
     * Gets query for [[Rates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRates()
    {
        return $this->hasMany(Rate::className(), ['protection_id' => 'protection_id']);
    }

    public function getRatio()
    {
        if ($this->sulute AND $this->solvent) {
            return $this->sulute . ' / ' . $this->solvent;
        }
        
        return false;
    }

    /**
        string value for @type
    */
    public function getTypeName()
    {
        return $this->biKeyToString($this->types, $this->type);
    }

    public function getTypeForm()
    {
        return $this->biKeyToKeys($this->types, $this->type);
    }

    /**
        string value for @type_area
    */
    public function getTypeAreaName()
    {
        return $this->biKeyToString($this->typeAreas, $this->type_area);
    }

    public function getTypeAreaForm()
    {
        return $this->biKeyToKeys($this->typeAreas, $this->type_area);
    }

    public function getToxicName()
    {
        if (isset($this->toxicNames[$this->toxic])) {
            return $this->toxicNames[$this->toxic];
        }

        return $this->toxicNames[1];
    }

    public function ratesDataProvider()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Rate::find()->where([
                'protection_id' => $this->protection_id,
            ]),
        ]);

        return $dataProvider;
    }

    /**
        list of fireprotections names

        @return array(protection_id => name, ...)
    */
    static public function namesList()
    {
        $names = self::find()
            ->select(['protection_id', 'name'])
            ->asArray()
            ->all();

        $names = ArrayHelper::map($names, 'protection_id', 'name');

        return $names;
    }
}
