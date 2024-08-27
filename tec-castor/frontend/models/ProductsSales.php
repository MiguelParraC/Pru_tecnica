<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "products_sales".
 *
 * @property int $id
 * @property int|null $product_id Relación con la tabla productos_pool
 * @property int|null $quantity Cantidad vendida
 * @property float $price Precio del producto al momento de salida
 * @property int|null $exhausted 0 => Se Agotó , 1 => Disponible
 * @property int|null $who_created Quien Creó
 * @property string|null $created_at
 *
 * @property ProductsPool $product
 * @property User $whoCreated
 */
class ProductsSales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_sales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'quantity', 'exhausted', 'who_created'], 'integer'],
            [['price'], 'required'],
            [['price'], 'number'],
            [['created_at'], 'safe'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductsPool::class, 'targetAttribute' => ['product_id' => 'id']],
            [['who_created'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['who_created' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'quantity' => Yii::t('app', 'Quantity'),
            'price' => Yii::t('app', 'Price'),
            'exhausted' => Yii::t('app', 'Exhausted'),
            'who_created' => Yii::t('app', 'Who Created'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(ProductsPool::class, ['id' => 'product_id']);
    }

    /**
     * Gets query for [[WhoCreated]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWhoCreated()
    {
        return $this->hasOne(User::class, ['id' => 'who_created']);
    }
}
