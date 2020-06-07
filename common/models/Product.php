<?php

namespace common\models;

use Yii;
use Zelenin\yii\behaviors\Slug;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string|null $slug
 * @property string|null $name
 * @property string|null $description
 * @property float|null $cost
 * @property float|null $cost_old
 *
 * @property ProductModification[] $modifications
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['cost', 'cost_old'], 'number'],
            [['slug', 'name'], 'string', 'max' => 255],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Псевдоним',
            'name' => 'Название',
            'description' => 'Описание',
            'cost' => 'Стоимость',
            'cost_old' => 'Стоимость старая',
        ];
    }

    /**
     * Gets query for [[ProductModifications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModifications()
    {
        return $this->hasMany(ProductModification::class, ['product_id' => 'id']);
    }


    /**
     * @return array|array[]
     */
    public function behaviors()
    {
        return [
            'slug' => [
                'class' => Slug::class,
                'slugAttribute' => 'slug',
                'attribute' => 'name',
                // optional params
                'ensureUnique' => true,
                'replacement' => '-',
                'lowercase' => true,
                'immutable' => false,
                // If intl extension is enabled, see http://userguide.icu-project.org/transforms/general.
                'transliterateOptions' => 'Russian-Latin/BGN; Any-Latin; Latin-ASCII; NFD; [:Nonspacing Mark:] Remove; NFC;'
            ]
        ];
    }

}
