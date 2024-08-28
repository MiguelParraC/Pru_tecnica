<?php

use yii\db\Migration;

/**
 * Class m240827_212914_add_table_products_outs
 */
class m240827_212914_add_table_products_outs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products_outs', [
            'id' => $this->primaryKey(),
            'who_created' => $this->integer(11)->comment('Quien Creó'),
            'created_at' => $this->dateTime()->comment('Fecha de creado'),
            'who_updated' => $this->integer(11)->comment('Quien Actualiza'),
            'updated_at' => $this->dateTime()->comment('Fecha de actualizado'),
        ]);
        $this->addForeignKey('fk_porductssales_productout','products_sales', 'poduct_out_id', 'products_outs', 'id' );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240827_212914_add_table_products_outs cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240827_212914_add_table_products_outs cannot be reverted.\n";

        return false;
    }
    */
}
