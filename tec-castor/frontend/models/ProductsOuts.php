<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "products_outs".
 *
 * @property int $id
 * @property int|null $who_created Quien Creó
 * @property string|null $created_at Fecha de creado
 * @property int|null $who_updated Quien Actualiza
 * @property string|null $updated_at Fecha de actualizado
 *
 * @property ProductsSales[] $productsSales
 */
class ProductsOuts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_outs';
    }

    public $list_products,$sales_products,$count_products, $list_action;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['who_created', 'who_updated'], 'integer'],
            [['sales_products'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'who_created' => Yii::t('app', 'Who Created'),
            'created_at' => Yii::t('app', 'Created At'),
            'who_updated' => Yii::t('app', 'Who Updated'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[ProductsSales]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsSales()
    {
        return $this->hasMany(ProductsSales::class, ['poduct_out_id' => 'id']);
    }
}
