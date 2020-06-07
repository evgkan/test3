<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m200607_140649_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(),
            'name' => $this->string(),
            'description' => $this->text(),
            'cost' => $this->decimal(10, 2),
            'cost_old' => $this->decimal(10, 2),
        ]);

        $this->createIndex('idx-product-slug', '{{%product}}', 'slug', true);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-product-slug', '{{%product}}');

        $this->dropTable('{{%product}}');
    }
}
