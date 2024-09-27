<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%freelancer}}`.
 */
class m240927_221836_create_freelancer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%freelancer}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'country' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-freelancer-country',
            'freelancer',
            'country',
            'country',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-freelancer-country', 'freelancer');
        $this->dropTable('{{%freelancer}}');
    }
}
