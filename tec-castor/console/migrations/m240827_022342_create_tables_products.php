<?php

use yii\db\Migration;

/**
 * Class m240827_022342_create_tables_products
 */
class m240827_022342_create_tables_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Tablas del pool de productos 
        $this->createTable(
            'products_pool',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(255)->notNull(),
                'status' => $this->tinyInteger()->comment('0 => inactivo, 1 => activo, 2 => agotado'),
                'price' => $this->decimal(16, 2)->notNull(),
                'stock' => $this->integer()->defaultValue(0),
                'who_created' => $this->integer(11)->comment('Quien Creó'),
                'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP')->comment('Fecha de creado'),
                'who_updated' => $this->integer(11)->comment('Quien Actualiza'),
                'updated_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')->comment('Fecha de actualizado'),
            ]
        );

        // llaves foráneas 
        $this->addForeignKey('fk_produtspool_user_create', 'products_pool', 'who_created', 'user', 'id');
        $this->addForeignKey('fk_produtspool_user_update', 'products_pool', 'who_created', 'user', 'id');

        $this->createTable(
            'products_sales',
            [
                'id' => $this->primaryKey(),
                'product_id' => $this->integer(11)->comment('Relación con la tabla productos_pool'),
                'quantity' => $this->integer()->comment('Cantidad vendida'),
                'price' => $this->decimal(16, 2)->notNull()->comment('Precio del producto al momento de salida'),
                'exhausted' => $this->tinyInteger()->comment('0 => Se Agotó , 1 => Disponible'),
                'who_created' => $this->integer(11)->comment('Quien Creó'),
                'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            ]
        );

        // llaves foráneas 
        $this->addForeignKey('fk_product_productspool', 'products_sales', 'product_id', 'products_pool', 'id');
        $this->addForeignKey('fk_produtssales_user_create', 'products_sales', 'who_created', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Eliminar llaves foráneas de la tabla 'products_sales'
        $this->dropForeignKey('fk_product_productspool', 'products_sales');
        $this->dropForeignKey('fk_produtssales_user_create', 'products_sales');

        // Eliminar la tabla 'products_sales'
        $this->dropTable('products_sales');

        // Eliminar llaves foráneas de la tabla 'products_pool'
        $this->dropForeignKey('fk_produtspool_user_create', 'products_pool');
        $this->dropForeignKey('fk_produtspool_user_update', 'products_pool');

        // Eliminar la tabla 'products_pool'
        $this->dropTable('products_pool');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240827_022342_create_tables_products cannot be reverted.\n";

        return false;
    }
    */
}
