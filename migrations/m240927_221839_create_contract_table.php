<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contract}}`.
 */
class m240927_221839_create_contract_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contract}}', [
            'id' => $this->primaryKey(),
            'freelancer' => $this->integer(),
            'title' => $this->text()->notNull(),
            'description' => $this->text(),
            'rate' => $this->decimal(5, 2),
        ]);

        // Add foreign key for table `freelancer`
        $this->addForeignKey(
            'fk-contract-freelancer',
            'contract',
            'freelancer',
            'freelancer',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-contract-freelancer', 'contract');
        $this->dropTable('{{%contract}}');
    }
}
