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

    public $types = [
        1 => 'Дерево',
        2 => 'Металл',
        4 => 'Ткань',
    ];

    public $typeAreas = [
        1 => 'Внутренние работы',
        2 => 'Наружные работы',
    ];

    public $toxicNames = [
        1 => 'Нет',
        2 => 'Небольшая',
        3 => 'Высокая',
    ];

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
            'name' => 'Название',
            'description' => 'Описание',
            'solution' => 'Требуется приготовление',
            'sulute' => 'Массовая доля концентрата',
            'solvent' => 'Массовая доля растворителя',
            'type' => 'Обрабатываемая поверхность',
            'toxic' => 'Токсичность',
            't_work_max' => 'Максимальная температура обработки',
            't_work_min' => 'Минимальная температура обработки',
            't_store_max' => 'Максимальная температура хранения',
            't_store_min' => 'Минимальная температура хранения',
            'type_area' => 'Область применения',

            'ratio' => 'Пропорции',
            'typeName' => 'Поверхность',
            'typeAreaName' => 'Применение',
            'toxicName' => 'Токсичность',
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
