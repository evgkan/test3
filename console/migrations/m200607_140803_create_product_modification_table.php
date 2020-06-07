<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_modification_}}`.
 */
class m200607_140803_create_product_modification_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_modification}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'name' => $this->string(),
        ]);

        $this->createIndex('idx-product_modification-product_id', '{{%product_modification}}', 'product_id');
        $this->addForeignKey(
            'fk-product_modification-product_id',
            '{{%product_modification}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-product_modification-product_id', '{{%product_modification}}');
        $this->dropIndex('idx-product_modification-product_id', '{{%product_modification}}');

        $this->dropTable('{{%product_modification}}');
    }
}
